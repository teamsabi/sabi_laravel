<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Laporan Donatur</title>
    <style>
        body {
            font-family: sans-serif;
            font-size: 12px;
            margin: 20px;
        }

        .kop-surat {
            display: table;
            width: 100%;
            border-bottom: 2px solid black;
            padding-bottom: 10px;
        }

        .kop-kiri, .kop-kanan {
            display: table-cell;
            width: 15%;
            vertical-align: middle;
            text-align: center;
        }

        .kop-tengah {
            display: table-cell;
            width: 70%;
            text-align: center;
            vertical-align: middle;
        }

        .kop-logo {
            width: 80px;
            height: auto;
        }

        .kop-tengah h1 {
            font-size: 16px;
            margin: 0;
        }

        .kop-tengah h2 {
            font-size: 14px;
            margin: 0;
        }

        .kop-tengah h3 {
            font-size: 15px;
            font-weight: bold;
            margin: 4px 0;
        }

        .kop-tengah p {
            font-size: 11px;
            margin: 0;
        }

        .title {
            text-align: center;
            font-size: 18px;
            font-weight: bold;
            margin: 30px 0 10px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #000;
            padding: 6px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    @php
        $logoKiri = base64_encode(file_get_contents(public_path('template/assets/img/POLIJE.png')));
        $logoKanan = base64_encode(file_get_contents(public_path('template/assets/img/HMJTI.png')));
    @endphp

    {{-- Kop Surat --}}
    <div class="kop-surat">
        <div class="kop-kiri">
            <img src="data:image/png;base64,{{ $logoKiri }}" class="kop-logo" alt="Logo POLIJE">
        </div>
        <div class="kop-tengah">
            <h1>POLITEKNIK NEGERI JEMBER</h1>
            <h2>KELUARGA MAHASISWA</h2>
            <h3>HIMPUNAN MAHASISWA JURUSAN<br>TEKNOLOGI INFORMASI</h3>
            <p>Jalan Mastrip Kotak Pos 164 Jember 68121</p>
            <p>Hp. +62 813-3122-7313 | Email: hmjti2024@gmail.com</p>
        </div>
        <div class="kop-kanan">
            <img src="data:image/png;base64,{{ $logoKanan }}" class="kop-logo" alt="Logo HMJTI">
        </div>
    </div>

    {{-- Judul dan Info --}}
    <div class="title">Laporan Data Donatur</div>
    <p><strong>Kategori Donasi:</strong> {{ $kategori->judul_donasi }}</p>
    <p><strong>Tanggal Cetak:</strong> {{ now()->format('d-m-Y H:i') }}</p>

    {{-- Tabel Donatur --}}
    <table>
        <thead>
            <tr>
                <th>Tanggal</th>
                <th>Nama Donatur</th>
                <th>Email</th>
                <th>No WhatsApp</th>
                <th>Metode Pembayaran</th>
                <th>Nominal</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($detailDonatur as $detail)
            <tr>
                <td>{{ \Carbon\Carbon::parse($detail->tanggal_transaksi)->format('d-m-Y') }}</td>
                <td>{{ $detail->nama_donatur }}</td>
                <td>{{ $detail->email }}</td>
                <td>{{ $detail->no_whatsapp }}</td>
                <td>{{ $detail->metode_pembayaran }}</td>
                <td>Rp {{ number_format($detail->nominal, 0, ',', '.') }}</td>
            </tr>
            @empty
            <tr>
                <td colspan="6" style="text-align: center;">Belum ada donatur.</td>
            </tr>
            @endforelse
        </tbody>
        <tfoot>
            <tr>
                <td colspan="5" style="text-align: right;"><strong>Total Donasi</strong></td>
                <td><strong>Rp {{ number_format($totalDana, 0, ',', '.') }}</strong></td>
            </tr>
        </tfoot>
    </table>
</body>
</html>
