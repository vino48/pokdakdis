<?php
// navbar placeholder
?>
<nav class="bg-blue-600 text-white p-4">
  <div class="max-w-7xl mx-auto flex justify-between items-center">
    <a href="<?= base_url('/') ?>" class="text-xl font-semibold">PUSMENDIK</a>
    <ul class="flex space-x-4">
      <li><a href="<?= base_url('/') ?>" class="hover:underline">Beranda</a></li>
      <li><a href="<?= base_url('jadwal') ?>" class="hover:underline">Jadwal</a></li>
      <li><a href="<?= base_url('helpdesk') ?>" class="hover:underline">Helpdesk</a></li>
    </ul>
  </div>
</nav>