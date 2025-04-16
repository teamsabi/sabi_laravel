@extends('app')
@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title mb-0">Tambah Kategori Donasi</h4>
            </div>
            <div class="card-body">
                <div class="col-12">
                    <form id="form-tambah-kategori" action="{{ route('kategori.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <input type="hidden" name="id_user" value="{{ auth()->user()->id }}">

                        <div class="row mb-3">
                            <label for="judul_donasi" class="col-sm-2 col-form-label">Judul Donasi</label>
                            <div class="col-sm-10">
                                <input type="text" name="judul_donasi" class="form-control" placeholder="Masukkan Judul Donasi" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="deskripsi" class="col-sm-2 col-form-label">Deskripsi</label>
                            <div class="col-sm-10">
                                <textarea name="deskripsi" class="form-control" rows="4" placeholder="Masukkan Deskripsi" required></textarea>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="gambar" class="col-sm-2 col-form-label">Gambar Donasi</label>
                            <div class="col-sm-10">
                                <input type="file" name="gambar" class="form-control" accept="image/*" required onchange="previewGambar(event)">
                                <img id="preview-image" src="#" alt="Preview Gambar" class="mt-3" style="max-width: 200px; display: none; border-radius: 8px;">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="target_dana" class="col-sm-2 col-form-label">Target Dana</label>
                            <div class="col-sm-10">
                                <input type="number" name="target_dana" class="form-control" placeholder="Masukkan Target Dana" required min="0" step="1000">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="dedline" class="col-sm-2 col-form-label">Deadline</label>
                            <div class="col-sm-10">
                                <input type="date" name="dedline" class="form-control" required>
                            </div>
                        </div>

                        <div class="text-end">
                            <button type="button" id="btn-simpan" class="btn btn-primary">
                                <i class="fa fa-save me-1"></i> Simpan
                            </button>
                            <a href="{{ route('kategori.index') }}" class="btn btn-danger">
                                <i class="fa fa-arrow-left me-1"></i> Kembali
                            </a>                            
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function previewGambar(event) {
        const input = event.target;
        const preview = document.getElementById('preview-image');

        if (input.files && input.files[0]) {
            const reader = new FileReader();

            reader.onload = function(e) {
                preview.src = e.target.result;
                preview.style.display = 'block';
            }

            reader.readAsDataURL(input.files[0]);
        }
    }
</script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    document.getElementById('btn-simpan').addEventListener('click', function (e) {
        Swal.fire({
            title: 'Apakah Anda yakin ingin menyimpan data?',
            text: "Data kategori donasi akan disimpan.",
            icon: 'question',
            showCancelButton: true,
            confirmButtonText: 'Ya, Simpan!',
            cancelButtonText: 'Batal',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('form-tambah-kategori').submit(); // ✅ Langsung submit form-nya
            }
        });
    });
</script>

@if ($errors->any())
    <div class="alert alert-danger mt-2">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@endsection
