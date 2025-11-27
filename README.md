Fitur Aplikasi:
1. Landing Page Informasi
2. Jadwal (CRUD)
3. Admin Login
4. Halaman Utama Dinamis
5. Upload Banner
6. Mode publik & mode admin


Framework: CodeIgniter 4
Frontend: TailwindCSS
Database: MySQL
Upload: File system / JSON
Autentikasi: Session


ALUR KERJA :
User → Landing Page → Lihat Jadwal
Admin → Login → Dasbor → Kelola Jadwal → Kelola Halaman Utama

standar coding :
- Semua controller harus rapi & pendek
- Validasi form wajib
- View semua pakai Tailwind
- Tidak pakai library tambahan

AI harus menghasilkan:
- Controller lengkap
- Model lengkap
- Views Tailwind
- Routes
- Struktur folders akhir
- SQL

STRUKTUR :

/app
  /Controllers
  /Models
  /Views
    /admin
    /depan
/public
  /asset/banner
/writable
  halaman_utama.json


pokdasdis/
│
├── app/
│   ├── Config/
│   │   ├── App.php
│   │   ├── Routes.php
│   │   ├── Filters.php
│   │   ├── Database.php
│   │   └── ... (default bawaan CI4)
│   │
│   ├── Controllers/
│   │   ├── Beranda.php
│   │   ├── Jadwal.php
│   │   ├── Helpdesk.php
│   │   │
│   │   └── Admin/
│   │       ├── Masuk.php
│   │       ├── Dasbor.php
│   │       ├── HalamanUtama.php
│   │       ├── JadwalAdmin.php
│   │       └── Logout.php      ← opsional
│   │
│   ├── Models/
│   │   ├── PenggunaModel.php
│   │   ├── JadwalModel.php
│   │   └── HalamanUtamaModel.php
│   │
│   ├── Views/
│   │   ├── depan/
│   │   │   ├── beranda.php
│   │   │   ├── jadwal.php
│   │   │   ├── jadwal_detail.php
│   │   │   ├── jadwal_ringkasan.php
│   │   │   └── helpdesk.php
│   │   │
│   │   ├── admin/
│   │   │   ├── masuk.php
│   │   │   ├── dasbor.php
│   │   │   ├── halaman-utama.php
│   │   │   ├── jadwal_index.php
│   │   │   ├── jadwal_tambah.php
│   │   │   └── jadwal_edit.php
│   │   │
│   │   ├── tata_letak/
│   │   │   ├── utama.php        ← layout untuk website publik
│   │   │   └── admin.php        ← layout untuk dashboard admin
│   │   │
│   │   └── errors/              ← default bawaan CI4
│   │
│   ├── Helpers/
│   │   └── tanggal_helper.php    ← helper custom
│   │
│   ├── Libraries/                ← optional jika butuh library internal
│   │
│   └── ... (folder bawaan CI4 lainnya)
│
│
├── public/
│   ├── index.php
│   ├── .htaccess
│   │
│   └── asset/
│       ├── banner/               ← tempat file banner upload admin
│       └── img/                  ← folder umum untuk image
│
│
├── writable/
│   ├── halaman_utama.json        ← data Halaman Utama disimpan di JSON
│   ├── uploads/                  ← upload untuk keperluan lain
│   └── logs/                     ← log error CI
│
│
├── system/                        ← bawaan CodeIgniter 4
│
├── .env
├── composer.json
└── spark

