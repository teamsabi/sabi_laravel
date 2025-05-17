@extends('app')
@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <div>
                    <h4 class="card-title mb-0">Data Donatur</h4>
                    <h6 class="op-7 mb-2">Kategori Donasi : {{ $kategori->judul_donasi }}</h6>
                </div>
                <div>
                    <a href="{{ route('laporan.print', $kategori->id) }}" class="btn btn-primary" target="_blank">
                        <i class="fa fa-print me-1"></i> Print
                    </a>
                </div>            
            </div>
            <div class="card-body">
                <div class="table-responsive">
                <table id="basic-datatables" class="display table table-striped table-hover">
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
                    <tfoot>
                        <tr>
                        <th>Nama Donatur</th>
                        <th>Email</th>
                        <th>No WhatsApp</th>
                        <th>Nominal</th>
                        <th>Metode Pembayaran</th>
                        <th>Status</th>
                        <th>Tanggal</th>
                            </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($detailDonatur as $detail)
                        <tr>
                            <td>{{ $detail->nama_donatur }}</td>
                            <td>{{ $detail->email }}</td>
                            <td>{{ $detail->no_whatsapp }}</td>
                            <td>Rp {{ number_format($detail->nominal, 0, ',', '.') }}</td>
                            <td>{{ $detail->metode_pembayaran }}</td>
                            <td class="text-center">
                                @if ($detail->status == 'settlement' || $detail->status == 'success')
                                    <span class="badge badge-success">Berhasil</span>
                                @elseif ($detail->status == 'pending')
                                    <span class="badge badge-warning">Pending</span>
                                @else
                                    <span class="badge badge-danger">Gagal</span>
                                @endif
                            </td>
                            <td>{{ \Carbon\Carbon::parse($detail->tanggal_transaksi)->format('d-m-Y') }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                </div>
                <div class="d-flex justify-content-between align-items-center mt-4">
                    <a href="{{ url()->previous() }}" class="btn btn-danger">
                        <i class="fa fa-arrow-left me-1"></i> Kembali
                    </a>
                    <div class="d-flex align-items-center">
                        <label class="fw-bold me-2 mb-0">Total Donasi :</label>
                        <input type="text" class="form-control w-auto" value="Rp {{ number_format($totalDana, 0, ',', '.') }}" readonly>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection