@extends('app')
@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title mb-0">Edit Dokumentasi Penyerahan</h4>
            </div>
            <div class="card-body">
                <form id="form-edit-dokumentasi" action="{{ route('admin.dokumentasi.update', $dokumentasi->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-3 row">
                        <label class="col-sm-2 col-form-label">Judul Dokumentasi</label>
                        <div class="col-sm-10">
                            <input type="text" name="judul_dokumentasi" class="form-control" value="{{ old('judul_dokumentasi', $dokumentasi->judul_dokumentasi) }}" required>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label class="col-sm-2 col-form-label">Tanggal Penyerahan</label>
                        <div class="col-sm-10">
                            <input type="date" name="tgl_penyerahan" class="form-control" max="{{ date('Y-m-d') }}" value="{{ old('tgl_penyerahan', $dokumentasi->tgl_penyerahan) }}" required>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label class="col-sm-2 col-form-label">Kategori Donasi</label>
                        <div class="col-sm-10">
                            <select name="kategori_donasi" class="form-control" required>
                                <option value="">Pilih Kategori Donasi</option>
                                @foreach ($kategori as $id => $judul)
                                    <option value="{{ $id }}" {{ old('kategori_donasi', $dokumentasi->kategori_donasi_id) == $id ? 'selected' : '' }}>{{ $judul }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label class="col-sm-2 col-form-label">Nama Penerima</label>
                        <div class="col-sm-10">
                            <input type="text" name="nama_penerima" class="form-control" value="{{ old('nama_penerima', $dokumentasi->nama_penerima) }}" required>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label class="col-sm-2 col-form-label">Deskripsi</label>
                        <div class="col-sm-10">
                            <textarea name="deskripsi" class="form-control" rows="4" required>{{ old('deskripsi', $dokumentasi->deskripsi) }}</textarea>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label class="col-sm-2 col-form-label">Upload Bukti</label>
                        <div class="col-sm-10">
                            <input type="file" name="bukti" class="form-control" accept="image/*" onchange="previewGambar(event)">
                            
                            <p class="mt-2 mb-1">Preview Gambar Baru:</p>
                            <img id="preview-image" src="#" style="max-width: 200px; display: none; border-radius: 8px;">

                            @if($dokumentasi->bukti)
                                <p class="mt-3 mb-1">Gambar Sebelumnya:</p>
                                <img src="{{ asset('storage/' . $dokumentasi->bukti) }}" style="max-width: 200px; border-radius: 8px;">
                            @endif
                        </div>
                    </div>

                    <div class="text-end">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-save me-1"></i> Simpan Perubahan</button>
                        <a href="{{ route('admin.dokumentasi.index') }}" class="btn btn-danger"><i class="fa fa-arrow-left me-1"></i> Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
function previewGambar(event) {
    const image = document.getElementById('preview-image');
    image.src = URL.createObjectURL(event.target.files[0]);
    image.style.display = 'block';
}

document.getElementById('form-edit-dokumentasi').addEventListener('submit', function(event) {
    event.preventDefault();
    
    Swal.fire({
        title: 'Yakin ingin menyimpan perubahan?',
        text: 'Pastikan data yang Anda masukkan sudah benar.',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Simpan',
        cancelButtonText: 'Batal'
    }).then((result) => {
        if (result.isConfirmed) {
            this.submit();
        }
    });
});
</script>

@endsection
