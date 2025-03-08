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
                        @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->nama_lengkap }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->no_whatsapp }}</td>
                            <td>
                                @if($user->foto_profil)
                                    <img src="{{ asset('storage/' . $user->foto_profil) }}" alt="Foto Profil" width="40" class="rounded-circle">
                                @else
                                    <span>-</span>
                                @endif
                            </td>
                            <td>****</td> {{-- Jangan tampilkan password untuk alasan keamanan --}}
                            <td>{{ ucfirst($user->role) }}</td>
                            <td>{{ $user->created_at->format('d-m-Y') }}</td>
                            <td>
                                <div class="form-button-action d-flex gap-2">
                                    <a href="{{ route('akun.edit', $user->id) }}" class="btn btn-primary rounded-circle d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;" data-bs-toggle="tooltip" title="Edit">
                                        <i class="fa fa-pencil-alt text-white"></i>
                                    </a>
                                    <form action="{{ route('akun.destroy', $user->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus akun ini?')">
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
@endsection