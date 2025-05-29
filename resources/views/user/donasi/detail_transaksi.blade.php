@extends('app_user')
@section('content')

<script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('midtrans.client_key') }}"></script>

<div class="container" style="padding-top: 30px; padding-bottom: 30px;">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="section-tittle text-center mb-3">
                <h2>Detail Transaksi</h2>
            </div>
            <div class="card shadow-sm mx-auto" style="border-radius: 10px; width: 100%; max-width: 500px;">
                <div class="card-body px-4 py-3">
                    <table class="table table-borderless mb-0">
                        <tr>
                            <td>Tanggal</td>
                            <th>{{ now()->format('d M Y') }}</th>
                        </tr>
                        <tr>
                            <td>Kategori Donasi</td>
                            <th>{{ \App\Models\KategoriDonasi::find($request->kategori_donasi_id)->judul_donasi }}</th>
                        </tr>
                        <tr>
                            <td>Nama Donatur</td>
                            <th>{{ $request->nama }}</th>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <th>{{ $request->email }}</th>
                        </tr>
                        <tr>
                            <td>No. WhatsApp</td>
                            <th>{{ $request->telepon }}</th>
                        </tr>
                        <tr>
                            <td>Nominal</td>
                            <th>{{ $formattedNominal }}</th>
                        </tr>
                    </table>

                    <div class="mt-4 text-center">
                        <button id="pay-button" class="genric-btn info w-100" style="border-radius: 8px; font-weight: bold; font-size: 16px;">
                            Bayar Sekarang
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.getElementById('pay-button').addEventListener('click', function () {
        snap.pay('{{ $snapToken }}', {
            onSuccess: function (result) {
                const nominal = '{{ $request->nominal }}';
                const judulDonasi = `{{ \App\Models\KategoriDonasi::find($request->kategori_donasi_id)->judul_donasi }}`;
                
                const pesan = encodeURIComponent(`Anda berhasil melakukan donasi sebesar Rp.${nominal} ke kategori donasi ${judulDonasi}`);
                window.location.href = "{{ route('user.donasi.form_success') }}?pesan=" + pesan;
            },
            onPending: function (result) {
                console.log("Menunggu pembayaran...");
            },
            onError: function (result) {
                alert("Terjadi kesalahan saat pembayaran.");
            },
            onClose: function () {
                alert('Anda menutup popup sebelum menyelesaikan pembayaran.');
            }
        });
    });
</script>

@endsection
