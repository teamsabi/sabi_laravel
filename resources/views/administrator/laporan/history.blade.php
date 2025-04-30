@extends('app')
@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <div>
                    <h4 class="card-title mb-0">Data Donatur</h4>
                    <h6 class="op-7 mb-2">Pilih salah satu kategori donasi!</h6>
                </div>
                <div>
                    <button onclick="window.print()" class="btn btn-primary">
                        <i class="fa fa-print me-1"></i> Print
                    </button>
                </div>            
            </div>
            <div class="card-body">
                <div class="table-responsive">
                <table id="basic-datatables" class="display table table-striped table-hover">
                    <thead>
                        <tr>
                        <th>Nama Donatur</th>
                        <th>Email</th>
                        <th>No WhatsApp</th>
                        <th>Nominal</th>
                        <th>Metode Pembayaran</th>
                        <th>Status</th>
                        <th>Tanggal</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                        <th>Nama Donatur</th>
                        <th>Email</th>
                        <th>No WhatsApp</th>
                        <th>Nominal</th>
                        <th>Metode Pembayaran</th>
                        <th>Status</th>
                        <th>Tanggal</th>
                            </tr>
                    </tfoot>
                    <tbody>
                        <tr>
                            <td>Syaiful Amin</td>
                            <td>ipul@gmail.com</td>
                            <td>01234567890</td>
                            <td>Rp 10.000</td>
                            <td>QRIS</td>
                            <td class="text-center">
                                <span class="badge badge-success">Berhasil</span>
                            </td>
                            <td>11-01-2025</td>                         
                        </tr>
                        <tr>
                            <td>Dwi Rasyari Putra</td>
                            <td>putra@gmail.com</td>
                            <td>01234567890</td>
                            <td>Rp 3.000</td>
                            <td>DANA</td>
                            <td class="text-center">
                                <span class="badge badge-success">Berhasil</span>
                            </td>   
                            <td>11-01-2025</td>                           
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="mt-4">
                <a href="{{ url()->previous() }}" class="btn btn-danger">
                    <i class="fa fa-arrow-left me-1"></i> Kembali
                </a>
            </div>
        </div>
    </div>
</div>
@endsection