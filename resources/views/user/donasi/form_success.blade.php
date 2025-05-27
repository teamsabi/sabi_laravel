@extends('app_user')
@section('content')

<script src="https://unpkg.com/@dotlottie/player-component@2.7.12/dist/dotlottie-player.mjs" type="module"></script>

<div class="container" style="padding-top: 30px; padding-bottom: 30px;">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm mx-auto" style="border-radius: 10px; width: 100%; max-width: 390px;">
                <div class="card-body px-4 py-3">
                    <div class="mt-4 text-center">

                        <!-- Animasi Lottie dipusatkan -->
                        <dotlottie-player 
                            src="https://lottie.host/11fea6ea-fae8-44eb-b695-8a89f59717b8/CQlJsyh15X.lottie" 
                            background="transparent" 
                            speed="1" 
                            style="width: 300px; height: 300px; margin: 0 auto; display: block;" 
                            loop autoplay>
                        </dotlottie-player>

                        <p style="font-size: 16px; color: #444; font-weight: bold;">
                            <strong>Lihat dan tingkatkan terus kontribusimu di <br>aplikasi JTICare</strong>
                        </p>
                        <p style="font-size: 16px; color: #444;">
                            Bukan hanya riwayat donasi, kamu juga bisa melihat dampak nyata dari bantuanmu.
                        </p>

                        <button id="pay-button" class="genric-btn info w-100" style="border-radius: 8px; font-weight: bold; font-size: 16px;">
                            Download Aplikasi Sekarang
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
