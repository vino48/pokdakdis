<div class="p-6">
  <h1 class="text-xl font-bold mb-4">Daftar Jadwal</h1>
  <?php if(session()->getFlashdata('success')): ?>
    <div class="bg-green-100 text-green-700 p-2 rounded mb-3"><?= session()->getFlashdata('success') ?></div>
  <?php endif; ?>
  <a href="<?= base_url('admin/jadwal/tambah') ?>" class="bg-blue-600 text-white px-4 py-2 rounded">Tambah Jadwal</a>
  <table class="w-full mt-4 border-collapse border">
    <tr class="bg-gray-100">
      <th class="p-2 border">Judul</th>
      <th class="p-2 border">Tanggal</th>
      <th class="p-2 border">Aksi</th>
    </tr>
    <?php foreach($jadwal as $j): ?>
      <tr>
        <td class="p-2 border"><?= esc($j['judul']) ?></td>
        <td class="p-2 border"><?= tanggal_indo($j['tanggal']) ?></td>
        <td class="p-2 border">
          <a href="<?= base_url('admin/jadwal/edit/'.$j['id']) ?>" class="text-blue-600">Edit</a> |
          <form action="<?= base_url('admin/jadwal/hapus/'.$j['id']) ?>" method="post" class="inline">
            <button class="text-red-600" onclick="return confirm('Hapus jadwal?')">Hapus</button>
          </form>
        </td>
      </tr>
    <?php endforeach; ?>
  </table>
</div>
