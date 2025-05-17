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

    @if ($kategoriDonasi->isEmpty())
        <div class="col-12 text-center">
            <p class="text-muted">Tidak ada kategori donasi yang tersedia.</p>
        </div>
    @else
    <div class="row">
        @foreach ($kategoriDonasi as $donasi)
            <div class="col-md-6 col-lg-4 mb-4">
                <div class="card card-post card-round">
                    <img class="card-img-top" src="{{ asset('storage/' . $donasi->gambar) }}" alt="Gambar Donasi" />
                    <div class="card-body">
                        <div class="d-flex">
                            <div class="info-post ms-2">
                                <p class="date text-muted">{{ \Carbon\Carbon::parse($donasi->tanggal_buat)->format('d F Y') }}</p>
                            </div>
                        </div>
                        <div class="separator-solid"></div>
                        <h3 class="card-title">
                            <a href="#">{{ $donasi->judul_donasi }}</a>
                        </h3>
                        <p class="card-text">
                            {{ Str::limit($donasi->deskripsi, 100) }}
                        </p>
                        <a href="{{ route('laporan.detail', $donasi->id) }}" class="btn btn-primary btn-rounded btn-sm">Lihat Detail</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endif

@endsection
