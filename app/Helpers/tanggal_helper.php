<?php
function tanggal_indo($tanggal) {
    if (!$tanggal) return '';
    $bulan = ['Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'];
    $t = strtotime($tanggal);
    $d = date('j', $t);
    $m = date('n', $t);
    $y = date('Y', $t);
    return $d . ' ' . $bulan[$m-1] . ' ' . $y;
}
