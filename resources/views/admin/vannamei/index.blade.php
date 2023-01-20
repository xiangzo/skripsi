@extends('admin.partials.master')
@section('content')
<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
      <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Litopenaeus </span>Vannamei</h4>

      {{-- ISI --}}
      <div class="row mb-5">

        <div class="col-md-6 col-lg-3">
          <div class="card mb-4">
            <img class="card-img-top" src="{{ $vannamei->vannamei_image }}" alt="Card image cap" />
          </div>
        </div>
        <div class="col-md-6 col-lg-9">
            <div class="card mb-4">
              <div class="card-body">
                <h5 class="card-title"><i><b>{{ $vannamei->title }}</b></i></h5>
                <div class="card-subtitle text-muted mb-3">{{ $vannamei->subtitle }}</div>
                <p class="card-text">
                  {{ $vannamei->description }}
                </p>
                <a href="/litopenaeus-vannamei/edit/{{ $vannamei->_id }}" class="card-link">Edit Data</a>
              </div>
            </div>
          </div>
      </div>

    </div>
    <!-- / Content -->

    <div class="content-backdrop fade"></div>
</div>
@endsection
