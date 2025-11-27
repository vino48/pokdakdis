<?= $this->extend('tata_letak/utama') ?>
<?= $this->section('content') ?>

<!-- Hero Section -->
<section class="w-full relative overflow-hidden" style="min-height: 100vh; padding-top: 100px; padding-bottom: 100px; background: linear-gradient(135deg, #1e40af 0%, #3b82f6 50%, #60a5fa 100%);">
  <div class="absolute top-20 right-10 w-72 h-72 rounded-full opacity-20" style="background: rgba(255, 255, 255, 0.1); filter: blur(60px);"></div>
  <div class="absolute bottom-20 left-10 w-96 h-96 rounded-full opacity-20" style="background: rgba(255, 255, 255, 0.15); filter: blur(80px);"></div>
  
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
    <div class="grid md:grid-cols-2 gap-8 md:gap-12 items-center">
      <div class="text-white space-y-4 md:space-y-6">
        <div class="inline-block px-3 md:px-4 py-2 rounded-full glass-card">
          <p class="text-xs md:text-sm font-medium">🎓 Sistem Informasi Terpadu</p>
        </div>
        <h1 class="font-bold leading-tight text-3xl md:text-4xl lg:text-5xl">
          <?= esc($halamanUtama['hero_title'] ?? 'PUSMENDIK – Pusat Informasi Asesmen') ?>
        </h1>
        <p class="text-base md:text-lg opacity-90">
          <?= esc($halamanUtama['hero_subtitle'] ?? 'Sumber Informasi Resmi Asesmen Sekolah SMK Darut Taqwa') ?>
        </p>
        
        <div class="flex flex-wrap gap-3 md:gap-4 pt-4">
          <a href="<?= base_url('jadwal') ?>" class="px-6 md:px-8 py-3 md:py-4 rounded-xl font-semibold shadow-lg text-sm md:text-base" style="background: rgba(255, 255, 255, 0.95); color: #1e40af;">
            Lihat Jadwal Ujian
          </a>
        </div>

        <div class="grid grid-cols-3 gap-3 md:gap-4 pt-6 md:pt-8">
          <div class="text-center">
            <div class="font-bold text-2xl md:text-3xl">
              <?= esc($halamanUtama['statistik']['peserta'] ?? '1200+') ?>
            </div>
            <div class="text-xs md:text-sm text-blue-200">Peserta Ujian</div>
          </div>
          <div class="text-center">
            <div class="font-bold text-2xl md:text-3xl">
              <?= esc($halamanUtama['statistik']['kompetensi'] ?? '15') ?>
            </div>
            <div class="text-xs md:text-sm text-blue-200">Kompetensi Keahlian</div>
          </div>
          <div class="text-center">
            <div class="font-bold text-2xl md:text-3xl">
              <?= esc($halamanUtama['statistik']['kelulusan'] ?? '98%') ?>
            </div>
            <div class="text-xs md:text-sm text-blue-200">Tingkat Kelulusan</div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Jadwal Terbaru Section -->
<?php if (!empty($jadwalTerbaru)): ?>
<section class="w-full py-12 md:py-20" style="background: linear-gradient(to bottom, #ffffff, #f8fafc);">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="text-center mb-8 md:mb-12">
      <h2 class="font-bold mb-3 text-2xl md:text-3xl lg:text-4xl" style="color: #1e40af;">Jadwal Terbaru</h2>
      <p class="text-base md:text-lg" style="color: #64748b;">Informasi jadwal ujian yang akan datang</p>
    </div>

    <div class="grid md:grid-cols-3 gap-4 md:gap-6">
      <?php foreach ($jadwalTerbaru as $jadwal): ?>
        <div class="schedule-card rounded-2xl p-6 shadow-lg hover-scale" style="border: 2px solid #3b82f6;">
          <h4 class="font-bold text-xl mb-3" style="color: #1e40af;"><?= esc($jadwal['judul']) ?></h4>
          
          <div class="space-y-2 mb-4">
            <div class="flex items-center space-x-2 text-sm">
              <svg class="w-4 h-4" style="color: #2563eb;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
              </svg>
              <span style="color: #64748b;"><?= format_tanggal_indonesia($jadwal['tanggal']) ?></span>
            </div>
            <div class="flex items-center space-x-2 text-sm">
              <svg class="w-4 h-4" style="color: #2563eb;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
              </svg>
              <span style="color: #64748b;"><?= esc($jadwal['jam']) ?></span>
            </div>
            <div class="flex items-center space-x-2 text-sm">
              <svg class="w-4 h-4" style="color: #2563eb;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
              </svg>
              <span style="color: #64748b;"><?= esc($jadwal['lokasi']) ?></span>
            </div>
          </div>

          <a href="<?= base_url('jadwal/detail/' . $jadwal['id']) ?>" class="inline-flex items-center text-sm font-semibold" style="color: #2563eb;">
            Lihat Detail
            <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
            </svg>
          </a>
        </div>
      <?php endforeach; ?>
    </div>

    <div class="text-center mt-8">
      <a href="<?= base_url('jadwal') ?>" class="inline-flex items-center px-8 py-4 rounded-xl font-semibold text-white shadow-lg hover:scale-105 transition-all" style="background: linear-gradient(135deg, #2563eb 0%, #3b82f6 100%);">
        Lihat Semua Jadwal
        <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
        </svg>
      </a>
    </div>
  </div>
</section>
<?php endif; ?>

<?= $this->endSection() ?>