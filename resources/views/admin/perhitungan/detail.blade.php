@extends('admin.partials.master')
@section('content')
<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
      <h4 class="fw-bold py-3 mb-4">
        <span class="text-muted fw-light">Blank /</span> blank page
    </h4>

      <div class="row">
        <div class="col-lg-3 col-md-12 col-4 mb-4">
            <div class="card">
              <div class="card-body">
                <span class="fw-semibold d-block mb-1">Diambil Tanggal</span>
                <h4 class="card-title mb-3">2023-02-21</h4>
                <h4 class="card-title mb-2">12.00</h4>
              </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-12 col-4 mb-4">
            <div class="card">
              <div class="card-body">
                <span class="fw-semibold d-block mb-1">PH</span>
                <h4 class="card-title mb-5">7.4 pH</h4>
              </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-12 col-4 mb-4">
            <div class="card">
              <div class="card-body">
                <span class="fw-semibold d-block mb-1">Suhu</span>
                <h4 class="card-title mb-5">25 C</h4>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-12 col-4 mb-4">
            <div class="card">
              <div class="card-body">
                <span class="fw-semibold d-block mb-1">Salinitas</span>
                <h4 class="card-title mb-5">23</h4>
              </div>
            </div>
          </div>
      </div>

      <div class="row mt-5">
        <div class="col-lg-4 col-md-12 mb-4">
            <div class="card">
                <div class="card-header">Grafik Sensor PH</div>
                <div class="card-body">
                    <div class="chart-area"><canvas id="grafik_ph" width="100%" height="30"></canvas></div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-12 mb-4">
            <div class="card">
                <div class="card-header">Grafik Sensor Suhu</div>
                <div class="card-body">
                    <div class="chart-area"><canvas id="grafik_suhu" width="100%" height="30"></canvas></div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-12 mb-4">
            <div class="card">
                <div class="card-header">Grafik Sensor Salinitas</div>
                <div class="card-body">
                    <div class="chart-area"><canvas id="grafik_tds" width="100%" height="30"></canvas></div>
                </div>
            </div>
        </div>
    </div>

    </div>
    <!-- / Content -->

    <div class="content-backdrop fade"></div>
</div>
@endsection

@push('js')

@endpush
