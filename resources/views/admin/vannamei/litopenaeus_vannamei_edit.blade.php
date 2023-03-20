@extends('admin.partials.master')
@section('content')
<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
      <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Pengetahuan / Litopenaeus Vannamei /</span> Ubah</h4>

      <div class="row">
        <div class="col-md-12">
          <div class="card mb-4">
            {{-- form edit --}}
            <form id="formAccountSettings"
            action="{{ route('vannamei.update', $vannamei->_id) }}"
            method="POST" enctype="multipart/form-data">
              {{ csrf_field() }}
              @method('PUT')
            <h5 class="card-header">Edit Data</h5>
            <!-- edit data -->
            <div class="card-body">
              <div class="d-flex align-items-start align-items-sm-center gap-4">
                <img
                  src="{{ $vannamei->vannamei_image ? asset($vannamei->vannamei_image) : asset('storage/avatar/default_image.png') }}"
                  alt="image"
                  class="d-block rounded"
                  height="100"
                  width="100"
                  id="uploadedAvatar"
                />
                <div class="button-wrapper">
                  <label for="upload" class="btn btn-primary me-2 mb-4" tabindex="0">
                    <span class="d-none d-sm-block">Upload new photo</span>
                    <i class="bx bx-upload d-block d-sm-none"></i>
                    <input
                      type="file"
                      name="vannamei_image"
                      id="upload"
                      class="account-file-input"
                      hidden
                      accept="image/png, image/jpeg"
                    />
                  </label>
                  <p class="text-muted mb-0">Allowed JPG, GIF or PNG. Max size of 1MB</p>
                </div>
              </div>
            </div>
            <hr class="my-0" />
            <div class="card-body">
                <div class="row">
                  <div class="mb-3 col-md-12">
                    <input
                      hidden
                      class="form-control"
                      type="text"
                      id="firstName"
                      name="_id"
                      value="{{ $vannamei->_id }}"
                      autofocus
                    />
                  </div>
                  <div class="mb-3 col-md-12">
                    <label for="firstName" class="form-label">Judul</label>
                    <input
                      class="form-control"
                      type="text"
                      id="firstName"
                      name="title"
                      value="{{ $vannamei->title }}"
                      placeholder="Masukkan Judul"
                      autofocus
                    />
                  </div>
                  <div class="mb-3 col-md-12">
                    <label for="firstName" class="form-label">Subjudul</label>
                    <input
                      class="form-control"
                      type="text"
                      id="firstName"
                      name="subtitle"
                      value="{{ $vannamei->subtitle }}"
                      placeholder="Masukan Subjudul"
                      autofocus
                    />
                  </div>
                  <div class="mb-3 col-md-12">
                    <label for="username" class="form-label">Deskripsi</label>
                    <textarea name="description" id="" cols="30" rows="10" class="form-control">{{ $vannamei->description }}</textarea>
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
