@extends('app_user')
@section('content')

<div class="container mt-5">
    <div class="row">
        <!-- Bagian Donasi Utama -->
        <div class="col-lg-8">
            <div class="card border-0 mb-4">
                <img src="{{ asset('storage/' . $kategori->gambar) }}" alt="{{ $kategori->judul_donasi }}" class="card-img-top mb-3" style="width: 100%; max-height: 350px; object-fit: cover; border-radius: 20px;">
                <div class="card-body px-0">
                    <h5 class="card-title" style="font-size: 30px; font-weight: bold;">{{ $kategori->judul_donasi }}</h5>
                    <p class="mb-3 text-muted" style="font-size: 18px;">{{ $kategori->deskripsi }}</p>

                    <!-- Progress Bar -->
                    <div style="width: 100%; margin-bottom: 10px;">
                        <div class="bar-progress">
                            <div class="barfiller">
                                <div class="tipWrap"><span class="tip"></span></div>
                                <span class="fill" data-percentage="0"></span> <!-- Sesuaikan dengan progress -->
                            </div>
                        </div>
                    </div>

                    <!-- Informasi Dana dan Deadline -->
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <div style="min-width: 130px;">
                            <h6 class="mb-1" style="font-size: 25px; font-weight: bold;">Rp 0</h6> <!-- Belum ada donasi -->
                            <small class="text-muted" style="font-size: 15px;">Dari target Rp {{ number_format($kategori->target_dana, 0, ',', '.') }}</small>
                        </div>
                        <div class="text-end" style="min-width: 80px;">
                            @php
                                use Carbon\Carbon;
                                $hari_tersisa = Carbon::now()->diffInDays(Carbon::parse($kategori->dedline), false);
                            @endphp
                            <span class="fw-bold" style="font-size: 25px;">{{ $hari_tersisa > 0 ? $hari_tersisa : 0 }}</span><br>
                            <small class="text-muted" style="font-size: 15px;">Hari lagi</small>
                        </div>
                    </div>

                    <a href="{{ route('donasi.form_donasi', ['id' => $kategori->id]) }}" class="genric-btn info w-100" style="font-size: 15px; border-radius: 10px;">Donasi Sekarang</a>
                </div>
            </div>
        </div>

        <!-- Donasi Serupa -->
        <div class="col-lg-4">
            <h5 class="fw-bold mb-3" style="font-size: 30px; font-weight: bold; border-bottom: 4px solid #0b1c3957; padding-bottom: 10px;">Donasi Serupa</h5>

            @php
                $donasiSerupa = \App\Models\KategoriDonasi::where('id', '!=', $kategori->id)->latest()->take(4)->get();
            @endphp

            @foreach($donasiSerupa as $donasi)
            <div class="d-flex align-items-start mb-3">
                <img src="{{ asset('storage/' . $donasi->gambar) }}" alt="Donasi Serupa" style="width: 100px; height: 100px; object-fit: cover; border-radius: 10px; margin-right: 16px;">
                <div>
                    <p class="text-start mb-1" style="font-weight: bold;">
                        <a href="{{ route('donasi.detail', $donasi->id) }}" style="color: #0b1c39; text-decoration: none;" onmouseover="this.style.color='blue'" onmouseout="this.style.color='black'">
                            {{ Str::limit($donasi->judul_donasi, 40) }}
                        </a>
                    </p>
                    <small class="text-muted" style="font-size: 15px;">Target Rp {{ number_format($donasi->target_dana, 0, ',', '.') }}</small>
                </div>
            </div>
            @endforeach

        </div>
    </div>
</div>

@endsection
