<div class="max-w-7xl mx-auto px-4 py-12">
  <h2 class="text-3xl font-bold text-blue-800 mb-6">Jadwal & Sesi Pelaksanaan</h2>
  <div class="grid lg:grid-cols-2 gap-6">
    <?php foreach($daftar as $item): ?>
      <div class="bg-white p-6 rounded-lg shadow">
        <div class="text-sm text-gray-500"><?= tanggal_indo($item['tanggal']) ?> · <?= esc($item['lokasi']) ?></div>
        <h3 class="text-xl font-semibold text-blue-700 mt-2"><?= esc($item['judul']) ?></h3>
        <div class="mt-3 text-gray-700"><?= esc(substr($item['deskripsi'],0,200)) ?></div>
        <div class="mt-4">
          <a href="<?= base_url('jadwal/'.$item['id']) ?>" class="text-blue-600">Lihat detail →</a>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</div>
