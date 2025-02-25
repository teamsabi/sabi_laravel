@extends('app')
@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title mb-0">Profil Saya</h4>
                <h6 class="op-7 mb-2">Isilah data profil dengan benar!</h6>
            </div>
            <div class="card-body">
                <div class="text-center mb-3">
                    <img src="{{ asset('template/assets/img/profile.jpg') }}" alt="Foto Profil" class="img-thumbnail rounded-circle" width="180">
                </div>
                <div class="text-center mb-3">
                    <label for="photo" class="text-primary" style="cursor: pointer; font-weight: bold; text-decoration: underline;">Ganti Foto</label>
                    <input type="file" name="photo" id="photo" class="d-none" accept="image/*">
                </div>
                <form action="#" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group mb-3">
                        <label for="name">Nama Lengkap</label>
                        <input type="text" name="name" class="form-control" value="Tiar Gantebf" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="email">Email</label>
                        <input type="email" name="email" class="form-control" value="tiar@gmail.com" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="phone">No WhatsApp</label>
                        <input type="text" name="phone" class="form-control" value="081234567890">
                    </div>
                    <div class="form-group text-end mb-4">
                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
