<div class="p-6">
  <h1 class="text-xl font-bold mb-4">Edit Jadwal</h1>
  <form method="post" action="<?= base_url('admin/jadwal/edit/'.$data['id']) ?>">
    <label class="block mb-1">Judul</label>
    <input name="judul" value="<?= esc($data['judul']) ?>" class="border p-2 w-full mb-3"/>
    <label class="block mb-1">Deskripsi</label>
    <textarea name="deskripsi" class="border p-2 w-full mb-3"><?= esc($data['deskripsi']) ?></textarea>
    <label class="block mb-1">Tanggal</label>
    <input type="date" name="tanggal" value="<?= esc($data['tanggal']) ?>" class="border p-2 w-full mb-3"/>
    <label class="block mb-1">Jam</label>
    <input name="jam" value="<?= esc($data['jam']) ?>" class="border p-2 w-full mb-3"/>
    <label class="block mb-1">Lokasi</label>
    <input name="lokasi" value="<?= esc($data['lokasi']) ?>" class="border p-2 w-full mb-3"/>
    <label class="block mb-1">Keterangan</label>
    <textarea name="keterangan" class="border p-2 w-full mb-3"><?= esc($data['keterangan']) ?></textarea>
    <button class="bg-blue-600 text-white px-4 py-2 rounded">Update</button>
  </form>
</div>
