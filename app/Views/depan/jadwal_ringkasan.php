<?php
$jm = new \App\Models\JadwalModel();
$beberapa = $jm->orderBy('tanggal','ASC')->findAll(4);
?>
<div class="grid md:grid-cols-2 gap-4">
  <?php foreach($beberapa as $h): ?>
    <div class="p-4 bg-white rounded shadow">
      <div class="text-sm text-gray-500"><?= tanggal_indo($h['tanggal']) ?></div>
      <div class="font-semibold text-blue-700 mt-1"><?= esc($h['judul']) ?></div>
      <a href="<?= base_url('jadwal/'.$h['id']) ?>" class="inline-block mt-3 text-sm text-blue-600">Lihat detail →</a>
    </div>
  <?php endforeach; ?>
</div>
