<?php
$jadwal = $jadwal ?? [];
?>
<div class="p-6">
  <h1 class="text-2xl font-semibold mb-4">Daftar Jadwal</h1>
  <?php if (empty($jadwal)): ?>
    <div class="p-4 bg-white rounded shadow">Belum ada jadwal.</div>
  <?php else: ?>
    <ul class="space-y-2">
      <?php foreach ($jadwal as $j): ?>
        <li class="p-3 bg-white rounded shadow">
          <div class="font-semibold"><?= esc($j['judul']) ?></div>
          <div class="text-sm text-gray-600"><?= esc($j['tanggal']) ?> <?= esc($j['jam'] ?? '') ?> — <?= esc($j['lokasi'] ?? '') ?></div>
        </li>
      <?php endforeach; ?>
    </ul>
  <?php endif; ?>
</div>
