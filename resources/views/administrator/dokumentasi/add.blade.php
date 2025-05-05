@extends('app')
@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title mb-0">Tambah Dokumentasi Penyerahan</h4>
            </div>
            <div class="card-body">
                <div class="col-12">
                    <form id="form-tambah-dokumentasi" action="#" method="POST" enctype="multipart/form-data">
                        <div class="row mb-3">
                            <label for="judul_dokumentasi" class="col-sm-2 col-form-label">Judul Dokumentasi</label>
                            <div class="col-sm-10">
                                <input type="text" name="judul_dokumentasi" class="form-control" placeholder="Masukkan Judul Dokumentasi" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="tgl_penyerahan" class="col-sm-2 col-form-label">Tanggal Penyerahan</label>
                            <div class="col-sm-10">
                                <input type="date" name="tgl_penyerahan" class="form-control" max="{{ date('Y-m-d') }}" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="kategori_donasi" class="col-sm-2 col-form-label">Kategori Donasi</label>
                            <div class="col-sm-10">
                                <select name="kategori_donasi" id="kategori_donasi" class="form-control" required>
                                    <option value="">Pilih Kategori Donasi</option>
                                        <option>Ayah Asep Berpulang</option>
                                        <option>Ayah Asup Berpulang</option>
                                </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="nama_penerima" class="col-sm-2 col-form-label">Nama Penerima</label>
                            <div class="col-sm-10">
                                <input type="text" name="nama_penerima" class="form-control" placeholder="Masukkan Nama Penerima" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="deskripsi" class="col-sm-2 col-form-label">Deskripsi</label>
                            <div class="col-sm-10">
                                <textarea name="deskripsi" class="form-control" rows="4" placeholder="Masukkan Deskripsi" required></textarea>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="bukti" class="col-sm-2 col-form-label">Upload Bukti</label>
                            <div class="col-sm-10">
                                <input type="file" name="bukti" class="form-control" accept="image/*" required onchange="previewGambar(event)">
                                <img id="preview-image" src="#" alt="Preview Gambar" class="mt-3" style="max-width: 200px; display: none; border-radius: 8px;">
                            </div>
                        </div>

                        <div class="text-end">
                            <button type="button" id="btn-simpan" class="btn btn-primary">
                                <i class="fa fa-save me-1"></i> Simpan
                            </button>
                            <a href="{{ route('admin.dokumentasi.index') }}" class="btn btn-danger">
                                <i class="fa fa-arrow-left me-1"></i> Kembali
                            </a>                            
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection