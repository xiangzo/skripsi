@extends('admin.partials.master')
@section('content')
<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
      <h4 class="fw-bold py-3 mb-4">
        <span class="text-muted fw-light">Perhitungan / Proses Data / </span>Hasil Kualitas Air
    </h4>

    <div class="row">
        <div class="col-3 mb-4">
            <div class="card">
              <div class="card-body">
                <div class="d-flex justify-content-between flex-sm-row flex-column gap-3">
                  <div class="d-flex flex-sm-column flex-row align-items-start justify-content-between">
                    <div class="card-title">
                      <h5 class="text-nowrap mb-2">PH</h5>
                    </div>
                    <div class="mt-sm-auto">
                        <h3 class="card-title mb-5">{{ $data->ph }}</h3>
                    </div>
                  </div>
                  <img src="{{ asset('/assets/img/icons/unicons/ph.png') }}" alt="" height="60">
                </div>
              </div>
            </div>
        </div>
        <div class="col-3 mb-4">
            <div class="card">
              <div class="card-body">
                <div class="d-flex justify-content-between flex-sm-row flex-column gap-3">
                  <div class="d-flex flex-sm-column flex-row align-items-start justify-content-between">
                    <div class="card-title">
                      <h5 class="text-nowrap mb-2">Suhu</h5>
                    </div>
                    <div class="mt-sm-auto">
                        <h3 class="card-title mb-5">{{ $data->temp }}&deg;C</h3>
                    </div>
                  </div>
                  <img src="{{ asset('/assets/img/icons/unicons/temperature.png') }}" alt="" height="60">
                </div>
              </div>
            </div>
        </div>
        <div class="col-3 mb-4">
            <div class="card">
              <div class="card-body">
                <div class="d-flex justify-content-between flex-sm-row flex-column gap-3">
                  <div class="d-flex flex-sm-column flex-row align-items-start justify-content-between">
                    <div class="card-title">
                      <h5 class="text-nowrap mb-2">Salinitas</h5>
                    </div>
                    <div class="mt-sm-auto">
                        <h3 class="card-title mb-5">{{ $data->salinity }} ppt</h3>
                    </div>
                  </div>
                  <img src="{{ asset('/assets/img/icons/unicons/drip.png') }}" alt="" height="60">
                </div>
              </div>
            </div>
        </div>
        <div class="col-3 mb-4">
            <div class="card">
              <div class="card-body">
                <div class="d-flex justify-content-between flex-sm-row flex-column gap-3">
                  <div class="d-flex flex-sm-column flex-row align-items-start justify-content-between">
                    <div class="card-title">
                      <h5 class="text-nowrap mb-2">DO</h5>
                    </div>
                    <div class="mt-sm-auto">
                        <h3 class="card-title mb-5">{{ $data->do }} ppm</h3>
                    </div>
                  </div>
                  <img src="{{ asset('/assets/img/icons/unicons/oxygen.png') }}" alt="" height="60">
                </div>
              </div>
            </div>
        </div>
      </div>

    {{-- <h5 class="pb-1 mb-4">Horizontal</h5> --}}
    <div class="row mb-5">
        <div class="col-md">
          <div class="card mb-3">
            <div class="row g-0">
              <div class="col-md-3">
                <br>
                {{-- <img class="card-img card-img-left" src="{{ asset('assets/img/image.png') }}" alt="Card image" /> --}}
                <div id="growthChart"></div>
              </div>
              <div class="col-md-8">
                <div class="card-body">
                  <h5><span class="badge bg-label-warning rounded-pill">{{ $data->proses->created_at->format('d F Y') }}</span></h5>
                  <h3 class="card-title">{{ $data->proses->name }}</h3>
                    <h2><p class="card-text ">Kualitas air : {{ $data->perhitunganDetail[0]->status }}</p></h2>
                    <br><br>
                    <input type="hidden" id="defuzzy" value="{{ $data->perhitunganDetail[0]->defuzzy }}">
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
    <!-- / Content -->

    {{-- rules table --}}
    <div class="card">
        <h5 class="card-header">
            Fuzzy Rules
        </h5>
        <div class="table-responsive text-nowrap">
            <table class="table table-hover">
              <thead>
                <tr>
                  <th>No</th>
                  <th>PH</th>
                  <th>Suhu</th>
                  <th>Salinitas</th>
                  <th>Do</th>
                  <th>Grade</th>
                </tr>
              </thead>
              <tbody class="table-border-bottom-0">
                @foreach ($data->rulesGrade as $value)
                <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $value->rules->ph }}</td>
                  <td>{{ $value->rules->temp }}</td>
                  <td>{{ $value->rules->salinity }}</td>
                  <td>{{ $value->rules->do }}</td>
                  <td>{{ $value->rules->grade }}</td>
                </tr>
                @endforeach
              </tbody>
            </table>
        </div>
    </div>

    <div class="content-backdrop fade"></div>
</div>
@endsection
