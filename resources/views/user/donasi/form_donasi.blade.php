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
                <div class="row align-items-start mb-4">
                    <div class="col-lg-5 col-md-12 mb-4 text-center">
                        <div class="about-img">
                            <img src="{{ asset('storage/' . $kategori->gambar) }}" alt="{{ $kategori->judul_donasi }}" class="img-fluid" style="border-radius: 10px;">
                        </div>
                    </div>
                    <div class="col-lg-7 col-md-12">
                        <h5 class="card-title" style="font-size: 30px; font-weight: bold;">{{ $kategori->judul_donasi }}</h5>
                        <p class="mb-3 text-muted" style="font-size: 18px;">{{ $kategori->deskripsi }}</p>

                        <!-- Progress -->
                        <div style="width: 100%; margin-bottom: 10px;">
                            <div class="bar-progress">
                                <div class="barfiller">
                                    <div class="tipWrap"><span class="tip"></span></div>
                                    <span class="fill" data-percentage="0"></span>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <div style="min-width: 130px;">
                                <h6 class="mb-1" style="font-size: 25px; font-weight: bold;">Rp 0</h6>
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
                    </div>
                </div>
                <!-- Pilih Nominal Donasi -->
                <div class="card p-4 mb-4" style="border-radius: 10px; box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1); background-color: #fff;">
                    <h5 class="card-title mb-15" style="font-size: 20px; font-weight: bold;">Pilih Nominal Donasi</h5>
                    <div class="d-flex flex-wrap mb-30" style="gap: 15px;">
                        <button type="button" class="genric-btn default circle btn-nominal" style="font-size: 15px; font-weight: 600; color: rgba(0, 0, 0, 0.7); border: 1px solid #ccc;" data-nominal="1000">Rp 1.000</button>
                        <button type="button" class="genric-btn default circle btn-nominal" style="font-size: 15px; font-weight: 600; color: rgba(0, 0, 0, 0.7); border: 1px solid #ccc;" data-nominal="5000">Rp 5.000</button>
                        <button type="button" class="genric-btn default circle btn-nominal" style="font-size: 15px; font-weight: 600; color: rgba(0, 0, 0, 0.7); border: 1px solid #ccc;" data-nominal="10000">Rp 10.000</button>
                        <button type="button" class="genric-btn default circle btn-nominal" style="font-size: 15px; font-weight: 600; color: rgba(0, 0, 0, 0.7); border: 1px solid #ccc;" data-nominal="20000">Rp 20.000</button>
                        <button type="button" class="genric-btn default circle btn-nominal" style="font-size: 15px; font-weight: 600; color: rgba(0, 0, 0, 0.7); border: 1px solid #ccc;" data-nominal="50000">Rp 50.000</button>
                        <button type="button" class="genric-btn default circle btn-nominal" style="font-size: 15px; font-weight: 600; color: rgba(0, 0, 0, 0.7); border: 1px solid #ccc;" data-nominal="100000">Rp 100.000</button>
                        <button type="button" class="genric-btn default circle btn-nominal" style="font-size: 15px; font-weight: 600; color: rgba(0, 0, 0, 0.7); border: 1px solid #ccc;" data-nominal="200000">Rp 200.000</button>
                        <button type="button" class="genric-btn default circle btn-nominal" style="font-size: 15px; font-weight: 600; color: rgba(0, 0, 0, 0.7); border: 1px solid #ccc;" data-nominal="500000">Rp 500.000</button>
                    </div>
                    <p class="text-muted">atau nominal donasi lainnya (Masukkan dalam kelipatan ribuan)</p>
                    <div class="mb-3">
                        <div class="input-group">
                            <span class="input-group-text bg-white border rounded-start" style="font-size: 18px; font-weight: bold;">Rp</span>
                            <input class="form-control" name="nominal" id="nominal" type="text" style="font-size: 18px; font-weight: bold; padding: 14px 16px; height: 60px;">
                        </div>
                    </div>
                </div>
                
                <!-- Data Donatur -->
                <div class="card p-4 mb-4" style="border-radius: 10px; box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1); background-color: #fff;">
                    <h5 class="card-title mb-15" style="font-size: 20px; font-weight: bold;">Data Donatur</h5>
                    <div class="mb-3">
                        <div class="input-group mb-2">
                            <input class="form-control" name="nama" id="nama" type="text" placeholder="Masukkan nama anda (opsional)" style="font-size: 14px; padding: 14px 16px; height: 50px;">
                        </div>
                        <div class="form-check mt-2" style="display: flex; align-items: center; line-height: 2;">
                            <input class="form-check-input" type="checkbox" id="default-checkbox" style="border: 1px solid #ccc; width: 13px; height: 13px; margin-top: 0;">
                            <label class="form-check-label text-muted mb-0" for="default-checkbox" style="font-size: 12px; margin-left: 6px;">Sembunyikan nama saya (Donasi anonim)</label>
                        </div>                                             
                    </div>
                    <div class="mb-3 d-flex">
                        <input class="form-control" name="email" id="email" type="email" placeholder="Masukkan email anda" style="font-size: 14px; padding: 14px 16px; height: 50px;">   
                        <input class="form-control" name="telepon" id="telepon" type="text" placeholder="0" style="font-size: 14px; padding: 14px 16px; height: 50px; margin-left: 10px;" oninput="this.value = this.value.replace(/[^0-9]/g, '')">
                    </div>                    
                </div>

                <!-- Metode Pembayaran -->
                <div class="card p-0" style="height: 60px; border-radius: 10px; box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1); background-color: #fff;">
                    <div class="d-flex align-items-center" style="height: 100%; padding: 0 1.5rem;">
                        <p style="font-size: 18px; font-weight: bold; margin: 0;">Pilih Metode Pembayaran</p>
                    </div>
                </div>
                <div class="mt-3">
                    <a href="#" class="btn btn-primary w-100" style="border-radius: 10px;">Bayar Sekarang</a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
