@extends('app')
@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title mb-0">Tambah Akun</h4>
            </div>
            <div class="card-body">
                <div class="col-12">
                    <form action="#" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="row mb-3">
                            <label for="nama" class="col-sm-2 col-form-label">Nama Lengkap</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="nama" placeholder="Masukkan Nama Lengkap" required />
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="email" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                                <input type="email" class="form-control" id="email" placeholder="Masukkan Email" required />
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="nomorWA" class="col-sm-2 col-form-label">Nomor WhatsApp</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" id="nomorWA" placeholder="Masukkan Nomor WhatsApp" required />
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="foto" class="col-sm-2 col-form-label">Foto Profil</label>
                            <div class="col-sm-10">
                                <input type="file" class="form-control" id="foto" accept="image/*" />
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="password" class="col-sm-2 col-form-label">Kata Sandi</label>
                            <div class="col-sm-10">
                                <input type="password" class="form-control" id="password" placeholder="Masukkan Kata Sandi" required />
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="role" class="col-sm-2 col-form-label">Role</label>
                            <div class="col-sm-10">
                                <select class="form-select" id="role" required>
                                    <option selected disabled>Pilih Role</option>
                                    <option value="Admin">Admin</option>
                                    <option value="User">User</option>
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
