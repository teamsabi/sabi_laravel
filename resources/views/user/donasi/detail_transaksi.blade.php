@extends('app_user')
@section('content')

<div class="container" style="padding-top: 30px; padding-bottom: 30px;">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="section-tittle text-center mb-3">
                <h2>Detail Transaksi</h2>
            </div>
            <div class="card shadow-sm mx-auto" style="border-radius: 10px; width: 100%; max-width: 500px;">
                <div class="card-body px-4 py-3">
                    <table class="table table-borderless mb-0">
                        <tr>
                            <td style="white-space: nowrap;">Tanggal</td>
                            <th>07 Mei 2025</th>
                        </tr>
                        <tr>
                            <td>Kategori Donasi</td>
                            <th>Bantuan untuk Asep</th>
                        </tr>
                        <tr>
                            <td>Nama</td>
                            <th>nadhiy</th>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <th>nadhifatusae@gmail.com</th>
                        </tr>
                        <tr>
                            <td>No. WhatsApp</td>
                            <th>081234567890</th>
                        </tr>
                        <tr>
                            <td>Nominal</td>
                            <th>Rp 50.000</th>
                        </tr>
                    </table>
                    <div class="mt-4 text-center">
                        <a href="#" class="genric-btn info w-100" style="border-radius: 8px; font-weight: bold; font-size: 16px;">Bayar Sekarang</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
