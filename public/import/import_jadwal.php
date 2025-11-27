<?php
// public/import/import_jadwal.php
// INGAT: ubah konfigurasi DB di bawah sesuai app/Config/Database.php atau gunakan env
$dbHost = '127.0.0.1';
$dbName = 'pusmendik_indonesia';
$dbUser = 'root';
$dbPass = '';

$dsn = "mysql:host={$dbHost};dbname={$dbName};charset=utf8mb4";
$pdo = new PDO($dsn, $dbUser, $dbPass, [PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION, PDO::ATTR_DEFAULT_FETCH_MODE=>PDO::FETCH_ASSOC]);

$html = file_get_contents(__DIR__ . '/jadwal1.html');
if (!$html) die("File jadwal1.html tidak ditemukan di folder ini.\n");

libxml_use_internal_errors(true);
$dom = new DOMDocument();
$dom->loadHTML('<?xml encoding="utf-8" ?>' . $html);
$xpath = new DOMXPath($dom);

// 1. ambil array rooms & supervisors dari JS bila ada
$rooms = [];
if (preg_match('/const\s+rooms\s*=\s*(\[[\s\S]*?\]);/m', $html, $m)) {
    $r = $m[1];
    $r = str_replace("'", '"', $r);
    $r = preg_replace('/(\w+):/','"$1":',$r);
    $json = json_decode($r, true);
    if (is_array($json)) $rooms = $json;
}
$supervisors = [];
if (preg_match('/const\s+supervisors\s*=\s*(\[[\s\S]*?\]);/m', $html, $m2)) {
    $s = str_replace("'", '"', $m2[1]);
    $sarr = json_decode($s, true);
    if (is_array($sarr)) $supervisors = $sarr;
}

// 2. insert rooms & pengawas
$insertRoom = $pdo->prepare("INSERT INTO ruang (nama_ruang, kapasitas_json) VALUES (:nama, :kap)");
$roomMap = [];
foreach ($rooms as $r) {
    $cap = isset($r['cap']) ? json_encode($r['cap']) : null;
    $insertRoom->execute([':nama'=>$r['name'], ':kap'=>$cap]);
    $roomMap[$r['name']] = $pdo->lastInsertId();
}
$insertPeng = $pdo->prepare("INSERT INTO pengawas (nama_pengawas) VALUES (:nama)");
$supMap = [];
foreach ($supervisors as $s) {
    $insertPeng->execute([':nama'=>$s]);
    $supMap[$s] = $pdo->lastInsertId();
}

// 3. cari container hari (class 'card' yang punya .title)
$dayContainers = $xpath->query('//div[contains(@class,"card")][.//div[contains(@class,"title")]]');
$insertHari = $pdo->prepare("INSERT INTO hari_jadwal (nomor_hari,nama_hari,tanggal,keterangan) VALUES (:nom,:nama,:tgl,:ket)");
$insertSesi = $pdo->prepare("INSERT INTO sesi_jadwal (id_hari,nomor_sesi,rentang_waktu,mata_pelajaran,tingkat_kelas,catatan) VALUES (:idh,:ns,:rw,:mp,:tk,:cat)");
$insertSesiRuang = $pdo->prepare("INSERT INTO sesi_ruang (id_sesi,id_ruang,id_pengawas,kapasitas) VALUES (:ids,:idr,:idp,:kap)");

