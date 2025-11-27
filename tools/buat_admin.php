<?php
require __DIR__.'/../vendor/autoload.php';
$dbHost='127.0.0.1'; $dbName='pusmendik'; $dbUser='root'; $dbPass='123456';
$pdo=new PDO("mysql:host=$dbHost;dbname=$dbName;charset=utf8mb4",$dbUser,$dbPass,[PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION]);
echo "Username: "; $u = trim(fgets(STDIN));
echo "Nama Lengkap: "; $n = trim(fgets(STDIN));
echo "Password: "; $p = trim(fgets(STDIN));
$hash = password_hash($p,PASSWORD_DEFAULT);
$stmt = $pdo->prepare("INSERT INTO pengguna (nama_pengguna,kata_sandi,nama_lengkap) VALUES (:u,:p,:n)");
$stmt->execute([':u'=>$u,':p'=>$hash,':n'=>$n]);
echo "Admin dibuat: $u\n";
