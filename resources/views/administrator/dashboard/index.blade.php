@extends('app')
@section('content')

<!-- SweetAlert untuk notifikasi sukses -->
@if (Session::has('success'))
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            Swal.fire({
                title: "Berhasil!",
                text: "{{ Session::get('success') }}",
                icon: "success",
                confirmButtonColor: "#3085d6",
                confirmButtonText: "OK"
            });
        });
    </script>
@endif

<!-- Pengecekan jika tidak ada kategori -->
@if (!$kategoriTerbaru)
    <div class="alert alert-warning text-center">
        <h4><i class="fas fa-exclamation-circle"></i> Tidak ada kategori donasi!</h4>
        <p>Silakan tambahkan kategori donasi terlebih dahulu untuk melihat statistik.</p>
    </div>
@else
<!-- Info kategori terbaru -->
<div class="row mb-4">
    <div class="col-12">
        <div class="alert alert-info" role="alert">
            <strong>Statistik Berdasarkan Kategori Donasi Terbaru :</strong> {{ $kategoriTerbaru->judul_donasi }}
        </div>
    </div>
</div>

<!-- Card Statistik -->
<div class="row">
    <div class="col-sm-6 col-md-3">
        <div class="card card-stats card-round">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-icon">
                        <div class="icon-big text-center icon-primary bubble-shadow-small">
                            <i class="fas fa-users"></i>
                        </div>
                    </div>
                    <div class="col col-stats ms-3 ms-sm-0">
                        <div class="numbers">
                            <p class="card-category">Jumlah Donatur</p>
                            <h4 class="card-title">{{ $jumlahDonatur }}</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-md-3">
        <div class="card card-stats card-round">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-icon">
                        <div class="icon-big text-center icon-warning bubble-shadow-small">
                            <i class="fas fa-wallet"></i>
                        </div>
                    </div>
                    <div class="col col-stats ms-3 ms-sm-0">
                        <div class="numbers">
                            <p class="card-category">Jumlah Donasi</p>
                            <h4 class="card-title">
                                <span style="font-size: 16px;">Rp {{ number_format($jumlahDonasi, 0, ',', '.') }}</span>
                            </h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-md-3">
        <div class="card card-stats card-round">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-icon">
                        <div class="icon-big text-center icon-success bubble-shadow-small">
                            <i class="far fa-check-circle"></i>
                        </div>
                    </div>
                    <div class="col col-stats ms-3 ms-sm-0">
                        <div class="numbers">
                            <p class="card-category">Donasi Sukses</p>
                            <h4 class="card-title">{{ $donasiSukses }}</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-md-3">
        <div class="card card-stats card-round">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-icon">
                        <div class="icon-big text-center icon-primary bubble-shadow-small" style="background-color: #F5F516; color: #ffffff;">
                            <i class="fa fa-hourglass-half"></i>
                        </div>
                    </div>
                    <div class="col col-stats ms-3 ms-sm-0">
                        <div class="numbers">
                            <p class="card-category">Donasi Aktif</p>
                            <h4 class="card-title">{{ $donasiAktif }}</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Grafik dan Statistik Bulanan -->
<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <div class="card-title">Statistik Donatur Per Bulan ({{ now()->year }})</div>
            </div>
            <div class="card-body">
                <div class="chart-container">
                    <canvas id="barChart"></canvas>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4 d-flex flex-column">
        <div class="card card-primary card-round">
            <div class="card-header">
                <div class="card-head-row">
                    <div class="card-title">Donasi bulan ini</div>
                </div>
                <div class="card-category">
                    {{ \Carbon\Carbon::now()->startOfMonth()->translatedFormat('d F') }} - 
                    {{ \Carbon\Carbon::now()->endOfMonth()->translatedFormat('d F') }}
                </div>
            </div>
            <div class="card-body pb-0">
                <div class="mb-4 mt-2">
                    <h1>Rp {{ number_format($danaTerkumpulbullanini, 0, ',', '.') }}</h1>
                </div>
            </div>
        </div>
        <div class="card card-round mt-3 flex-grow-1">
            <div class="card-body pb-0">
                <div class="h1 fw-bold float-end text-primary">
                    {{ $jumlahDonaturbulanini }}
                </div>
                <h2 class="mb-2">{{ $jumlahDonaturbulanini }}</h2>
                <p class="text-muted">Donatur bulan ini</p>
                <div class="pull-in sparkline-fix">
                    <div id="lineChart"></div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('barChart').getContext('2d');
    const barChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: {!! json_encode($bulan) !!},
            datasets: [{
                label: 'Jumlah Donatur',
                backgroundColor: '#1d7af3',
                borderColor: '#1d7af3',
                data: {!! json_encode($jumlahDonaturPerBulan) !!}
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: { display: false }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        precision: 0
                    }
                }
            }
        }
    });
</script>
@endif
@endsection
