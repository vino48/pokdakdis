// ============================================
// FILE: app/Views/depan/jadwal.php
// View untuk halaman daftar jadwal lengkap
// ============================================
<?= $this->extend('tata_letak/utama') ?>

<?= $this->section('content') ?>

<section class="w-full py-20" style="padding-top: 120px; background: linear-gradient(to bottom, #ffffff, #f8fafc);">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    
    <div class="text-center mb-12">
      <h1 class="font-bold mb-4 text-3xl md:text-4xl" style="color: #1e40af;">Jadwal Asesmen</h1>
      <p class="text-lg" style="color: #64748b;">Daftar lengkap jadwal pelaksanaan ujian dan asesmen</p>
    </div>

    <?php if (!empty($jadwals)): ?>
      <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
        <?php foreach ($jadwals as $index => $jadwal): ?>
          <div class="schedule-card rounded-2xl p-6 shadow-lg hover-scale" style="border: 2px solid #3b82f6;">
            <div class="flex items-center justify-between mb-4">
              <span class="px-3 py-1 rounded-lg font-semibold text-xs" style="background: rgba(59, 130, 246, 0.1); color: #3b82f6;">
                SESI <?= $index + 1 ?>
              </span>
              <span class="text-xs font-medium" style="color: #64748b;">
                <?= format_tanggal_indonesia($jadwal['tanggal']) ?>
              </span>
            </div>

            <h3 class="font-bold text-xl mb-3" style="color: #1e40af;">
              <?= esc($jadwal['judul']) ?>
            </h3>

            <?php if (!empty($jadwal['deskripsi'])): ?>
              <p class="text-sm mb-4" style="color: #64748b;">
                <?= esc($jadwal['deskripsi']) ?>
              </p>
            <?php endif; ?>

            <div class="space-y-2 mb-4">
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

            <?php if (!empty($jadwal['keterangan'])): ?>
              <div class="mt-4 p-3 rounded-lg" style="background: rgba(37, 99, 235, 0.05);">
                <p class="text-xs" style="color: #64748b;"><?= esc($jadwal['keterangan']) ?></p>
              </div>
            <?php endif; ?>

            <div class="mt-4">
              <a href="<?= base_url('jadwal/detail/' . $jadwal['id']) ?>" class="inline-flex items-center text-sm font-semibold hover:gap-2 transition-all" style="color: #2563eb;">
                Lihat Detail
                <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                </svg>
              </a>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    <?php else: ?>
      <div class="text-center py-12">
        <div class="inline-flex items-center justify-center w-20 h-20 rounded-full mb-4" style="background: rgba(37, 99, 235, 0.1);">
          <svg class="w-10 h-10" style="color: #3b82f6;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
          </svg>
        </div>
        <p class="text-xl font-semibold mb-2" style="color: #1e40af;">Belum Ada Jadwal</p>
        <p class="text-gray-500">Jadwal ujian akan segera diumumkan. Pantau terus halaman ini.</p>
      </div>
    <?php endif; ?>
  </div>
</section>

<?= $this->endSection() ?>