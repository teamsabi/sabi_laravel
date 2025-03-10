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
                    <img src="{{ Auth::user()->foto_profil_url }}" 
                    alt="Foto Profil" 
                    class="img-thumbnail rounded-circle" 
                    style="width: 180px; height: 180px; object-fit: cover; border-radius: 50%;">
                </div>
                <div class="text-center mb-3">
                    <label for="photo" class="text-primary" style="cursor: pointer; font-weight: bold; text-decoration: underline;">Ganti Foto</label>
                    <input type="file" name="foto_profil" id="photo" class="d-none" accept="image/*" form="updateProfileForm">
                </div>
                <form id="updateProfileForm" action="{{ route('profil.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="form-group mb-3">
                        <label for="nama_lengkap">Nama Lengkap</label>
                        <input type="text" name="nama_lengkap" class="form-control" value="{{ Auth::user()->nama_lengkap }}" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="email">Email</label>
                        <input type="email" name="email" class="form-control" value="{{ Auth::user()->email }}" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="no_whatsapp">No WhatsApp</label>
                        <input type="text" name="no_whatsapp" class="form-control" value="{{ Auth::user()->no_whatsapp }}">
                    </div>
                    <div class="form-group text-end mb-4">
                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@endsection
