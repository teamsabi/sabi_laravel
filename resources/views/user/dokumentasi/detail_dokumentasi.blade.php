@extends('app_user')
@section('content')

<div class="our-cases-area py-5" style="background-color: #f9f9f9;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-8 col-lg-9 col-md-10">
                <div class="section-title text-start mb-4">
                    <p class="text-muted mb-1" style="font-size: 14px;">
                        {{ \Carbon\Carbon::parse($dokumentasi->tgl_penyerahan)->format('d F Y') }}
                    </p>
                    <h2 class="mb-4" style="font-size: 32px; font-weight: bold;">
                        Penyerahan Donasi untuk {{ $dokumentasi->judul_dokumentasi }}
                    </h2>
                    <p class="text-muted mb-3" style="font-size: 16px;">
                        <strong>Penerima Donasi: </strong> {{ $dokumentasi->nama_penerima }}
                    </p>
                    <div class="card border-0 shadow-sm mb-4">
                        <img src="{{ asset('storage/'.$dokumentasi->bukti) }}" alt="Dokumentasi Penyerahan" class="img-fluid rounded" style="object-fit: cover; width: 100%; max-height: 450px;">
                    </div>
                    <p class="lead" style="font-size: 16px; line-height: 1.8;">
                        {{ $dokumentasi->deskripsi }}
                    </p>

                    <div class="my-5">
                        <h4 class="mb-4" style="font-size: 20px; font-weight: bold; border-top: 2px solid #0b1c3957; padding-top: 15px;">
                            Dokumentasi Donasi Lainnya
                        </h4>
                        @foreach($dokumentasiLainnya as $item)
                            <div class="d-flex align-items-start mb-3">
                                <img src="{{ asset('storage/'.$item->bukti) }}" alt="Dokumentasi Lainnya" class="me-4 rounded" style="width: 100px; height: 100px; object-fit: cover; border-radius: 5px;">
                                <div style="padding-left: 20px;">
                                    <a href="{{ route('user.dokumentasi.show', $item->id) }}" class="text-decoration-none fw-bold" style="color: #0b1c39;">
                                        {{ $item->judul_dokumentasi }}
                                    </a>
                                    <p class="mb-0 text-muted" style="font-size: 14px; line-height: 1.6;">
                                        {{ Str::limit($item->deskripsi, 100) }}
                                    </p>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <footer class="text-muted mt-5 text-center" style="font-size: 14px;">
                        Dokumentasi ini dibuat oleh Tim JTI CARE – Politeknik Negeri Jember
                    </footer>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
