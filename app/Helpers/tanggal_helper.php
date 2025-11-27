// ============================================
// FILE: app/Helpers/tanggal_helper.php
// Helper untuk format tanggal Indonesia
// ============================================
<?php

if (!function_exists('format_tanggal_indonesia')) {
    function format_tanggal_indonesia($tanggal)
    {
        $bulan = [
            1 => 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni',
            'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
        ];

        $split = explode('-', $tanggal);
        if (count($split) == 3) {
            return $split[2] . ' ' . $bulan[(int)$split[1]] . ' ' . $split[0];
        }
        
        return $tanggal;
    }
}

if (!function_exists('format_hari_indonesia')) {
    function format_hari_indonesia($tanggal)
    {
        $hari = [
            'Sunday' => 'Minggu',
            'Monday' => 'Senin',
            'Tuesday' => 'Selasa',
            'Wednesday' => 'Rabu',
            'Thursday' => 'Kamis',
            'Friday' => 'Jumat',
            'Saturday' => 'Sabtu'
        ];

        $namaHari = date('l', strtotime($tanggal));
        return $hari[$namaHari];
    }
}