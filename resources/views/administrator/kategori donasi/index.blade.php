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
                        <tr>
                            <td>Berita Duka: Orangtua Asep Berpulang</td>
                            <td></td>
                            <td>
                                <strong>Deskripsi:</strong> Berita duka, telah meninggal dunia Ayahanda dari teman kita Asep pada tanggal 11-01-2025<br>
                                <strong>Target Dana:</strong> Rp 500.000<br>
                                <strong>Jumlah Donatur:</strong> 35<br>
                                <strong>Donasi Terkumpul:</strong> Rp 500.000<br>
                                <strong>Deadline:</strong> 21-01-2025<br>
                                <strong>Tanggal Buat:</strong> 11-01-2025
                            </td>
                            <td class="text-center">
                                <span class="badge badge-danger">Nonaktif</span>
                            </td>
                            <td>                              
                                <div class="form-button-action d-flex gap-2">
                                    <button type="button" class="btn btn-primary rounded-circle d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;" data-bs-toggle="tooltip" title="Edit">
                                        <i class="fa fa-pencil-alt text-white"></i>
                                    </button>
                                    <button type="button" class="btn btn-danger rounded-circle d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;" data-bs-toggle="tooltip" title="Hapus">
                                        <i class="fa fa-trash text-white"></i>
                                    </button>
                                </div>
                            </td>                                
                        </tr>
                        <tr>
                            <td>Berita Duka: Orangtua Asup Berpulang</td>
                            <td></td>
                            <td>
                                <strong>Deskripsi:</strong> Berita duka, telah meninggal dunia Ayahanda dari teman kita Asup pada tanggal 20-02-2025<br>
                                <strong>Target Dana:</strong> Rp 500.000<br>
                                <strong>Jumlah Donatur:</strong> 35<br>
                                <strong>Donasi Terkumpul:</strong> Rp 500.000<br>
                                <strong>Deadline:</strong> 01-03-2025<br>
                                <strong>Tanggal Buat:</strong> 20-02-2025
                            </td>
                            <td class="text-center">
                                <span class="badge badge-success">Aktif</span>
                            </td>
                            <td>                              
                                <div class="form-button-action d-flex gap-2">
                                    <button type="button" class="btn btn-primary rounded-circle d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;" data-bs-toggle="tooltip" title="Edit">
                                        <i class="fa fa-pencil-alt text-white"></i>
                                    </button>
                                    <button type="button" class="btn btn-danger rounded-circle d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;" data-bs-toggle="tooltip" title="Hapus">
                                        <i class="fa fa-trash text-white"></i>
                                    </button>
                                </div>
                            </td>                                
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection