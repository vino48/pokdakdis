<?php
// Load helper jika ada
helper('tanggal');
?>
<!doctype html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= esc($title ?? 'PUSMENDIK - Pusat Informasi Asesmen SMK Darut Taqwa') ?></title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
  <style>
    body {
      box-sizing: border-box;
      font-family: 'Inter', sans-serif;
    }
    
    .glass-card {
      background: rgba(255, 255, 255, 0.1);
      backdrop-filter: blur(20px);
      -webkit-backdrop-filter: blur(20px);
      border: 1px solid rgba(255, 255, 255, 0.2);
      box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.15);
    }
    
    .glass-nav {
      background: rgba(255, 255, 255, 0.95);
      backdrop-filter: blur(10px);
      -webkit-backdrop-filter: blur(10px);
      border-bottom: 1px solid rgba(37, 99, 235, 0.1);
      box-shadow: 0 4px 20px 0 rgba(31, 38, 135, 0.1);
    }
    
    .hover-scale {
      transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    
    .hover-scale:hover {
      transform: translateY(-5px);
    }
    
    .schedule-card {
      background: rgba(255, 255, 255, 0.95);
      backdrop-filter: blur(10px);
      transition: all 0.3s ease;
    }
    
    .schedule-card:hover {
      transform: translateX(8px);
    }
  </style>
</head>
<body class="min-h-full w-full">

  <!-- Navigation -->
  <nav class="glass-nav fixed w-full z-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="flex justify-between items-center h-16 md:h-20">
        <div class="flex items-center space-x-2 md:space-x-3">
          <div class="w-10 h-10 md:w-12 md:h-12 rounded-xl flex items-center justify-center" style="background: linear-gradient(135deg, #2563eb 0%, #3b82f6 100%);">
            <svg class="w-5 h-5 md:w-7 md:h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
            </svg>
          </div>
          <div>
            <h1 class="font-bold text-lg md:text-xl" style="color: #1e40af;">PUSMENDIK</h1>
            <p class="text-xs hidden sm:block" style="color: #60a5fa;">SMK Darut Taqwa</p>
          </div>
        </div>
        <div class="hidden md:flex space-x-8">
          <a href="<?= base_url('/') ?>" class="font-medium hover:text-blue-600 transition-colors" style="color: <?= uri_string() == '' ? '#1e40af' : '#475569' ?>;">Beranda</a>
          <a href="<?= base_url('jadwal') ?>" class="font-medium hover:text-blue-600 transition-colors" style="color: <?= uri_string() == 'jadwal' ? '#1e40af' : '#475569' ?>;">Jadwal</a>
          <a href="<?= base_url('helpdesk') ?>" class="font-medium hover:text-blue-600 transition-colors" style="color: <?= uri_string() == 'helpdesk' ? '#1e40af' : '#475569' ?>;">Helpdesk</a>
          <a href="<?= base_url('admin/masuk') ?>" class="font-medium hover:text-blue-600 transition-colors" style="color: #475569;">Admin</a>
        </div>
      </div>
    </div>
  </nav>

  <!-- Main Content -->
  <main class="w-full">
    <?= $this->renderSection('content') ?>
  </main>

  <!-- Footer -->
  <footer class="w-full py-12" style="background: #0f172a;">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="grid md:grid-cols-3 gap-8 mb-8">
        <div>
          <div class="flex items-center space-x-3 mb-4">
            <div class="w-10 h-10 rounded-lg flex items-center justify-center" style="background: linear-gradient(135deg, #2563eb 0%, #3b82f6 100%);">
              <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
              </svg>
            </div>
            <span class="text-white font-bold text-lg">PUSMENDIK</span>
          </div>
          <p class="text-slate-400 text-sm">Pusat Informasi Asesmen SMK Darut Taqwa</p>
        </div>
        
        <div>
          <h4 class="text-white font-semibold mb-4">Tautan Cepat</h4>
          <ul class="space-y-2">
            <li><a href="<?= base_url('/') ?>" class="text-slate-400 hover:text-white transition-colors text-sm">Beranda</a></li>
            <li><a href="<?= base_url('jadwal') ?>" class="text-slate-400 hover:text-white transition-colors text-sm">Jadwal Ujian</a></li>
            <li><a href="<?= base_url('helpdesk') ?>" class="text-slate-400 hover:text-white transition-colors text-sm">Helpdesk</a></li>
          </ul>
        </div>
        
        <div>
          <h4 class="text-white font-semibold mb-4">Kontak</h4>
          <ul class="space-y-2 text-slate-400 text-sm">
            <li>📧 info@smkdaruttaqwa.sch.id</li>
            <li>📱 +62 123 4567 890</li>
            <li>📍 Jl. Pendidikan No. 123</li>
          </ul>
        </div>
      </div>
      
      <div class="border-t pt-8 text-center" style="border-color: #1e293b;">
        <p class="text-slate-400 text-sm">© <?= date('Y') ?> SMK Darut Taqwa. Hak Cipta Dilindungi.</p>
      </div>
    </div>
  </footer>

</body>
</html>