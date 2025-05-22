@extends('app_user')

@section('content')
<div class="our-cases-area py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-6 col-lg-7 col-md-10 col-sm-10">
                <div class="section-tittle text-center mb-5">
                    <h2>Laporan Donasi</h2>
                    <p style="font-size: 18px; font-weight: bold;">
                        Informasi donasi kepada penerima secara real - time.
                    </p>
                </div>
            </div>
        </div>

        <!-- Tombol Filter -->
        <div class="mb-4" style="display: flex; justify-content: flex-end;">
            <button class="genric-btn info d-flex align-items-center gap-2" style="border-radius: 8px;" data-bs-toggle="modal" data-bs-target="#filterModal">
                <i class="fas fa-filter"></i> Filter
            </button>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="filterModal" tabindex="-1" aria-labelledby="filterModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content p-4">
                    <div class="modal-header border-0">
                        <h5 class="modal-title fw-bold" id="filterModalLabel">Filter</h5>
                    </div>
                    <div class="modal-body">
                        <form id="filter-form">
                            <div class="row g-4">
                                <div class="col-md-6">
                                    <label for="filter-month" class="form-label text-muted">Bulan</label>
                                    <select id="filter-month" name="month" class="form-select">
                                        <option value="">-- Pilih Bulan --</option>
                                        @for ($m = 1; $m <= 12; $m++)
                                            <option value="{{ $m }}">{{ DateTime::createFromFormat('!m', $m)->format('F') }}</option>
                                        @endfor
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="filter-year" class="form-label text-muted">Tahun</label>
                                    <select id="filter-year" name="year" class="form-select">
                                        <option value="">-- Pilih Tahun --</option>
                                        @foreach ($tahunList as $tahun)
                                            <option value="{{ $tahun }}">{{ $tahun }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer border-0 justify-content-end">
                        <button type="button" class="genric-btn info-border" style="border-radius: 8px;" data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" form="filter-form" class="genric-btn info" style="border-radius: 8px;">Terapkan</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tabel Laporan -->
        <div class="table-responsive table-custom mt-3">
            <table class="table text-center mb-0" id="donation-table">
                <thead>
                    <tr>
                        <th>Tanggal</th>
                        <th>Kategori Donasi</th>
                        <th>Nama Penerima</th>
                        <th>Jumlah</th>
                        <th>Deskripsi</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Tanggal</th>
                        <th>Kategori Donasi</th>
                        <th>Nama Penerima</th>
                        <th>Jumlah</th>
                        <th>Deskripsi</th>
                    </tr>
                </tfoot>
                    <tbody>
                        @foreach ($dokumentasi as $data)
                            <tr data-date="{{ $data->tgl_penyerahan }}">
                                <td>{{ \Carbon\Carbon::parse($data->tgl_penyerahan)->translatedFormat('d F Y') }}</td>
                                <td>{{ $data->kategoriDonasi->judul_donasi ?? '-' }}</td>
                                <td>{{ $data->nama_penerima }}</td>
                                <td>
                                    @if ($data->kategoriDonasi)
                                        Rp {{ number_format($data->kategoriDonasi->donasi_terkumpul, 0, ',', '.') }}
                                    @else
                                        -
                                    @endif
                                </td>
                                <td>{{ $data->deskripsi }}</td>
                            </tr>
                        @endforeach

                        <!-- Pesan jika tidak ada data -->
                        <tr id="no-data-row" style="display: none;">
                            <td colspan="5" class="text-center text-muted">Tidak ada data transparansi yang tersedia.</td>
                        </tr>
                    </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Script Modal Submit -->
<script>
    document.getElementById('filter-form').addEventListener('submit', function(e) {
        e.preventDefault();

        const month = document.getElementById('filter-month').value;
        const year = document.getElementById('filter-year').value;

        const rows = document.querySelectorAll('#donation-table tbody tr');
        let visibleRowCount = 0;

        rows.forEach(row => {
            const date = row.getAttribute('data-date');
            const rowDate = new Date(date);
            const rowMonth = rowDate.getMonth() + 1;
            const rowYear = rowDate.getFullYear();

            if ((month && rowMonth !== parseInt(month)) || (year && rowYear !== parseInt(year))) {
                row.style.display = 'none';
            } else {
                row.style.display = '';
                visibleRowCount++;
            }
        });

        // Tampilkan/ Sembunyikan pesan "tidak ada data"
        const noDataRow = document.getElementById('no-data-row');
        if (visibleRowCount === 0) {
            noDataRow.style.display = '';
        } else {
            noDataRow.style.display = 'none';
        }

        // Tutup modal
        const modalEl = document.getElementById('filterModal');
        const modal = bootstrap.Modal.getInstance(modalEl);
        modal.hide();
    });
</script>

@endsection
