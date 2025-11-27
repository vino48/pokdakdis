<!doctype html>
<html lang="id">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<title>Admin - PUSMENDIK</title>
<script src="https://cdn.tailwindcss.com"></script>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap" rel="stylesheet">
<style>body{font-family:'Inter',sans-serif}</style>
</head>
<body class="min-h-screen bg-gray-50">
  <header class="bg-white shadow">
    <div class="max-w-7xl mx-auto px-4 py-3 flex justify-between items-center">
      <div class="font-bold">PUSMENDIK - Admin</div>
      <div class="space-x-2">
        <a href="<?= base_url('admin/dasbor') ?>" class="text-sm">Dasbor</a>
        <a href="<?= base_url('admin/jadwal') ?>" class="text-sm">Jadwal</a>
        <a href="<?= base_url('admin/halaman-utama') ?>" class="text-sm">Halaman Utama</a>
        <a href="<?= base_url('admin/keluar') ?>" class="text-sm text-red-600">Keluar</a>
      </div>
    </div>
  </header>
  <main class="pt-6">
    <div class="max-w-7xl mx-auto px-4">
      <?= $konten ?? '' ?>
    </div>
  </main>
</body>
</html>
