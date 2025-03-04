@extends('app')
@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title mb-0">Laporan</h4>
                <h6 class="op-7 mb-2">Pilih salah satu kategori donasi!</h6>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6 col-lg-4 mb-4">
        <div class="card card-post card-round">
            <img class="card-img-top" src="{{ asset('template/assets/img/blogpost.jpg') }}" alt="Card image cap"/>
            <div class="card-body">
                <div class="d-flex">
                    <div class="info-post ms-2">
                        <p class="date text-muted">11 Januari 2025</p>
                    </div>
                </div>
                <div class="separator-solid"></div>
                <p class="card-category text-info mb-1">
                    <a href="#">Berita Duka</a>
                </p>
                <h3 class="card-title">
                    <a href="#">Orangtua Asep Berpulang</a>
                </h3>
                <p class="card-text">
                    Berita duka, telah meninggal dunia Ayahanda dari teman kita Asep pada tanggal 11-01-2025.
                </p>
                <a href="{{ route('laporan.riwayat') }}" class="btn btn-primary btn-rounded btn-sm">Baca Selengkapnya</a>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-lg-4 mb-4">
        <div class="card card-post card-round">
            <img class="card-img-top" src="{{ asset('template/assets/img/blogpost.jpg') }}" alt="Card image cap"/>
            <div class="card-body">
                <div class="d-flex">
                    <div class="info-post ms-2">
                        <p class="date text-muted">20 Februari 2025</p>
                    </div>
                </div>
                <div class="separator-solid"></div>
                <p class="card-category text-info mb-1">
                    <a href="#">Berita Duka</a>
                </p>
                <h3 class="card-title">
                    <a href="#">Orangtua Asup Berpulang</a>
                </h3>
                <p class="card-text">
                    Berita duka, telah meninggal dunia Ayahanda dari teman kita Asup pada tanggal 20-02-2025.
                </p>
                <a href="{{ route('laporan.riwayat') }}" class="btn btn-primary btn-rounded btn-sm">Baca Selengkapnya</a>
            </div>
        </div>
    </div>
</div>
@endsection