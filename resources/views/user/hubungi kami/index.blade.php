@extends('app_user')

@section('content')

    <div class="our-cases-area" style="padding-top: 50px; padding-bottom: 50px;">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-6 col-lg-7 col-md-10 col-sm-10">
                    <div class="section-tittle text-center mb-30">
                        <h2>Hubungi Kami</h2>
                        <p style="font-size: 18px; font-weight: bold;">
                            Ada pertanyaan dan saran? Kirimkan pesan kepada kami
                        </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <!-- Form Kontak -->
                <div class="col-lg-8">
                    <form action="{{ route('hubungi.kami.kirim') }}" method="POST" id="formHubungiKami">
                        @csrf
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="email" style="font-weight: bold; font-size: 16px;">Email</label>
                                    <input class="form-control" type="email" value="{{ Auth::user()->email }}" disabled style="font-size: 14px; padding: 14px 16px; height: 50px;">
                                    <input type="hidden" name="email" value="{{ Auth::user()->email }}">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="nama" style="font-weight: bold; font-size: 16px;">Nama</label>
                                    <input class="form-control" type="text" value="{{ Auth::user()->nama_lengkap }}" disabled style="font-size: 14px; padding: 14px 16px; height: 50px;">
                                    <input type="hidden" name="nama" value="{{ Auth::user()->nama_lengkap }}">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="pesan" style="font-weight: bold; font-size: 16px;">Pesan</label>
                                    <textarea class="form-control w-100" name="pesan" id="pesan" cols="30" rows="9" placeholder="Tulis pesan anda di sini" style="font-size: 14px; padding: 14px 16px;" required></textarea>
                                </div>
                            </div>
                            <div class="header-center-btn" style="display: flex; justify-content: center; align-items: center; width: 100%; padding: 30px;">
                                <button type="submit" class="btn btn-primary" style="border-radius: 10px; font-size: 18px;">Kirim</button>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- Info Kontak -->
                <div class="col-lg-4" style="padding-top: 30px;">
                    <div class="d-flex flex-column justify-content-start h-100 pt-2">
                        <div class="media contact-info mb-4">
                            <span class="contact-info__icon"><i class="ti-location-pin"></i></span>
                            <div class="media-body">
                                <h3>Alamat</h3>
                                <p>Jl. Mastrip, Krajan Timur, Sumbersari, Kec. Sumbersari, Kabupaten Jember, Jawa Timur 68121</p>
                            </div>
                        </div>
                        <div class="media contact-info mb-4">
                            <span class="contact-info__icon"><i class="ti-mobile"></i></span>
                            <div class="media-body">
                                <h3>Telepon</h3>
                                <p>+62 858-0727-8580</p>
                            </div>
                        </div>
                        <div class="media contact-info">
                            <span class="contact-info__icon"><i class="ti-email"></i></span>
                            <div class="media-body">
                                <h3>Email</h3>
                                <p>sabiteam23@gamil.com</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @if (session('success'))
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Berhasil',
            text: '{{ session('success') }}',
            confirmButtonText: 'Oke'
        });
    </script>
    @endif
        
@endsection
