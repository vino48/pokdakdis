<?php
// Frontend Layout Refactored - Modern Glassmorphism Design
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
    
    .gradient-bg {
      background: linear-gradient(135deg, #1e40af 0%, #3b82f6 50%, #60a5fa 100%);
    }
    
    .hover-scale {
      transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    
    .hover-scale:hover {
      transform: translateY(-5px);
    }
    
    @keyframes float {
      0%, 100% { transform: translateY(0px); }
      50% { transform: translateY(-20px); }
    }
    
    .float-animation {
      animation: float 6s ease-in-out infinite;
    }
    
    .schedule-card {
      background: rgba(255, 255, 255, 0.95);
      backdrop-filter: blur(10px);
      -webkit-backdrop-filter: blur(10px);
      transition: all 0.3s ease;
    }
    
    .schedule-card:hover {
      transform: translateX(8px);
    }
  </style>
</head>
<body class="min-h-full w-full">

  <!-- Navigation Desktop -->
  <?php if (is_file(APPPATH.'Views/depan/navbar.php')): ?>
    <?= $this->include('depan/navbar') ?>
  <?php else: ?>
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
          <a href="#beranda" class="font-medium hover:text-blue-600 transition-colors" style="color: #1e40af;">Beranda</a>
          <a href="#jadwal" class="font-medium hover:text-blue-600 transition-colors" style="color: #475569;">Jadwal</a>
          <a href="#layanan" class="font-medium hover:text-blue-600 transition-colors" style="color: #475569;">Layanan</a>
          <a href="#kontak" class="font-medium hover:text-blue-600 transition-colors" style="color: #475569;">Kontak</a>
        </div>
      </div>
    </div>
  </nav>
  <?php endif; ?>

  <!-- Hero Section -->
  <section id="beranda" class="w-full relative overflow-hidden" style="min-height: 100vh; padding-top: 100px; padding-bottom: 100px; background: linear-gradient(135deg, #1e40af 0%, #3b82f6 50%, #60a5fa 100%);">
    <div class="absolute top-20 right-10 w-72 h-72 rounded-full opacity-20" style="background: rgba(255, 255, 255, 0.1); filter: blur(60px);"></div>
    <div class="absolute bottom-20 left-10 w-96 h-96 rounded-full opacity-20" style="background: rgba(255, 255, 255, 0.15); filter: blur(80px);"></div>
    
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
      <div class="grid md:grid-cols-2 gap-8 md:gap-12 items-center">
        <div class="text-white space-y-4 md:space-y-6">
          <div class="inline-block px-3 md:px-4 py-2 rounded-full glass-card">
            <p class="text-xs md:text-sm font-medium">🎓 Sistem Informasi Terpadu</p>
          </div>
          <h1 class="font-bold leading-tight text-3xl md:text-4xl lg:text-5xl">PUSMENDIK – Pusat Informasi Asesmen</h1>
          <p class="text-base md:text-lg opacity-90">Sumber Informasi Resmi Asesmen Sekolah SMK Darut Taqwa</p>
          
          <div class="grid grid-cols-3 gap-3 md:gap-4 pt-6 md:pt-8">
            <div class="text-center">
              <div class="font-bold text-2xl md:text-3xl">1.200+</div>
              <div class="text-xs md:text-sm text-blue-200">Peserta Ujian</div>
            </div>
            <div class="text-center">
              <div class="font-bold text-2xl md:text-3xl">15</div>
              <div class="text-xs md:text-sm text-blue-200">Kompetensi Keahlian</div>
            </div>
            <div class="text-center">
              <div class="font-bold text-2xl md:text-3xl">98%</div>
              <div class="text-xs md:text-sm text-blue-200">Tingkat Kelulusan</div>
            </div>
          </div>
        </div>
        
        <div class="relative hidden md:block">
          <div class="glass-card rounded-3xl p-8 float-animation">
            <div class="space-y-6">
              <div class="flex items-center space-x-4 p-4 rounded-xl" style="background: rgba(255, 255, 255, 0.1);">
                <div class="w-12 h-12 rounded-lg flex items-center justify-center" style="background: rgba(255, 255, 255, 0.2);">
                  <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                  </svg>
                </div>
                <div class="text-white">
                  <div class="font-bold text-xl">Sistem Terintegrasi</div>
                  <div class="text-sm text-blue-200">Platform ujian modern & aman</div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Jadwal Section -->
  <section id="jadwal" class="w-full py-12 md:py-20 mb-16 md:mb-0" style="background: linear-gradient(to bottom, #ffffff, #f8fafc);">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="text-center mb-8 md:mb-12">
        <div class="inline-flex items-center space-x-2 px-3 md:px-4 py-2 rounded-full mb-4" style="background: rgba(37, 99, 235, 0.1); border: 1px solid rgba(37, 99, 235, 0.2);">
          <svg class="w-4 h-4 md:w-5 md:h-5" style="color: #2563eb;" fill="currentColor" viewBox="0 0 20 20">
            <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"/>
          </svg>
          <span class="font-semibold text-sm md:text-base" style="color: #2563eb;">Jadwal Terbaru</span>
        </div>
        <h2 class="font-bold mb-3 md:mb-4 text-2xl md:text-3xl lg:text-4xl" style="color: #1e40af;">Jadwal & Sesi Pelaksanaan Ujian</h2>
        <p class="text-base md:text-lg max-w-3xl mx-auto" style="color: #64748b;">Informasi lengkap jadwal pelaksanaan ujian asesmen untuk seluruh kompetensi keahlian</p>
      </div>

      <!-- Dynamic Jadwal Cards -->
      <?php if (isset($jadwals) && is_array($jadwals) && count($jadwals) > 0): ?>
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-4 md:gap-6">
          <?php foreach ($jadwals as $index => $jadwal): ?>
            <div class="schedule-card rounded-2xl p-5 md:p-6 shadow-lg hover-scale" style="border: 2px solid #3b82f6;">
              <div class="flex items-center justify-between mb-4">
                <div class="flex items-center space-x-2">
                  <div class="w-3 h-3 rounded-full" style="background: #3b82f6;"></div>
                  <span class="font-bold text-sm" style="color: #3b82f6;">SESI <?= $index + 1 ?></span>
                </div>
                <div class="px-3 py-1 rounded-lg font-semibold text-xs" style="background: rgba(59, 130, 246, 0.1); color: #3b82f6;">
                  <?= esc($jadwal['tanggal'] ?? 'TBA') ?>
                </div>
              </div>

              <h4 class="font-bold text-xl mb-3" style="color: #1e40af;"><?= esc($jadwal['judul'] ?? 'Untitled') ?></h4>
              
              <div class="space-y-3 mb-4">
                <div class="flex items-center space-x-3">
                  <div class="w-8 h-8 rounded-lg flex items-center justify-center" style="background: rgba(37, 99, 235, 0.1);">
                    <svg class="w-4 h-4" style="color: #2563eb;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                  </div>
                  <div>
                    <div class="text-xs font-medium" style="color: #64748b;">Waktu Pelaksanaan</div>
                    <div class="font-semibold" style="color: #1e40af;"><?= esc($jadwal['jam'] ?? '-') ?></div>
                  </div>
                </div>

                <div class="flex items-center space-x-3">
                  <div class="w-8 h-8 rounded-lg flex items-center justify-center" style="background: rgba(37, 99, 235, 0.1);">
                    <svg class="w-4 h-4" style="color: #2563eb;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                    </svg>
                  </div>
                  <div>
                    <div class="text-xs font-medium" style="color: #64748b;">Lokasi</div>
                    <div class="font-semibold" style="color: #1e40af;"><?= esc($jadwal['lokasi'] ?? '-') ?></div>
                  </div>
                </div>
              </div>

              <?php if (!empty($jadwal['deskripsi'])): ?>
                <p class="text-sm mb-3" style="color: #64748b;"><?= esc($jadwal['deskripsi']) ?></p>
              <?php endif; ?>

              <?php if (!empty($jadwal['keterangan'])): ?>
                <div class="mt-4 p-3 rounded-lg" style="background: rgba(37, 99, 235, 0.05);">
                  <p class="text-xs" style="color: #64748b;"><?= esc($jadwal['keterangan']) ?></p>
                </div>
              <?php endif; ?>
            </div>
          <?php endforeach; ?>
        </div>
      <?php else: ?>
        <div class="text-center py-12">
          <div class="inline-flex items-center justify-center w-16 h-16 rounded-full mb-4" style="background: rgba(37, 99, 235, 0.1);">
            <svg class="w-8 h-8" style="color: #3b82f6;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
            </svg>
          </div>
          <p class="text-lg font-semibold mb-2" style="color: #1e40af;">Belum Ada Jadwal</p>
          <p class="text-gray-500">Jadwal ujian akan segera diumumkan. Pantau terus halaman ini.</p>
        </div>
      <?php endif; ?>
    </div>
  </section>

  <!-- Additional Content Section -->
  <?php if (isset($konten) && !empty($konten)): ?>
    <section class="w-full py-12 bg-white">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <?= $konten ?>
      </div>
    </section>
  <?php endif; ?>

  <!-- Dynamic Content Section -->
  <?php if ($this->renderSection('content')): ?>
    <section class="w-full py-12 bg-white">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <?= $this->renderSection('content') ?>
      </div>
    </section>
  <?php endif; ?>

  <!-- Footer -->
  <?php if (is_file(APPPATH.'Views/depan/footer.php')): ?>
    <?= $this->include('depan/footer') ?>
  <?php else: ?>
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
            <li><a href="#beranda" class="text-slate-400 hover:text-white transition-colors text-sm">Beranda</a></li>
            <li><a href="#jadwal" class="text-slate-400 hover:text-white transition-colors text-sm">Jadwal Ujian</a></li>
            <li><a href="#layanan" class="text-slate-400 hover:text-white transition-colors text-sm">Layanan</a></li>
            <li><a href="#kontak" class="text-slate-400 hover:text-white transition-colors text-sm">Kontak</a></li>
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
  <?php endif; ?>

</body>
</html>