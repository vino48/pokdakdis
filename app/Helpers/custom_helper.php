<?php
if (! function_exists('tanggal_indo')) {
    function tanggal_indo($date, $with_time = false)
    {
        if (empty($date)) return '';
        $ts = strtotime($date);
        if ($ts === false) return $date;
        $bulan = ['','Jan','Feb','Mar','Apr','Mei','Jun','Jul','Agu','Sep','Okt','Nov','Des'];
        $d = date('j', $ts);
        $m = (int)date('n', $ts);
        $y = date('Y', $ts);
        $out = $d . ' ' . ($bulan[$m] ?? date('M', $ts)) . ' ' . $y;
        if ($with_time) $out .= ' ' . date('H:i', $ts);
        return $out;
    }
}