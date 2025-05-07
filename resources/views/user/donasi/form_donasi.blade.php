@extends('app_user')
@section('content')

<div class="our-cases-area" style="padding-top: 30px; padding-bottom: 30px;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-6 col-lg-7 col-md-10 col-sm-10">
                <div class="section-tittle text-center mb-5">
                    <h2>Kamu Akan Berdonasi</h2>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-10 col-md-12">
                {{-- Informasi Kategori Donasi --}}
                <div class="row align-items-start mb-4">
                    <div class="col-lg-5 text-center">
                        <img src="{{ asset('storage/' . $kategori->gambar) }}" alt="{{ $kategori->judul_donasi }}" class="img-fluid" style="border-radius: 10px;">
                    </div>
                    <div class="col-lg-7">
                        <h5 style="font-size: 30px; font-weight: bold;">{{ $kategori->judul_donasi }}</h5>
                        <p class="mb-3 text-muted" style="font-size: 18px;">{{ $kategori->deskripsi }}</p>

                        <div style="width: 100%; margin-bottom: 10px;">
                            <div class="bar-progress">
                                <div class="barfiller"><div class="tipWrap"><span class="tip"></span></div><span class="fill" data-percentage="0"></span></div>
                            </div>
                        </div>

                        <div class="d-flex justify-content-between mb-3">
                            <div>
                                <h6 style="font-size: 25px; font-weight: bold;">Rp 0</h6>
                                <small class="text-muted">Dari target Rp {{ number_format($kategori->target_dana, 0, ',', '.') }}</small>
                            </div>
                            <div class="text-end">
                                @php
                                    use Carbon\Carbon;
                                    $hari_tersisa = Carbon::now()->diffInDays(Carbon::parse($kategori->dedline), false);
                                @endphp
                                <span style="font-size: 25px;">{{ $hari_tersisa > 0 ? $hari_tersisa : 0 }}</span><br>
                                <small class="text-muted">Hari lagi</small>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Pilih Nominal Donasi --}}
                <div class="card p-4 mb-4" style="border-radius: 10px; box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1); background-color: #fff;">
                    <h5 class="card-title mb-15" style="font-size: 20px; font-weight: bold;">Pilih Nominal Donasi</h5>
                    <div class="d-flex flex-wrap gap-2 mb-3" style="gap: 15px;">
                        @foreach ([1000, 5000, 10000, 20000, 50000, 100000, 200000, 500000] as $nominal)
                            <button type="button" class="genric-btn default circle btn-nominal" style="font-size: 15px; font-weight: 600; color: rgba(0, 0, 0, 0.7); border: 1px solid #ccc;" data-nominal="{{ $nominal }}">
                                Rp {{ number_format($nominal, 0, ',', '.') }}
                            </button>
                        @endforeach
                    </div>
                    <p class="text-muted">Atau nominal lainnya (kelipatan ribuan)</p>
                    <div class="mb-3">
                        <div class="input-group">
                            <span class="input-group-text bg-white border rounded-start" style="font-size: 18px; font-weight: bold;">Rp</span>
                            <input class="form-control" name="nominal" id="nominal" type="text" style="font-size: 18px; font-weight: bold; padding: 14px 16px; height: 60px;">
                        </div>
                    </div>
                </div>

                {{-- Data Donatur --}}
                <div class="card p-4 mb-4" style="border-radius: 10px; box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1); background-color: #fff;">
                    <h5 class="card-title mb-15" style="font-size: 20px; font-weight: bold;">Data Donatur</h5>
                    <div class="mb-3">
                        <div class="input-group mb-2">
                            <input class="form-control" name="nama" id="nama" type="text" style="font-size: 14px; padding: 14px 16px; height: 50px;" value="{{ Auth::user()->nama_lengkap }}" readonly>
                        </div>
                    </div>
                    <div class="mb-3 d-flex gap-2">
                        <input class="form-control" name="email" id="email" type="email" style="font-size: 14px; padding: 14px 16px; height: 50px;" value="{{ Auth::user()->email }}" readonly>
                        <input class="form-control" name="telepon" id="telepon" type="text" style="font-size: 14px; padding: 14px 16px; height: 50px; margin-left: 10px;" value="{{ Auth::user()->no_whatsapp }}" readonly>
                    </div>
                </div>
                <div class="mt-3">
                    <a href="{{ route('user.donasi.detail_transaksi') }}" class="genric-btn info w-100" style="font-size: 15px; border-radius: 10px;">Lanjut Pembayaran</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
