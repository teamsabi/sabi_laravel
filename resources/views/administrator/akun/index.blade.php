@extends('app')
@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4 class="card-title mb-0">Data Akun</h4>
                <a href="{{ route('akun.create') }}" class="btn btn-primary btn-round">
                    <i class="fa fa-plus me-1"></i> Tambah
                </a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                <table id="basic-datatables" class="display table table-striped table-hover">
                    <thead>
                        <tr>
                        <th>Nama Lengkap</th>
                        <th>Email</th>
                        <th>No WhatsApp</th>
                        <th>Foto Profil</th>
                        <th>Password</th>
                        <th>Role</th>
                        <th>Tanggal Buat</th>
                        <th>Aksi</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                        <th>Nama Lengkap</th>
                        <th>Email</th>
                        <th>No WhatsApp</th>
                        <th>Foto Profil</th>
                        <th>Password</th>
                        <th>Role</th>
                        <th>Tanggal Buat</th>
                        <th>Aksi</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <tr>
                            <td>Syaiful Amin</td>
                            <td>ipul@gmail.com</td>
                            <td>01234567890</td>
                            <td>-</td>
                            <td>admin123</td>
                            <td>Admin</td>
                            <td>11-01-2025</td>
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
                            <td>Dwi Rasyari Putra</td>
                            <td>putra@gmail.com</td>
                            <td>01234567890</td>
                            <td>-</td>
                            <td>admin123</td>
                            <td>Admin</td>
                            <td>11-01-2025</td>
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
                            <td>Nadhifatus Aulia</td>
                            <td>nadhiu@gmail.com</td>
                            <td>01234567890</td>
                            <td>-</td>
                            <td>admin123</td>
                            <td>Admin</td>
                            <td>11-01-2025</td>
                            <td>                              
                                <div class="form-button-action d-flex gap-2">
                                    <button type="button" class="btn btn-primary rounded-circle d-flex align-items-center justify-content-center"  style="width: 40px; height: 40px;" data-bs-toggle="tooltip" title="Edit">
                                        <i class="fa fa-pencil-alt text-white"></i>
                                    </button>
                                    <button type="button" class="btn btn-danger rounded-circle d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;" data-bs-toggle="tooltip" title="Hapus">
                                        <i class="fa fa-trash text-white"></i>
                                    </button>
                                </div>
                            </td>                                
                        </tr>
                        <tr>
                            <td>Kariena Adelia</td>
                            <td>karin@gmail.com</td>
                            <td>01234567890</td>
                            <td>-</td>
                            <td>admin123</td>
                            <td>Admin</td>
                            <td>11-01-2025</td>
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
                            <td>Achmad Sofyan</td>
                            <td>ardy@gmail.com</td>
                            <td>01234567890</td>
                            <td>-</td>
                            <td>admin123</td>
                            <td>Admin</td>
                            <td>11-01-2025</td>
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