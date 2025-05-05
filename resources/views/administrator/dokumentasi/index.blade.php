@extends('app')
@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4 class="card-title mb-0">Dokumentasi Penyerahan</h4>
                <a href="{{ route('admin.dokumentasi.add') }}" class="btn btn-primary btn-round">
                    <i class="fa fa-plus me-1"></i> Tambah
                </a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="basic-datatables" class="display table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>Judul</th>
                                <th>Tanggal Penyerahan</th>
                                <th>Kategori Donasi</th>
                                <th>Penerima Donasi</th>
                                <th>Deskripsi</th>
                                <th>Bukti</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Judul</th>
                                <th>Tanggal Penyerahan</th>
                                <th>Kategori Donasi</th>
                                <th>Penerima Donasi</th>
                                <th>Deskripsi</th>
                                <th>Bukti</th>
                                <th>Aksi</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($dokumentasi as $dok)
                                <tr>
                                    <td>{{ $dok->judul_dokumentasi }}</td>
                                    <td>{{ $dok->tgl_penyerahan }}</td>
                                    <td>{{ $dok->kategoriDonasi->judul_donasi }}</td>
                                    <td>{{ $dok->nama_penerima }}</td>
                                    <td>{{ Str::limit($dok->deskripsi, 50) }}</td>
                                    <td>
                                        @if($dok->bukti)
                                            <img src="{{ asset('storage/'.$dok->bukti) }}" alt="Bukti" style="width: 80px; height: 80px; object-fit: cover;">
                                        @else
                                            <span>-</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="form-button-action d-flex gap-2">
                                            <a href="{{ route('admin.dokumentasi.edit', $dok->id) }}" class="btn btn-primary rounded-circle d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;" data-bs-toggle="tooltip" title="Edit">
                                                <i class="fa fa-pencil-alt text-white"></i>
                                            </a>
                                            <form class="form-delete" action="{{ route('admin.dokumentasi.destroy', $dok->id) }}" method="POST" data-id="{{ $dok->id }}">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger rounded-circle d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;" data-bs-toggle="tooltip" title="Hapus">
                                                    <i class="fa fa-trash text-white"></i>
                                                </button>
                                            </form>
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

@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    $(document).ready(function () {
        if (!$.fn.DataTable.isDataTable('#basic-datatables')) {
            $('#basic-datatables').DataTable({
                responsive: true,
                language: {
                    searchPlaceholder: "Cari Dokumentasi",
                    sSearch: "",
                    lengthMenu: "_MENU_ items/page",
                }
            });
        }

        // Konfirmasi hapus dengan SweetAlert
        $('.form-delete').on('submit', function(e) {
            e.preventDefault();
            let form = this;

            Swal.fire({
                title: 'Yakin ingin menghapus?',
                text: "Data tidak dapat dikembalikan!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        });

        // SweetAlert notifikasi sukses tambah/edit
        @if (session('success'))
            Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                text: '{{ session('success') }}',
                showConfirmButton: false,
                timer: 2500
            });
        @endif
    });
</script>
@endpush
