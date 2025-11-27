<div class="min-h-screen flex items-center justify-center bg-gray-50">
  <div class="w-full max-w-md bg-white p-6 rounded shadow">
    <?php if(session()->getFlashdata('error')): ?>
      <div class="bg-red-100 text-red-700 p-2 rounded mb-3"><?= session()->getFlashdata('error') ?></div>
    <?php endif; ?>
    <h2 class="text-xl font-bold mb-4">Masuk Admin</h2>
    <form action="<?= base_url('admin/masuk') ?>" method="post">
      <label class="block mb-2 text-sm">Nama Pengguna</label>
      <input name="nama_pengguna" class="w-full border p-2 rounded mb-3"/>
      <label class="block mb-2 text-sm">Kata Sandi</label>
      <input name="kata_sandi" type="password" class="w-full border p-2 rounded mb-4"/>
      <button class="w-full bg-blue-600 text-white p-2 rounded">Masuk</button>
    </form>
  </div>
</div>