$dayNum = 1;
foreach ($dayContainers as $dc) {
    $titleNode = $xpath->query('.//div[contains(@class,"title")]', $dc)->item(0);
    $titleText = $titleNode ? trim($titleNode->textContent) : "Hari {$dayNum}";
    // extract date from titleText e.g. "Senin, 15 Desember 2025"
    $date = null;
    if (preg_match('/(\d{1,2}\s+\w+\s+\d{4})/', $titleText, $md)) {
        $dateStr = $md[1];
        $months = ['Januari'=>'01','Februari'=>'02','Maret'=>'03','April'=>'04','Mei'=>'05','Juni'=>'06','Juli'=>'07','Agustus'=>'08','September'=>'09','Oktober'=>'10','November'=>'11','Desember'=>'12'];
        foreach ($months as $ind=>$num) $dateStr = str_replace($ind,$num,$dateStr);
        if (preg_match('/(\d{1,2})\s+(\d{2})\s+(\d{4})/', $dateStr, $m2)) {
            $d = str_pad($m2[1],2,'0',STR_PAD_LEFT); $m = $m2[2]; $y = $m2[3];
            $date = "$y-$m-$d";
        }
    }
    if (!$date) $date = date('Y-m-d', strtotime("+".($dayNum-1)." days"));

    $mutedNode = $xpath->query('.//div[contains(@class,"muted")]', $dc)->item(0);
    $keterangan = $mutedNode ? trim($mutedNode->textContent) : null;

    $insertHari->execute([':nom'=>$dayNum, ':nama'=>"Hari {$dayNum}", ':tgl'=>$date, ':ket'=>$keterangan]);
    $idHari = $pdo->lastInsertId();

    // sesi: cari div.slot di dalam card
    $slotNodes = $xpath->query('.//div[contains(@class,"slot")]', $dc);
    if ($slotNodes->length == 0) {
        // fallback: cari grid-2 children
        $slotNodes = $xpath->query('.//div[contains(@class,"grid-2")]/*', $dc);
    }
    $snum = 1;
    foreach ($slotNodes as $slot) {
        $subjNode = $xpath->query('.//*[contains(@class,"subj")]', $slot)->item(0);
        $subject = $subjNode ? trim($subjNode->textContent) : null;

        $text = trim($slot->textContent);
        $time = null;
        if (preg_match('/\d{1,2}:\d{2}\s*-\s*\d{1,2}:\d{2}/', $text, $mt)) $time = $mt[0];

        $classInfo = null;
        if (preg_match('/Kelas\s*[:\-]?\s*([A-Za-z0-9 ,]+)/i', $text, $mc)) $classInfo = $mc[1];

        $insertSesi->execute([':idh'=>$idHari, ':ns'=>$snum, ':rw'=>$time, ':mp'=>$subject, ':tk'=>$classInfo, ':cat'=>null]);
        $idSesi = $pdo->lastInsertId();

        // assign rooms inside slot (room-card)
        $roomCards = $xpath->query('.//div[contains(@class,"room-card")]', $slot);
        if ($roomCards->length > 0) {
            foreach ($roomCards as $rc) {
                $roomNameNode = $xpath->query('.//*[contains(@class,"room-name")]', $rc)->item(0);
                $capNode = $xpath->query('.//*[contains(@class,"capacity")]', $rc)->item(0);
                $roomName = $roomNameNode ? trim($roomNameNode->textContent) : 'Ruang Tidak Diketahui';
                $cap = $capNode ? (int)filter_var($capNode->textContent, FILTER_SANITIZE_NUMBER_INT) : null;
                $rid = $roomMap[$roomName] ?? null;
                if (!$rid) {
                    $stmt = $pdo->prepare("INSERT INTO ruang (nama_ruang) VALUES (:nama)");
                    $stmt->execute([':nama'=>$roomName]);
                    $rid = $pdo->lastInsertId();
                    $roomMap[$roomName] = $rid;
                }
                // pick random supervisor
                $supId = null;
                if (!empty($supMap)) {
                    $keys = array_keys($supMap);
                    $pick = $keys[array_rand($keys)];
                    $supId = $supMap[$pick];
                }
                $insertSesiRuang->execute([':ids'=>$idSesi, ':idr'=>$rid, ':idp'=>$supId, ':kap'=>$cap]);
            }
        } else {
            // jika tidak ada, assign 1-2 room awal secara otomatis
            $c = 0;
            foreach ($roomMap as $rname => $rid) {
                if ($c++ >= 2) break;
                $supId = null;
                if (!empty($supMap)) {
                    $keys = array_keys($supMap);
                    $supId = $supMap[$keys[array_rand($keys)]];
                }
                $insertSesiRuang->execute([':ids'=>$idSesi, ':idr'=>$rid, ':idp'=>$supId, ':kap'=>null]);
            }
        }

        $snum++;
    }

    $dayNum++;
}

echo "Import selesai.\n";
