@extends('app')
@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4 class="card-title mb-0">Dokumentasi Penyerahan</h4>
                <a href="{{ route('dokumentasi.add') }}" class="btn btn-primary btn-round">
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
                            <tr>
                                <td>Donasi untuk Keluarga Asep</td>
                                <td>2025-04-13</td>
                                <td>Ayah Asep Berpulang</td>
                                <td>Keluarga Asep</td>
                                <td>Bantuan dana diserahkan langsung oleh tim JTI CARE di rumah duka.</td>
                                <td>-</td>
                                <td>
                                    <div class="form-button-action d-flex gap-2">
                                        <a href="#" class="btn btn-primary rounded-circle d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;" data-bs-toggle="tooltip" title="Edit">
                                            <i class="fa fa-pencil-alt text-white"></i>
                                        </a>
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
</div>

@endsection
