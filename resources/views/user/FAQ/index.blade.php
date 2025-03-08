@extends('app_user')
@section('content')

<div class="our-cases-area" style="padding-top: 50px; padding-bottom: 50px;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-6 col-lg-7 col-md-10 col-sm-10">
                <div class="section-tittle text-center mb-80">
                    <h2>FAQ</h2>
                    <p style="font-size: 18px; font-weight: bold;">Frequently Asked Question</p>
                </div>
            </div>
        </div>
        <div class="row align-items-center">
            <div class="col-lg-6 col-md-12 order-1 order-lg-1 text-center text-lg-start">
                <div class="about-img mb-3">
                    <img src="{{ asset('template user/assets/img/gallery/about1.png') }}" alt="" class="img-fluid" style="border-radius: 10px;">
                </div>
                <div class="about-img mb-3">
                    <img src="{{ asset('template user/assets/img/gallery/about1.png') }}" alt="" class="img-fluid" style="border-radius: 10px;">
                </div>
                <div class="about-img">
                    <img src="{{ asset('template user/assets/img/gallery/about1.png') }}" alt="" class="img-fluid" style="border-radius: 10px;">
                </div>
            </div>
            <div class="col-lg-6 col-md-12 order-2 order-lg-2">
                <div class="about-caption mb-50">
                    <p style="text-align: justify; font-size: 25px;"><strong>Apa itu JTICare?</strong></p>
                    <p style="text-align: justify;">JTICARE adalah aplikasi berbasis web dan mobile untuk penggalangan dana sosial, seperti bantuan keluarga berduka dan medis, dengan fitur transparan dan mudah digunakan.</p>
                </div>
                <div class="about-caption mb-50">
                    <p style="text-align: justify; font-size: 25px;"><strong>Siapa yang bisa menggunakan JTI Care?</strong></p>
                    <p style="text-align: justify;">Aplikasi ini dapat digunakan oleh mahasiswa, dosen, staf, serta alumni Jurusan Teknologi Informasi yang ingin berpartisipasi dalam kegiatan donasi dan aksi sosial.</p>
                </div>
                <div class="about-caption mb-50">
                    <p style="text-align: justify; font-size: 25px;"><strong>Bagaimana cara melakukan donasi melalui JTI Care?</strong></p>
                    <p style="text-align: justify;">Pengguna dapat memilih kampanye donasi yang tersedia, memasukkan nominal donasi, dan melakukan pembayaran melalui metode yang disediakan dalam aplikasi.</p>
                </div>
                <div class="about-caption mb-50">
                    <p style="text-align: justify; font-size: 25px;"><strong>Apakah saya bisa mendonasikan uang dalam jumlah kecil?</strong></p>
                    <p style="text-align: justify;">Tentu, JTICare memungkinkan donasi dengan nominal yang fleksibel, jadi kamu bisa mendonasikan sesuai kemampuan, mulai dari jumlah kecil hingga besar.</p>
                </div>
                <div class="about-caption mb-50">
                    <p style="text-align: justify; font-size: 25px;"><strong>Apakah saya bisa membuat kampanye donasi di JTICare?</strong></p>
                    <p style="text-align: justify;">Saat ini, hanya pihak yang terverifikasi (misalnya, admin atau pengelola kampanye) yang dapat membuat kampanye donasi di JTICare. Pengguna biasa hanya dapat berpartisipasi dengan mendonasikan dana ke kampanye yang sudah ada.</p>
                </div>
                <div class="about-caption mb-50">
                    <p style="text-align: justify; font-size: 25px;"><strong>Apakah JTICare aman digunakan?</strong></p>
                    <p style="text-align: justify;">Ya, JTICare menggunakan sistem pembayaran yang aman dan terpercaya, bekerja sama dengan penyedia pembayaran yang terverifikasi, untuk memastikan transaksi yang dilakukan tetap aman dan terlindungi.</p>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection