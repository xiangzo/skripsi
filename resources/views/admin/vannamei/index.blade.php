@extends('admin.partials.master')
@push('css-plugin')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endpush
@section('content')
<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
      <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Pengetahuan / </span>Litopenaeus Vannamei</h4>

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
                <h4 class="card-title"><i><b>{{ $vannamei->title }}</b></i></h4>
                <div class="card-subtitle text-muted mb-3">{{ $vannamei->subtitle }}</div>
                <p class="card-text">
                  {{ $vannamei->description }}
                </p>
                @if (auth()->user()->role == '1')
                <a class="btn btn-primary" href="/litopenaeus-vannamei/edit/{{ $vannamei->_id }}" class="card-link">Edit Data</a>
                @endif
              </div>
            </div>
        </div>
      </div>

      {{-- <div class="row mb-5">

        <div class="col-md-6 col-lg-9">
            <div class="card mb-4">
              <div class="card-body">
                <h5 class="card-title"><i><b>{{ $vannamei->title }}</b></i></h5>
                <div class="card-subtitle text-muted mb-3">{{ $vannamei->subtitle }}</div>
                <p class="card-text">
                  {{ $vannamei->description }}
                </p>
                @if (auth()->user()->role == '1')
                <a class="btn btn-primary" href="/litopenaeus-vannamei/edit/{{ $vannamei->_id }}" class="card-link">Edit Data</a>
                @endif
              </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="card mb-4">
              <img class="card-img-top" src="{{ $vannamei->vannamei_image }}" alt="Card image cap" />
            </div>
          </div>
      </div> --}}

    </div>
    <!-- / Content -->

    <div class="content-backdrop fade"></div>
</div>
@endsection
@push('js')
<script>
    @if(Session::has('success'))
    toastr.options =
    {
        "closeButton" : true,
        "progressBar" : true
    }
            toastr.success("{{ session('success') }}");
    @endif

    @if(Session::has('error'))
    toastr.options =
    {
        "closeButton" : true,
        "progressBar" : true
    }
            toastr.error("{{ session('error') }}");
    @endif

    @if(Session::has('info'))
    toastr.options =
    {
        "closeButton" : true,
        "progressBar" : true
    }
            toastr.info("{{ session('info') }}");
    @endif

    @if(Session::has('warning'))
    toastr.options =
    {
        "closeButton" : true,
        "progressBar" : true
    }
            toastr.warning("{{ session('warning') }}");
    @endif
</script>

@endpush
