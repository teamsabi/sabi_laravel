@extends('app')
@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4 class="card-title mb-0">Kategori Donasi</h4>
                <a href="{{ route('kategori.create') }}" class="btn btn-primary btn-round">
                    <i class="fa fa-plus me-1"></i> Tambah
                </a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="basic-datatables" class="display table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>Judul Donasi</th>
                                <th>Gambar</th>
                                <th>Detail Donasi</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Judul Donasi</th>
                                <th>Gambar</th>
                                <th>Detail Donasi</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach($kategoriDonasi as $item)
                            <tr>
                                <td>{{ $item->judul_donasi }}</td>
                                <td>
                                    @if($item->gambar)
                                        <img src="{{ asset('storage/' . $item->gambar) }}" alt="Gambar Donasi" width="100">
                                    @else
                                        <span class="text-muted">Tidak ada gambar</span>
                                    @endif
                                </td>
                                <td>
                                    <strong>Deskripsi:</strong> {{ $item->deskripsi }}<br>
                                    <strong>Target Dana:</strong> Rp {{ number_format($item->target_dana, 0, ',', '.') }}<br>
                                    <strong>Jumlah Donatur:</strong> {{ $item->jumlah_donatur }}<br>
                                    <strong>Donasi Terkumpul:</strong> Rp {{ number_format($item->donasi_terkumpul, 0, ',', '.') }}<br>
                                    <strong>Deadline:</strong> {{ date('d-m-Y', strtotime($item->dedline)) }}<br>
                                    <strong>Tanggal Buat:</strong> {{ date('d-m-Y', strtotime($item->tanggal_buat)) }}
                                </td>
                                <td class="text-center">
                                    <span class="badge {{ $item->status == 'aktif' ? 'badge-success' : 'badge-danger' }}">
                                        {{ ucfirst($item->status) }}
                                    </span>
                                </td>
                                <td>
                                    <div class="form-button-action d-flex gap-2">
                                        <a href="{{ route('kategori.edit', $item->id) }}" class="btn btn-primary rounded-circle d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;" data-bs-toggle="tooltip" title="Edit">
                                            <i class="fa fa-pencil-alt text-white"></i>
                                        </a>
                                        <form id="deleteForm-{{ $item->id }}" action="{{ route('kategori.destroy', $item->id) }}" method="POST" style="display: none;">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                        <button type="button" class="btn btn-danger rounded-circle d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;" data-bs-toggle="tooltip" title="Hapus" onclick="confirmDelete({{ $item->id }})">
                                            <i class="fa fa-trash text-white"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function confirmDelete(id) {
        Swal.fire({
            title: 'Apakah Anda yakin ingin menghapus data?',
            text: "Data yang dihapus tidak bisa dikembalikan!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Ya, Hapus!',
            cancelButtonText: 'Tidak',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('deleteForm-' + id).submit();
            }
        });
    }
</script>

@if(session('success'))
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Berhasil!',
            text: '{{ session('success') }}',
            showConfirmButton: false,
            timer: 2000
        });
    </script>
@endif

@endsection