@extends('app_user')
@section('content')

<div class="container py-5">
    <div class="text-center mb-5">
        <h2>Laporan Donasi</h2>
        <p style="font-size: 18px; font-weight: bold;">Informasi donasi kepada penerima secara real-time</p>
    </div>

    <!-- Tombol Filter -->
    <div class="d-flex justify-content-end mb-3">
        <button class="genric-btn info" type="button" data-bs-toggle="collapse" data-bs-target="#filterForm">
            <i class="fas fa-filter me-1"></i> Filter
        </button>
    </div>

    <!-- Form Filter -->
    <div class="collapse mb-3" id="filterForm">
        <form>
            <div class="row">
                <div class="col-md-4 mb-2">
                    <select class="form-control">
                        <option value="">-- Bulan --</option>
                        <option value="1">Januari</option>
                        <option value="2">Februari</option>
                        <option value="3">Maret</option>
                        <option value="4">April</option>
                        <option value="5">Mei</option>
                        <option value="6">Juni</option>
                        <option value="7">Juli</option>
                        <option value="8">Agustus</option>
                        <option value="9">September</option>
                        <option value="10">Oktober</option>
                        <option value="11">November</option>
                        <option value="12">Desember</option>
                    </select>
                </div>
                <div class="col-md-4 mb-2">
                    <select class="form-control">
                        <option value="">-- Tahun --</option>
                        <option value="2024">2024</option>
                        <option value="2025">2025</option>
                        <option value="2026">2026</option>
                    </select>
                </div>
                <div class="col-md-4 mb-2 d-flex gap-2">
                    <button type="submit" class="btn btn-primary w-100">Terapkan</button>
                    <button type="reset" class="btn btn-secondary w-100">Reset</button>
                </div>
            </div>
        </form>
    </div>

    <!-- Tabel Donasi -->
    <div class="table-responsive">
        <table class="table table-bordered text-center">
            <thead class="table-primary">
                <tr>
                    <th>Tanggal</th>
                    <th>Kategori Donasi</th>
                    <th>Nama Penerima</th>
                    <th>Jumlah</th>
                    <th>Keterangan</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>08 Mei 2025</td>
                    <td>Ayah Asep Berpulang</td>
                    <td>Keluarga Asep</td>
                    <td>Rp 1.250.000</td>
                    <td>-</td>
                </tr>
                <tr>
                    <td>08 Mei 2025</td>
                    <td>Ayah Asep Berpulang</td>
                    <td>Keluarga Asep</td>
                    <td>Rp 1.250.000</td>
                    <td>-</td>
                </tr>
                <tr>
                    <td>08 Mei 2025</td>
                    <td>Ayah Asep Berpulang</td>
                    <td>Keluarga Asep</td>
                    <td>Rp 1.250.000</td>
                    <td>-</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

@endsection
