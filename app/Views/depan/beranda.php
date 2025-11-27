<?php $cfg = is_array($data) ? $data : []; ?>

<section class="bg-gradient-to-r from-blue-700 to-blue-400 text-white py-20">
  <div class="max-w-6xl mx-auto px-4 md:flex md:items-center md:justify-between">

    <div class="md:w-1/2">

      <h1 class="text-4xl font-bold">
        <?= esc($cfg['judul'] ?? 'PUSMENDIK – Pusat Informasi Asesmen') ?>
      </h1>

      <p class="mt-4 text-lg">
        <?= esc($cfg['deskripsi'] ?? 'Sumber informasi asesmen') ?>
      </p>

      <div class="mt-6">
        <a href="<?= $cfg['link_tombol'] ?? base_url('jadwal') ?>"
           class="px-6 py-3 bg-white text-blue-700 rounded-lg font-semibold">
           <?= esc($cfg['teks_tombol'] ?? 'Lihat Jadwal') ?>
        </a>
      </div>

    </div>

    <div class="md:w-1/2 hidden md:block">
      <?php if (!empty($cfg['banner'])) : ?>
        <img src="<?= $cfg['banner'] ?>" alt="Banner" class="rounded-lg shadow-lg">
      <?php else : ?>
        <div class="h-64 bg-white/20 rounded-lg flex items-center justify-center">Banner</div>
      <?php endif; ?>
    </div>

  </div>
</section>

<div class="max-w-7xl mx-auto px-4 py-12">
  <?= view('depan/jadwal_ringkasan') ?>
</div>
