<?php
$jadwals = $jadwals ?? []; ?>
<section>
  <h2 class="text-2xl font-semibold mb-4">Jadwal Terdekat</h2>
  <?php if (empty($jadwals)): ?>
    <div class="p-6 bg-white rounded shadow">Belum ada jadwal.</div>
  <?php else: ?>
    <div class="grid md:grid-cols-2 gap-4">
      <?php foreach (array_slice($jadwals,0,6) as $j): ?>
        <div class="p-4 bg-white rounded shadow">
          <div class="font-semibold text-lg"><?= esc($j['judul']) ?></div>
          <div class="text-sm text-gray-600">
            <?= date('d M Y', strtotime($j['tanggal'])) ?>
            <?php if (!empty($j['jam'])): ?> — <?= esc($j['jam']) ?><?php endif; ?>
            <?php if (!empty($j['lokasi'])): ?> • <?= esc($j['lokasi']) ?><?php endif; ?>
          </div>
          <?php if (!empty($j['keterangan'])): ?>
            <div class="mt-2 text-sm text-gray-700"><?= esc($j['keterangan']) ?></div>
          <?php endif; ?>
          <div class="mt-3 text-xs text-gray-500">Dibuat pada: <?= !empty($j['dibuat_pada']) ? date('d M Y H:i', strtotime($j['dibuat_pada'])) : '-' ?></div>
        </div>
      <?php endforeach; ?>
    </div>
  <?php endif; ?>
  <div class="mt-6"><a href="<?= base_url('jadwal') ?>" class="px-4 py-2 bg-blue-600 text-white rounded">Lihat Semua Jadwal</a></div>
</section>
