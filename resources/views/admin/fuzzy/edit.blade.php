@extends('admin.partials.master')
@section('content')
<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
      <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Fuzzy Rules /</span> Ubah Data</h4>

      <div class="row">
        <div class="col-md-12">
          <div class="card mb-4">
            {{-- form add --}}
            <form id="formAccountSettings"
            action="{{ route('fuzzy.update', $rules->_id) }}"
            method="POST">
              {{ csrf_field() }}
              @method('PUT')
            <h5 class="card-header">Ubah Data Rules</h5>
            <!-- tambah data -->
            <hr class="my-0" />
            <div class="card-body">
                <div class="row">
                    {{-- get id --}}
                    <input
                      hidden
                      class="form-control"
                      type="text"
                      id="firstName"
                      name="_id"
                      value="{{ $rules->_id }}"
                      autofocus>
                  <div class="mb-3 col-md-6">
                    <label for="exampleFormControlSelect1" class="form-label">PH</label>
                    {{-- select form  --}}
                    <div class="mb-3">
                        <select class="form-select" id="exampleFormControlSelect1" aria-label="Default select example" name="ph">
                          <option value="baik" {{ $rules->ph == "baik" ? 'selected' : '' }}>Baik</option>
                          <option value="sedang" {{ $rules->ph == "sedang" ? 'selected' : '' }}>Sedang</option>
                          <option value="buruk" {{ $rules->ph == "buruk" ? 'selected' : '' }}>Buruk</option>
                          <option value="sangat buruk" {{ $rules->ph == "sangat buruk" ? 'selected' : '' }}>Sangat Buruk</option>
                        </select>
                      </div>
                  </div>
                  <div class="mb-3 col-md-6">
                    <label for="exampleFormControlSelect1" class="form-label">Suhu</label>
                    {{-- select form  --}}
                    <div class="mb-3">
                        <select class="form-select" id="exampleFormControlSelect1" aria-label="Default select example" name="temp">
                            <option value="baik" {{ $rules->temp == "baik" ? 'selected' : '' }}>Baik</option>
                            <option value="sedang" {{ $rules->temp == "sedang" ? 'selected' : '' }}>Sedang</option>
                            <option value="buruk" {{ $rules->temp == "buruk" ? 'selected' : '' }}>Buruk</option>
                            <option value="sangat buruk" {{ $rules->temp == "sangat buruk" ? 'selected' : '' }}>Sangat Buruk</option>
                        </select>
                      </div>
                  </div>
                  <div class="mb-3 col-md-6">
                    <label for="exampleFormControlSelect1" class="form-label">Salinitas</label>
                    {{-- select form  --}}
                    <div class="mb-3">
                        <select class="form-select" id="exampleFormControlSelect1" aria-label="Default select example" name="salinity">
                            <option value="baik" {{ $rules->salinity == "baik" ? 'selected' : '' }}>Baik</option>
                            <option value="sedang" {{ $rules->salinity == "sedang" ? 'selected' : '' }}>Sedang</option>
                            <option value="buruk" {{ $rules->salinity == "buruk" ? 'selected' : '' }}>Buruk</option>
                            <option value="sangat buruk" {{ $rules->salinity == "sangat buruk" ? 'selected' : '' }}>Sangat Buruk</option>
                        </select>
                      </div>
                  </div>
                  <div class="mb-3 col-md-6">
                    <label for="exampleFormControlSelect1" class="form-label">Do</label>
                    {{-- select form  --}}
                    <div class="mb-3">
                        <select class="form-select" id="exampleFormControlSelect1" aria-label="Default select example" name="do">
                            <option value="baik" {{ $rules->do == "baik" ? 'selected' : '' }}>Baik</option>
                            <option value="sedang" {{ $rules->do == "sedang" ? 'selected' : '' }}>Sedang</option>
                            <option value="buruk" {{ $rules->do == "buruk" ? 'selected' : '' }}>Buruk</option>
                            <option value="sangat buruk" {{ $rules->do == "sangat buruk" ? 'selected' : '' }}>Sangat Buruk</option>
                        </select>
                      </div>
                  </div>
                </div>
                <div class="mb-3 col-md-12">
                    <label for="exampleFormControlSelect1" class="form-label">Grade</label>
                    {{-- select form  --}}
                    <div class="mb-3">
                        <select class="form-select" id="exampleFormControlSelect1" aria-label="Default select example" name="grade">
                            <option value="A" {{ $rules->grade == "A" ? 'selected' : '' }}>A</option>
                            <option value="B" {{ $rules->grade == "B" ? 'selected' : '' }}>B</option>
                            <option value="C" {{ $rules->grade == "C" ? 'selected' : '' }}>C</option>
                            <option value="D" {{ $rules->grade == "D" ? 'selected' : '' }}>D</option>
                        </select>
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
