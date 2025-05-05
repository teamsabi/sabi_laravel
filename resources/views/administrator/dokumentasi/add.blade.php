@extends('app')
@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title mb-0">Tambah Dokumentasi Penyerahan</h4>
            </div>
            <div class="card-body">
                <form id="form-tambah-dokumentasi" action="{{ route('admin.dokumentasi.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3 row">
                        <label class="col-sm-2 col-form-label">Judul Dokumentasi</label>
                        <div class="col-sm-10">
                            <input type="text" name="judul_dokumentasi" class="form-control" placeholder="Masukkan Judul Dokumentasi" required>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label class="col-sm-2 col-form-label">Tanggal Penyerahan</label>
                        <div class="col-sm-10">
                            <input type="date" name="tgl_penyerahan" class="form-control" max="{{ date('Y-m-d') }}" required>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label class="col-sm-2 col-form-label">Kategori Donasi</label>
                        <div class="col-sm-10">
                            <select name="kategori_donasi" id="kategori_donasi" class="form-control" required>
                                <option value="">Pilih Kategori Donasi</option>
                                @foreach ($kategori as $id => $judul)
                                    <option value="{{ $id }}">{{ $judul }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label class="col-sm-2 col-form-label">Nama Penerima</label>
                        <div class="col-sm-10">
                            <input type="text" name="nama_penerima" class="form-control" placeholder="Masukkan Nama Penerima" required>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label class="col-sm-2 col-form-label">Deskripsi</label>
                        <div class="col-sm-10">
                            <textarea name="deskripsi" class="form-control" rows="4" placeholder="Masukkan Deskripsi" required></textarea>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label class="col-sm-2 col-form-label">Upload Bukti</label>
                        <div class="col-sm-10">
                            <input type="file" name="bukti" class="form-control" accept="image/*" onchange="previewGambar(event)" required>
                            <img id="preview-image" style="max-width: 200px; display: none; margin-top: 10px; border-radius: 8px;">
                        </div>
                    </div>

                    <div class="text-end">
                        <button type="submit" id="btn-simpan" class="btn btn-primary"><i class="fa fa-save me-1"></i> Simpan</button>
                        <a href="{{ route('admin.dokumentasi.index') }}" class="btn btn-danger"><i class="fa fa-arrow-left me-1"></i> Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')
<script>
    document.getElementById('kategori_donasi').addEventListener('change', function () {
        const selectedText = this.options[this.selectedIndex].text;
        document.querySelector('input[name="judul_dokumentasi"]').value = selectedText;
    });

    function previewGambar(event) {
        const image = document.getElementById('preview-image');
        image.src = URL.createObjectURL(event.target.files[0]);
        image.style.display = 'block';
    }

    // SweetAlert konfirmasi saat simpan
    document.getElementById('form-tambah-dokumentasi').addEventListener('submit', function(event) {
        event.preventDefault();
        
        Swal.fire({
            title: 'Yakin ingin menyimpan?',
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
@endpush
