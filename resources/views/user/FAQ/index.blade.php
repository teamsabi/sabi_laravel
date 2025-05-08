@extends('app_user')
@section('content')

<style>
    .faq-container {
        max-width: 800px;
        margin: auto;
    }

    .faq-item {
        background-color: #f9f9f9;
        border-radius: 8px;
        margin-bottom: 15px;
        overflow: hidden;
        box-shadow: 0 2px 8px rgba(0,0,0,0.1);
    }

    .faq-question {
        padding: 15px 20px;
        cursor: pointer;
        font-size: 18px;
        font-weight: bold;
        background-color: #ffffff;
        transition: background-color 0.3s ease;
    }

    .faq-question:hover {
        background-color: #f1f1f1;
    }

    .faq-answer {
        max-height: 0;
        overflow: hidden;
        transition: max-height 0.4s ease;
        padding: 0 20px;
        background-color: #fff;
    }

    .faq-item.active .faq-answer {
        max-height: 500px;
        padding: 15px 20px;
    }
</style>

<div class="our-cases-area" style="padding-top: 50px; padding-bottom: 50px;">
    <div class="container">
        <div class="row justify-content-center text-center mb-5">
            <div class="col-xl-6 col-lg-7 col-md-10 col-sm-10">
                <div class="section-tittle text-center mb-20">
                    <h2>Frequently Asked Question</h2>
                    <p style="font-size: 18px; font-weight: bold;">
                    Yang sering mereka tanyakan tentang JTICare
                    </p>
                </div>
            </div>
        </div>

        <div class="faq-container">
            <div class="faq-item">
                <div class="faq-question">Apa itu JTICare?</div>
                <div class="faq-answer">
                    JTICARE adalah aplikasi berbasis web dan mobile untuk penggalangan dana sosial, seperti bantuan keluarga berduka dan medis, dengan fitur transparan dan mudah digunakan.
                </div>
            </div>
            <div class="faq-item">
                <div class="faq-question">Siapa yang bisa menggunakan JTICare?</div>
                <div class="faq-answer">
                    Aplikasi ini dapat digunakan oleh mahasiswa, dosen, staf, serta alumni Jurusan Teknologi Informasi yang ingin berpartisipasi dalam kegiatan donasi dan aksi sosial.
                </div>
            </div>
            <div class="faq-item">
                <div class="faq-question">Bagaimana cara melakukan donasi melalui JTICare?</div>
                <div class="faq-answer">
                    Pengguna dapat memilih kampanye donasi yang tersedia, memasukkan nominal donasi, dan melakukan pembayaran melalui metode yang disediakan dalam aplikasi.
                </div>
            </div>
            <div class="faq-item">
                <div class="faq-question">Apakah saya bisa mendonasikan uang dalam jumlah kecil?</div>
                <div class="faq-answer">
                    Tentu, JTICare memungkinkan donasi dengan nominal yang fleksibel, jadi kamu bisa mendonasikan sesuai kemampuan, mulai dari jumlah kecil hingga besar.
                </div>
            </div>
            <div class="faq-item">
                <div class="faq-question">Apakah saya bisa membuat kampanye donasi di JTICare?</div>
                <div class="faq-answer">
                    Saat ini, hanya pihak yang terverifikasi (misalnya, admin atau pengelola kampanye) yang dapat membuat kampanye donasi di JTICare. Pengguna biasa hanya dapat berpartisipasi dengan mendonasikan dana ke kampanye yang sudah ada.
                </div>
            </div>
            <div class="faq-item">
                <div class="faq-question">Apakah JTICare aman digunakan?</div>
                <div class="faq-answer">
                    Ya, JTICare menggunakan sistem pembayaran yang aman dan terpercaya, bekerja sama dengan penyedia pembayaran yang terverifikasi, untuk memastikan transaksi yang dilakukan tetap aman dan terlindungi.
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.querySelectorAll('.faq-question').forEach(item => {
        item.addEventListener('click', () => {
            const parent = item.parentElement;
            parent.classList.toggle('active');
        });
    });
</script>

@endsection
