@extends('admin.partials.master')
@section('content')
<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
      <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Fuzzy Rules /</span> Tambah Data</h4>

      <div class="row">
        <div class="col-md-12">
          <div class="card mb-4">
            {{-- form add --}}
            <form id="formAccountSettings"
            action="{{ route('fuzzy.store') }}"
            method="POST">
              {{ csrf_field() }}
              @method('POST')
            <h5 class="card-header">Tambah Data Rules</h5>
            <!-- tambah data -->
            <hr class="my-0" />
            <div class="card-body">
                <div class="row">
                  <div class="mb-3 col-md-6">
                    <label for="exampleFormControlSelect1" class="form-label">PH</label>
                    {{-- select form  --}}
                    <div class="mb-3">
                        <select class="form-select" id="exampleFormControlSelect1" aria-label="Default select example" name="ph">
                          <option value="baik" selected>Baik</option>
                          <option value="sedang">Sedang</option>
                          <option value="buruk">Buruk</option>
                          <option value="sangat buruk">Sangat Buruk</option>
                        </select>
                      </div>
                  </div>
                  <div class="mb-3 col-md-6">
                    <label for="exampleFormControlSelect1" class="form-label">Suhu</label>
                    {{-- select form  --}}
                    <div class="mb-3">
                        <select class="form-select" id="exampleFormControlSelect1" aria-label="Default select example" name="suhu">
                          <option value="baik" selected>Baik</option>
                          <option value="sedang">Sedang</option>
                          <option value="buruk">Buruk</option>
                          <option value="sangat buruk">Sangat Buruk</option>
                        </select>
                      </div>
                  </div>
                  <div class="mb-3 col-md-6">
                    <label for="exampleFormControlSelect1" class="form-label">Salinitas</label>
                    {{-- select form  --}}
                    <div class="mb-3">
                        <select class="form-select" id="exampleFormControlSelect1" aria-label="Default select example" name="salinitas">
                          <option value="baik" selected>Baik</option>
                          <option value="sedang">Sedang</option>
                          <option value="buruk">Buruk</option>
                          <option value="sangat buruk">Sangat Buruk</option>
                        </select>
                      </div>
                  </div>
                  <div class="mb-3 col-md-6">
                    <label for="exampleFormControlSelect1" class="form-label">Do</label>
                    {{-- select form  --}}
                    <div class="mb-3">
                        <select class="form-select" id="exampleFormControlSelect1" aria-label="Default select example" name="do">
                          <option value="baik" selected>Baik</option>
                          <option value="sedang">Sedang</option>
                          <option value="buruk">Buruk</option>
                          <option value="sangat buruk">Sangat Buruk</option>
                        </select>
                      </div>
                  </div>
                </div>
                <div class="mb-3 col-md-12">
                    <label for="exampleFormControlSelect1" class="form-label">Grade</label>
                    {{-- select form  --}}
                    <div class="mb-3">
                        <select class="form-select" id="exampleFormControlSelect1" aria-label="Default select example" name="grade">
                          <option value="A" selected>A</option>
                          <option value="B">B</option>
                          <option value="c">C</option>
                          <option value="D">D</option>
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
