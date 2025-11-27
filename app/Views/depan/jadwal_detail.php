<div class="max-w-4xl mx-auto px-4 py-12">
  <div class="bg-white p-6 rounded shadow">
    <div class="text-sm text-gray-500"><?= tanggal_indo($item['tanggal']) ?> · <?= esc($item['lokasi']) ?></div>
    <h2 class="text-2xl font-bold text-blue-800 mt-2"><?= esc($item['judul']) ?></h2>
    <div class="mt-4 text-gray-700"><?= nl2br(esc($item['deskripsi'])) ?></div>
    <div class="mt-4 text-sm text-gray-600">Jam: <?= esc($item['jam']) ?></div>
  </div>
</div>
