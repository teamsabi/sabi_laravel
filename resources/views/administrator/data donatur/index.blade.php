@extends('app')
@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4 class="card-title mb-0">Data Donatur</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                <table id="basic-datatables" class="display table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>Nama Donatur</th>
                            <th>Email</th>
                            <th>No WhatsApp</th>
                            <th>Kategori Donasi</th>
                            <th>Nominal</th>
                            <th>Metode Pembayaran</th>
                            <th>Status</th>
                            <th>Tanggal</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Nama Donatur</th>
                            <th>Email</th>
                            <th>No WhatsApp</th>
                            <th>Kategori Donasi</th>
                            <th>Nominal</th>
                            <th>Metode Pembayaran</th>
                            <th>Status</th>
                            <th>Tanggal</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach($detailDonaturs as $detail)
                        <tr>
                            <td>{{ $detail->nama_donatur }}</td>
                            <td>{{ $detail->email }}</td>
                            <td>{{ $detail->no_whatsapp }}</td>
                            <td>{{ $detail->kategori_donasi }}</td>
                            <td>Rp {{ number_format($detail->nominal, 0, ',', '.') }}</td>
                            <td>{{ strtoupper($detail->metode_pembayaran) }}</td>
                            <td class="text-center">
                                @if ($detail->status == 'success')
                                    <span class="badge badge-success">Berhasil</span>
                                @elseif ($detail->status == 'pending')
                                    <span class="badge badge-warning">Pending</span>
                                @elseif ($detail->status == 'failed')
                                    <span class="badge badge-danger">Gagal</span>
                                @else
                                    <span class="badge badge-secondary">{{ ucfirst($detail->status) }}</span>
                                @endif
                            </td>
                            <td>{{ \Carbon\Carbon::parse($detail->tanggal_transaksi)->format('d-m-Y') }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection