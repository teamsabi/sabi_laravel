@extends('app')
@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4 class="card-title mb-0">Data Donatur</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                <table id="basic-datatables" class="display table table-striped table-hover">
                    <thead>
                        <tr>
                        <th>Nama Donatur</th>
                        <th>Email</th>
                        <th>No WhatsApp</th>
                        <th>Kategori Donasi</th>
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
                        <th>Kategori Donasi</th>
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
                            <td>Berita Duka: Orangtua Asup Berpulang</td>
                            <td>Rp 10.000</td>
                            <td>QRIS</td>
                            <td class="text-center">
                                <span class="badge badge-success">Complete</span>
                            </td>
                            <td>11-01-2025</td>                         
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection