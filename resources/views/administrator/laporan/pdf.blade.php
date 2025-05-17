<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Laporan Donatur</title>
    <style>
        body { font-family: sans-serif; font-size: 12px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #000; padding: 6px; text-align: left; }
        th { background-color: #f2f2f2; }
        .title { text-align: center; font-size: 18px; font-weight: bold; margin-bottom: 20px; }
    </style>
</head>
<body>
    <div class="title">Laporan Data Donatur</div>
    <p><strong>Kategori Donasi:</strong> {{ $kategori->judul_donasi }}</p>
    <p><strong>Tanggal Cetak:</strong> {{ now()->format('d-m-Y H:i') }}</p>

    <table>
        <thead>
            <tr>
                <th>Nama Donatur</th>
                <th>Email</th>
                <th>No WhatsApp</th>
                <th>Nominal</th>
                <th>Metode Pembayaran</th>
                <th>Status</th>
                <th>Tanggal</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($detailDonatur as $detail)
            <tr>
                <td>{{ $detail->nama_donatur }}</td>
                <td>{{ $detail->email }}</td>
                <td>{{ $detail->no_whatsapp }}</td>
                <td>Rp {{ number_format($detail->nominal, 0, ',', '.') }}</td>
                <td>{{ $detail->metode_pembayaran }}</td>
                <td>
                    @if ($detail->status == 'settlement' || $detail->status == 'success')
                        Berhasil
                    @elseif ($detail->status == 'pending')
                        Pending
                    @else
                        Gagal
                    @endif
                </td>
                <td>{{ \Carbon\Carbon::parse($detail->tanggal_transaksi)->format('d-m-Y') }}</td>
            </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <td colspan="6" style="text-align: right;"><strong>Total Donasi</strong></td>
                <td><strong>Rp {{ number_format($totalDana, 0, ',', '.') }}</strong></td>
            </tr>
        </tfoot>
    </table>
</body>
</html>