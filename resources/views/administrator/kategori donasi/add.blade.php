@extends('app')
@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title mb-0">Tambah kategori Donasi</h4>
            </div>
            <div class="card-body">
                <div class="col-12">
                    <form action="#" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="row mb-3">
                            <label for="judul" class="col-sm-2 col-form-label">Judul Donasi</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="nama" placeholder="Masukkan Judul Donasi" required />
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="deskripsi" class="col-sm-2 col-form-label">Deskripsi</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" id="deskripsi" name="deskripsi" rows="4" placeholder="Masukkan Deskripsi" required></textarea>
                            </div>
                        </div>                        
                        <div class="row mb-3">
                            <label for="foto" class="col-sm-2 col-form-label">Foto Profil</label>
                            <div class="col-sm-10">
                                <input type="file" class="form-control" id="foto" accept="image/*" />
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="targetDana" class="col-sm-2 col-form-label">Target Dana</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" id="targetDana" name="targetDana" placeholder="Masukkan Target Dana" required min="0" step="1000" />
                            </div>
                        </div>          
                        <div class="row mb-3">
                            <label for="jumlahDonatur" class="col-sm-2 col-form-label">Jumlah Donatur</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" id="jumlahDonatur" name="jumlahDonatur" value="0" readonly />
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="donasiTerkumpul" class="col-sm-2 col-form-label">Donasi Terkumpul</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" id="donasiTerkumpul" name="donasiTerkumpul" value="0" readonly />
                            </div>
                        </div>              
                        <div class="row mb-4">
                            <label for="deadline" class="col-sm-2 col-form-label">Deadline</label>
                            <div class="col-sm-10">
                                <input type="date" class="form-control" id="deadline" required />
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="status" class="col-sm-2 col-form-label">Status</label>
                            <div class="col-sm-10">
                                <select class="form-select" id="Status" required>
                                    <option selected disabled>Pilih Status</option>
                                    <option value="Admin">Aktif</option>
                                    <option value="User">Nonaktif</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="tglBuat" class="col-sm-2 col-form-label">Tanggal Buat</label>
                            <div class="col-sm-10">
                                <input type="date" class="form-control" id="tglBuat" required />
                            </div>
                        </div>
                        <div class="text-end">
                            <button type="submit" class="btn btn-primary">
                                <i class="fa fa-save me-1"></i> Simpan
                            </button>
                            <a href="{{ url()->previous() }}" class="btn btn-danger">
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
