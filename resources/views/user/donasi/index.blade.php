@extends('app_user')

@section('content')

<div class="our-cases-area" style="padding-top: 50px; padding-bottom: 50px;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-6 col-lg-7 col-md-10 col-sm-10">
                <div class="section-tittle text-center mb-80">
                    <h2>Mari Berbagi kebaikan</h2>
                    <p style="font-size: 18px; font-weight: bold;">
                        Sedikit kebaikan dari kita adalah harapan besar bagi mereka yang membutuhkan. Ayo berdonasi sekarang!
                    </p>
                </div>
            </div>
        </div>

        <div class="row">
            @foreach ($kategoriDonasi as $item)
            @php
                // Hitung persentase donasi
                $persen = $item->target_dana > 0 
                    ? round(($item->donasi_terkumpul / $item->target_dana) * 100) 
                    : 0;
                $persen = min($persen, 100); // batasi max 100%
            @endphp
            <div class="col-lg-4 col-md-6 col-sm-6" style="padding-bottom: 50px;">
                <div class="single-cases mb-40 p-3 border rounded shadow h-100 d-flex flex-column" style="background-color: #f8f9fa; min-height: 280px; position: relative;">
                    <div class="cases-img text-center mb-3">
                        <img src="{{ asset('storage/' . $item->gambar) }}" alt="Gambar Donasi" class="img-fluid rounded" style="height: 200px; object-fit: cover;">
                    </div>
                    <div class="cases-caption">
                        <p class="date text-muted">{{ date('d M Y', strtotime($item->tanggal_buat)) }}</p>
                        <h3 class="text-start mb-1" style="font-weight: bold;">
                            <a href="#">{{ $item->judul_donasi }}</a>
                        </h3>
                        <p class="text-start text-muted" style="margin-top: -40px;">
                            {{ Str::limit($item->deskripsi, 100) }}
                        </p>

                        <!-- Progress Bar -->
                        <div class="mt-50"></div>
                        <div class="single-skill mb-15">
                            <div class="bar-progress">
                                <div class="barfiller">
                                    <div class="tipWrap">
                                        <span class="tip">{{ $persen }}%</span>
                                    </div>
                                    <span class="fill" data-percentage="{{ $persen }}" style="width: {{ $persen }}%; background: #1d8cf8;"></span>
                                </div>
                            </div>
                        </div>
                        <!-- / progress -->

                        <div class="prices">
                            <p><strong>Terkumpul :</strong> <span>Rp {{ number_format($item->donasi_terkumpul, 0, ',', '.') }}</span></p>
                            <p><strong>Target :</strong> <span>Rp {{ number_format($item->target_dana, 0, ',', '.') }}</span></p>
                            <p><strong>Donatur :</strong> <span>{{ $item->jumlah_donatur ?? 0 }}</span></p>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        @if ($kategoriDonasi->isEmpty())
            <div class="col-12 text-center">
                <p class="text-muted">Tidak ada kategori donasi yang tersedia.</p>
            </div>
        @endif
    </div>
</div>

@endsection