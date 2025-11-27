<nav class="fixed w-full z-50 bg-white shadow">
  <div class="max-w-7xl mx-auto px-4 py-3 flex items-center justify-between">
    <div class="flex items-center space-x-3">
      <div class="w-10 h-10 rounded-lg bg-gradient-to-br from-blue-600 to-blue-400 flex items-center justify-center text-white font-bold">PUS</div>
      <div>
        <div class="font-bold text-lg text-blue-800">PUSMENDIK</div>
        <div class="text-xs text-blue-400">Pusat Informasi Asesmen</div>
      </div>
    </div>
    <div class="space-x-6 hidden md:block">
      <a href="<?= base_url('/') ?>" class="font-medium">Beranda</a>
      <a href="<?= base_url('jadwal') ?>" class="font-medium">Jadwal</a>
      <a href="<?= base_url('helpdesk') ?>" class="font-medium">Helpdesk</a>
    </div>
    <div>
      <a href="<?= base_url('admin') ?>" class="px-3 py-2 bg-blue-600 text-white rounded">Masuk Admin</a>
    </div>
  </div>
</nav>
