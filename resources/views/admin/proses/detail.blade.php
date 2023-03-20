@extends('admin.partials.master')
@section('content')
<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
      <h4 class="fw-bold py-3 mb-4">
        <span class="text-muted fw-light">Perhitungan / Proses Data / </span>Hasil Kualitas Air
    </h4>

    <div class="row">
        <div class="col-lg-3 col-md-12 col-4 mb-4">
            <div class="card">
              <div class="card-body">
                <span class="fw-semibold d-block mb-1">PH</span>
                <h4 class="card-title mb-5">{{ $data->ph }}</h4>
              </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-12 col-4 mb-4">
            <div class="card">
              <div class="card-body">
                <span class="fw-semibold d-block mb-1">Suhu</span>
                <h4 class="card-title mb-5">{{ $data->temp }}</h4>
              </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-12 col-4 mb-4">
            <div class="card">
              <div class="card-body">
                <span class="fw-semibold d-block mb-1">Salinitas</span>
                <h4 class="card-title mb-5">{{ $data->salinity }}</h4>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-12 col-4 mb-4">
            <div class="card">
              <div class="card-body">
                <span class="fw-semibold d-block mb-1">DO</span>
                <h4 class="card-title mb-5">{{ $data->do }}</h4>
              </div>
            </div>
          </div>
      </div>

    {{-- <h5 class="pb-1 mb-4">Horizontal</h5> --}}
    <div class="row mb-5">
        <div class="col-md">
          <div class="card mb-3">
            <div class="row g-0">
              <div class="col-md-4">
                <img class="card-img card-img-left" src="{{ asset('assets/img/image.png') }}" alt="Card image" />
              </div>
              <div class="col-md-8">
                <div class="card-body">
                  <h3 class="card-title">{{ $data->proses->name }}</h3>
                  {{-- {{ dd($data->perhitunganDetail[0])   }} --}}
                    <h2><p class="card-text">Kualitas air : {{ $data->perhitunganDetail[0]->status }}</p></h2>
                    <h2>{{ $data->perhitunganDetail[0]->defuzzy }}%</h2>
                  </p></h5>
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

@push('js')

@endpush
