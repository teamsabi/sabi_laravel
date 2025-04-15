@extends('app')
@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title mb-0">Edit Kategori Donasi</h4>
            </div>
            <div class="card-body">
                <div class="col-12">
                    <form id="formEditKategori" action="{{ route('kategori.update', $kategori->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="row mb-3">
                            <label for="judul_donasi" class="col-sm-2 col-form-label">Judul Donasi</label>
                            <div class="col-sm-10">
                                <input type="text" name="judul_donasi" class="form-control" value="{{ $kategori->judul_donasi }}" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="deskripsi" class="col-sm-2 col-form-label">Deskripsi</label>
                            <div class="col-sm-10">
                                <textarea name="deskripsi" class="form-control" rows="4" required>{{ $kategori->deskripsi }}</textarea>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="gambar" class="col-sm-2 col-form-label">Gambar Donasi</label>
                            <div class="col-sm-10">
                                <input type="file" name="gambar" class="form-control" accept="image/*" onchange="previewGambar(event)">
                                <small class="text-muted">Biarkan kosong jika tidak ingin mengganti gambar.</small><br>
                        
                                {{-- Gambar Lama --}}
                                @if ($kategori->gambar)
                                    <p class="mt-2 mb-1">Gambar Lama:</p>
                                    <img src="{{ asset('storage/' . $kategori->gambar) }}" alt="Gambar Lama" class="img-thumbnail mb-2" style="max-width: 200px;">
                                @endif
                        
                                {{-- Preview Gambar Baru --}}
                                <p class="mt-2 mb-1">Preview Gambar Baru:</p>
                                <img id="preview-image" src="#" alt="Preview Gambar Baru" style="display: none; max-width: 200px; border-radius: 8px;">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="target_dana" class="col-sm-2 col-form-label">Target Dana</label>
                            <div class="col-sm-10">
                                <input type="number" name="target_dana" class="form-control" value="{{ $kategori->target_dana }}" required min="0" step="1000">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="jumlah_donatur" class="col-sm-2 col-form-label">Jumlah Donatur</label>
                            <div class="col-sm-10">
                                <input type="number" name="jumlah_donatur" class="form-control" value="{{ $kategori->jumlah_donatur }}" readonly>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="donasi_terkumpul" class="col-sm-2 col-form-label">Donasi Terkumpul</label>
                            <div class="col-sm-10">
                                <input type="number" name="donasi_terkumpul" class="form-control" value="{{ $kategori->donasi_terkumpul }}" readonly>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label for="dedline" class="col-sm-2 col-form-label">Deadline</label>
                            <div class="col-sm-10">
                                <input type="date" name="dedline" class="form-control" value="{{ $kategori->dedline }}" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="status" class="col-sm-2 col-form-label">Status</label>
                            <div class="col-sm-10">
                                <select name="status" class="form-select" required>
                                    <option value="Aktif" {{ $kategori->status == 'Aktif' ? 'selected' : '' }}>Aktif</option>
                                    <option value="Nonaktif" {{ $kategori->status == 'Nonaktif' ? 'selected' : '' }}>Nonaktif</option>
                                </select>
                            </div>
                        </div>

                        <div class="text-end">
                            <button type="submit" class="btn btn-primary" id="btnSubmitEdit">
                                <i class="fa fa-save me-1"></i> Simpan Perubahan
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

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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

    document.getElementById('formEditKategori').addEventListener('submit', function(e) {
        e.preventDefault(); // hentikan submit default

        Swal.fire({
            title: 'Apakah Anda yakin?',
            text: "Perubahan akan disimpan!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Ya, simpan!',
            cancelButtonText: 'Tidak',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                e.target.submit(); // submit form jika dikonfirmasi
            }
        });
    });
</script>

@endsection
