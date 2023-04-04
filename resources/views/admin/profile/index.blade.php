@extends('admin.partials.master')
@section('content')
<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
      <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Account Settings /</span> Account</h4>

      <div class="row">
        <div class="col-md-12">
          <div class="card mb-4">
            <form id="formAccountSettings" action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
              {{ csrf_field() }}
              @method('PUT')
            <h5 class="card-header">Profile Details</h5>
            <!-- Account -->
            <div class="card-body">
              <div class="d-flex align-items-start align-items-sm-center gap-4">
                <img
                  src="{{ $users->avatar ? asset($users->avatar) : asset('storage/avatar/default_image.png') }}"
                  alt="user-avatar"
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
                      name="avatar"
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
                      value="{{ $users->_id }}"
                      placeholder="Masukkan Nama Lengkap"
                    />
                  </div>
                  <div class="mb-3 col-md-12">
                    <label for="firstName" class="form-label">Nama Lengkap</label>
                    <input
                      class="form-control"
                      type="text"
                      id="firstName"
                      name="name"
                      value="{{ $users->name }}"
                      placeholder="Masukkan Nama Lengkap"
                    />
                  </div>
                  <div class="mb-3 col-md-12">
                    <label for="firstName" class="form-label">Email</label>
                    <input
                      class="form-control"
                      type="text"
                      id="firstName"
                      name="email"
                      value="{{ $users->email }}"
                      placeholder="Masukan Email"
                    />
                  </div>
                  <div class="mb-3 col-md-12">
                    <label for="username" class="form-label">Username</label>
                    <input
                      class="form-control"
                      type="text"
                      id="username"
                      name="username"
                      value="{{ $users->username }}"
                      placeholder="Masukkan Username"
                    />
                  </div>
                  <div class="mb-3 col-md-12">
                    <label for="password" class="form-label">Password</label>
                    <input
                      type="password"
                      class="form-control"
                      id="password"
                      name="password"
                      placeholder="Masukkan Password"
                    />
                  </div>
                  <div class="mb-3 col-md-12">
                    <label class="form-label" for="phoneNumber">Phone Number</label>
                    <div class="input-group input-group-merge">
                      <span class="input-group-text">ID (+62)</span>
                      <input
                        type="text"
                        id="phoneNumber"
                        name="phoneNumber"
                        class="form-control"
                        value="{{ $users->phone_number }}"
                        placeholder="83x-xxxx-xxxx"
                      />
                    </div>
                  </div>
                  <div class="mb-3 col-md-12">
                    <label for="address" class="form-label">Address</label>
                    <input
                    type="text"
                    class="form-control"
                    id="address"
                    name="address"
                    value="{{ $users->address }}"
                    placeholder="Address" />
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
