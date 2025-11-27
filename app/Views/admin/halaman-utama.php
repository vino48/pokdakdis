<?php
namespace App\Controllers\Admin;
use App\Controllers\BaseController;
use App\Models\HalamanUtamaModel;

class HalamanUtama extends BaseController
{
    protected $model;
    public function __construct(){ $this->model = new HalamanUtamaModel(); }

    public function index()
    {
        if (!session()->has('pengguna')) return redirect()->to('/admin');
        $data = $this->model->ambilData();
        echo view('tata_letak/admin', ['konten'=>view('admin/halaman-utama',['data'=>$data])]);
    }

    public function simpan()
    {
        if (!session()->has('pengguna')) return redirect()->to('/admin');
        $judul = $this->request->getPost('judul');
        $deskripsi = $this->request->getPost('deskripsi');
        $teks_tombol = $this->request->getPost('teks_tombol');
        $link_tombol = $this->request->getPost('link_tombol');

        $berkas = $this->request->getFile('banner');
        $lama = $this->model->ambilData()['banner'] ?? null;
        $folder = 'asset/banner/';
        if ($berkas && $berkas->isValid() && !$berkas->hasMoved()) {
            if (!is_dir(FCPATH.$folder)) mkdir(FCPATH.$folder,0755,true);
            $nama = time().'_'.$berkas->getRandomName();
            $berkas->move(FCPATH.$folder, $nama);
            $banner = base_url($folder.$nama);
        } else $banner = $lama;

        $this->model->simpan([
            'judul'=>$judul,'deskripsi'=>$deskripsi,'teks_tombol'=>$teks_tombol,'link_tombol'=>$link_tombol,'banner'=>$banner,'diubah_pada'=>date('Y-m-d H:i:s')
        ]);
        return redirect()->back()->with('success','Perubahan berhasil disimpan.');
    }
}

<div class="p-6">
  <h1 class="text-2xl font-semibold">Halaman Utama (Admin)</h1>
  <p class="mt-2 text-gray-600">Gunakan controller App\Controllers\Admin\HalamanUtama untuk logika. File ini hanya view.</p>

  <?php if (!empty($data)): ?>
    <div class="mt-4 bg-white p-4 rounded shadow">
      <pre class="text-sm"><?= esc(print_r($data, true)) ?></pre>
    </div>
  <?php endif; ?>
</div>
