@extends('admin.partials.master')
@section('content')
<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
      <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Perhitungan / Proses Data / </span>Input Data Manual</h4>

      <div class="row">
        <div class="col-md-12">
          <div class="card mb-4">
            <form id="formAccountSettings" action="{{ route('proses.store') }}" method="POST">
              {{ csrf_field() }}
              @method('POST')
            <h5 class="card-header">Perhitungan Manual</h5>
            <!-- Account -->
            <div class="card-body">
                <div class="row">
                  <div class="mb-3 col-md-12">
                    <label for="firstName" class="form-label">Judul Penelitian</label>
                    <input
                      class="form-control"
                      type="text"
                      id="firstName"
                      name="title"
                      placeholder="Masukkan Judul Penelitian"
                      autofocus
                    />
                  </div>
                  <div class="mb-3 col-md-12">
                    <label for="firstName" class="form-label">Lokasi</label>
                    <input
                      class="form-control"
                      type="text"
                      id="firstName"
                      name="location"
                      placeholder="Masukan Lokasi"
                      autofocus
                    />
                  </div>
                  <div class="mb-3 col-md-12">
                    <label for="username" class="form-label">Nama Kolam</label>
                    <input
                      class="form-control"
                      type="text"
                      id="username"
                      name="name"
                      placeholder="Masukkan Nama Kolam"
                    />
                  </div>
                </div>
            </div>
            <hr class="my-0" />
            <div class="card-body">
                <div class="row">
                  <div class="mb-3 col-md-6">
                    <label for="firstName" class="form-label">PH</label>
                    <input
                      class="form-control"
                      type="text"
                      id="firstName"
                      name="ph"
                      placeholder="Contoh : 7.5"
                      autofocus
                    />
                  </div>
                  <div class="mb-3 col-md-6">
                    <label for="firstName" class="form-label">Suhu</label>
                    <input
                      class="form-control"
                      type="text"
                      id="firstName"
                      name="temp"
                      placeholder="Contoh : 28.6"
                      autofocus
                    />
                  </div>
                  <div class="mb-3 col-md-6">
                    <label for="username" class="form-label">Salinitas</label>
                    <input
                      class="form-control"
                      type="text"
                      id="username"
                      name="salinity"
                      placeholder="Contoh : 25"
                    />
                  </div>
                  <div class="mb-3 col-md-6">
                    <label for="password" class="form-label">DO</label>
                    <input
                      type="text"
                      class="form-control"
                      id="password"
                      name="do"
                      placeholder="Contoh : 4.5"
                    />
                  </div>
                </div>
                <div class="mt-2">
                  <button type="submit" class="btn btn-primary me-2">Save changes</button>
                </div>
              </form>
            </div>
            <!-- /Account -->
          </div>
        </div>
      </div>

    </div>
    <!-- / Content -->

    <div class="content-backdrop fade"></div>
</div>
@endsection
