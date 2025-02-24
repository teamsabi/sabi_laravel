@extends('administrator.app')
@section('content')

<div class="page-inner">
    <div
      class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4"
    >
      <div>
        <h3 class="fw-bold mb-3">Dashboard</h3>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-6 col-md-3">
        <div class="card card-stats card-round">
          <div class="card-body">
            <div class="row align-items-center">
              <div class="col-icon">
                <div
                  class="icon-big text-center icon-primary bubble-shadow-small"
                >
                  <i class="fas fa-users"></i>
                </div>
              </div>
              <div class="col col-stats ms-3 ms-sm-0">
                <div class="numbers">
                  <p class="card-category">Jumlah Donatur</p>
                  <h4 class="card-title">123</h4>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-sm-6 col-md-3">
        <div class="card card-stats card-round">
          <div class="card-body">
            <div class="row align-items-center">
              <div class="col-icon">
                <div
                  class="icon-big text-center icon-warning bubble-shadow-small">
                  <i class="fas fa-dollar-sign"></i>
                </div>
              </div>
              <div class="col col-stats ms-3 ms-sm-0">
                <div class="numbers">
                  <p class="card-category">Jumlah Donasi</p>
                  <h4 class="card-title">Rp 12.000</h4>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-sm-6 col-md-3">
        <div class="card card-stats card-round">
          <div class="card-body">
            <div class="row align-items-center">
              <div class="col-icon">
                <div
                  class="icon-big text-center icon-success bubble-shadow-small"
                >
                  <i class="far fa-check-circle"></i>
                </div>
              </div>
              <div class="col col-stats ms-3 ms-sm-0">
                <div class="numbers">
                  <p class="card-category">Donasi Sukses</p>
                  <h4 class="card-title">10</h4>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-sm-6 col-md-3">
        <div class="card card-stats card-round">
          <div class="card-body">
            <div class="row align-items-center">
              <div class="col-icon">
                <div
                class="icon-big text-center bubble-shadow-small" style="background-color: #F5F516; color: #ffffff;">
                  <i class="fa fa-hourglass-half"></i>
                </div>
              </div>
              <div class="col col-stats ms-3 ms-sm-0">
                <div class="numbers">
                  <p class="card-category">Donasi Aktif</p>
                  <h4 class="card-title">2</h4>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">
            <div class="card-title">Bar Chart</div>
          </div>
          <div class="card-body">
            <div class="chart-container">
              <canvas id="barChart"></canvas>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card card-primary card-round">
          <div class="card-header">
            <div class="card-head-row">
              <div class="card-title">Donasi bulan ini</div>
              <div class="card-tools">
              </div>
            </div>
            <div class="card-category">1 Februari - 1 Maret</div>
          </div>
          <div class="card-body pb-0">
            <div class="mb-4 mt-2">
              <h1>Rp 2.340.000</h1>
            </div>
          </div>
        </div>
        <div class="card card-round">
          <div class="card-body pb-0">
            <div class="h1 fw-bold float-end text-primary">+5%</div>
            <h2 class="mb-2">17</h2>
            <p class="text-muted">Donatur</p>
            <div class="pull-in sparkline-fix">
              <div id="lineChart"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="card card-round">
          <div class="card-header">
            <div class="card-head-row card-tools-still-right">
              <div class="card-title">Histori Transaksi</div>
              <div class="card-tools">
                <div class="dropdown">
                  <button
                    class="btn btn-icon btn-clean me-0"
                    type="button"
                    id="dropdownMenuButton"
                    data-bs-toggle="dropdown"
                    aria-haspopup="true"
                    aria-expanded="false"
                  >
                    <i class="fas fa-ellipsis-h"></i>
                  </button>
                  <div
                    class="dropdown-menu"
                    aria-labelledby="dropdownMenuButton"
                  >
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <a class="dropdown-item" href="#"
                      >Something else here</a
                    >
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="card-body p-0">
            <div class="table-responsive">  
              <table class="table align-items-center mb-0">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">Nama Donatur</th>
                    <th scope="col" class="text-end">Nominal</th>
                    <th scope="col" class="text-end">Metode Pembayaran</th>
                    <th scope="col" class="text-end">Status</th>
                    <th scope="col" class="text-end">Waktu</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th scope="row">
                      <button
                        class="btn btn-icon btn-round btn-success btn-sm me-2">
                        <i class="fa fa-check"></i>
                      </button>
                      Syaiful Amin
                    </th>
                    <td class="text-end">Rp 2.000</td>
                    <td class="text-end">QRIS</td>
                    <td class="text-end">
                      <span class="badge badge-success">Completed</span>
                    </td>
                    <td class="text-end">14-02-2025 10:30</td>
                  </tr>
                  <tr>
                    <th scope="row">
                      <button
                        class="btn btn-icon btn-round btn-success btn-sm me-2">
                        <i class="fa fa-check"></i>
                      </button>
                      Syaiful Amin
                    </th>
                    <td class="text-end">Rp 2.000</td>
                    <td class="text-end">QRIS</td>
                    <td class="text-end">
                      <span class="badge badge-success">Completed</span>
                    </td>
                    <td class="text-end">14-02-2025 10:30</td>
                  </tr>
                  <tr>
                    <tr>
                      <th scope="row">
                        <button
                          class="btn btn-icon btn-round btn-success btn-sm me-2">
                          <i class="fa fa-check"></i>
                        </button>
                        Syaiful Amin
                      </th>
                      <td class="text-end">Rp 2.000</td>
                      <td class="text-end">QRIS</td>
                      <td class="text-end">
                        <span class="badge badge-success">Completed</span>
                      </td>
                      <td class="text-end">14-02-2025 10:30</td>
                    </tr>
                    <tr>
                      <th scope="row">
                        <button
                          class="btn btn-icon btn-round btn-success btn-sm me-2">
                          <i class="fa fa-check"></i>
                        </button>
                        Syaiful Amin
                      </th>
                      <td class="text-end">Rp 2.000</td>
                      <td class="text-end">QRIS</td>
                      <td class="text-end">
                        <span class="badge badge-success">Completed</span>
                      </td>
                      <td class="text-end">14-02-2025 10:30</td>
                    </tr>
                    <tr>
                      <th scope="row">
                        <button
                          class="btn btn-icon btn-round btn-success btn-sm me-2">
                          <i class="fa fa-check"></i>
                        </button>
                        Syaiful Amin
                      </th>
                      <td class="text-end">Rp 2.000</td>
                      <td class="text-end">QRIS</td>
                      <td class="text-end">
                        <span class="badge badge-success">Completed</span>
                      </td>
                      <td class="text-end">14-02-2025 10:30</td>
                    </tr>
                    <tr>
                      <th scope="row">
                        <button
                          class="btn btn-icon btn-round btn-success btn-sm me-2">
                          <i class="fa fa-check"></i>
                        </button>
                        Syaiful Amin
                      </th>
                      <td class="text-end">Rp 2.000</td>
                      <td class="text-end">QRIS</td>
                      <td class="text-end">
                        <span class="badge badge-success">Completed</span>
                      </td>
                      <td class="text-end">14-02-2025 10:30</td>
                    </tr>
                    <tr>
                      <th scope="row">
                        <button
                          class="btn btn-icon btn-round btn-success btn-sm me-2">
                          <i class="fa fa-check"></i>
                        </button>
                        Syaiful Amin
                      </th>
                      <td class="text-end">Rp 2.000</td>
                      <td class="text-end">QRIS</td>
                      <td class="text-end">
                        <span class="badge badge-success">Completed</span>
                      </td>
                      <td class="text-end">14-02-2025 10:30</td>
                    </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>