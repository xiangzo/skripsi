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
                      type="number"
                      id="ph"
                      name="ph"
                      placeholder="Contoh : 7.5"
                      autofocus
                    />
                    <span id="ph-error" class="error"></span>
                  </div>
                  <div class="mb-3 col-md-6">
                    <label for="firstName" class="form-label">Suhu</label>
                    <input
                      class="form-control"
                      type="number"
                      id="temp"
                      name="temp"
                      placeholder="Contoh : 28.6"
                      autofocus
                    />
                    <span id="temp-error" class="error"></span>
                  </div>
                  <div class="mb-3 col-md-6">
                    <label for="username" class="form-label">Salinitas</label>
                    <input
                      class="form-control"
                      type="number"
                      id="salt"
                      name="salinity"
                      placeholder="Contoh : 25"
                    />
                    <span id="salt-error" class="error"></span>
                  </div>
                  <div class="mb-3 col-md-6">
                    <label for="password" class="form-label">DO</label>
                    <input
                      type="number"
                      class="form-control"
                      id="do"
                      name="do"
                      placeholder="Contoh : 4.5"
                    />
                    <span id="do-error" class="error"></span>
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
@push('js')
    <!-- Script untuk validasi input pH -->
    <script>
    // Mendapatkan input field dan span untuk pesan kesalahan
    const phInput = document.getElementById('ph');
    const phError = document.getElementById('ph-error');

    // Menambahkan event listener pada saat input berubah
    phInput.addEventListener('input', () => {
        // Mendapatkan nilai yang dimasukkan pada input field
        const phValue = phInput.value.trim();

        // Memeriksa apakah nilai pH yang dimasukkan valid
        if (isNaN(phValue) || parseFloat(phValue) < 0 || parseFloat(phValue) > 14) {
        // Jika tidak valid, menampilkan pesan error dan mengubah warna border input field menjadi merah
        phInput.setCustomValidity('Nilai pH harus berada di antara 0 dan 14');
        phInput.style.borderColor = 'red';
        phError.textContent = 'Nilai pH harus berada di antara 0 dan 14';
        phError.style.display = 'block';
        } else {
        // Jika valid, menghapus pesan error dan mengembalikan warna border input field ke warna aslinya
        phInput.setCustomValidity('');
        phInput.style.borderColor = '';
        phError.textContent = '';
        phError.style.display = 'none';
        }
    });

    // Mendapatkan input field dan span untuk pesan kesalahan
    const tempInput = document.getElementById('temp');
    const tempError = document.getElementById('temp-error');

    // Menambahkan event listener pada saat input berubah
    tempInput.addEventListener('input', () => {
        // Mendapatkan nilai yang dimasukkan pada input field
        const tempValue = tempInput.value.trim();

        // Memeriksa apakah nilai suhu yang dimasukkan valid
        if (isNaN(tempValue) || parseFloat(tempValue) < 0 || parseFloat(tempValue) > 100) {
        // Jika tidak valid, menampilkan pesan error dan mengubah warna border input field menjadi merah
        tempInput.setCustomValidity('Suhu harus lebih besar atau sama dengan 0');
        tempInput.style.borderColor = 'red';
        tempError.textContent = 'Suhu harus lebih besar atau sama dengan 0';
        tempError.style.display = 'block';
        } else {
        // Jika valid, menghapus pesan error dan mengembalikan warna border input field ke warna aslinya
        tempInput.setCustomValidity('');
        tempInput.style.borderColor = '';
        tempError.textContent = '';
        tempError.style.display = 'none';
        }
    });

    // Mendapatkan input field dan span untuk pesan kesalahan
    const saltInput = document.getElementById('salt');
    const saltError = document.getElementById('salt-error');

    // Menambahkan event listener pada saat input berubah
    saltInput.addEventListener('input', () => {
        // Mendapatkan nilai yang dimasukkan pada input field
        const saltValue = saltInput.value.trim();

        // Memeriksa apakah nilai salinitas yang dimasukkan valid
        if (isNaN(saltValue) || parseFloat(saltValue) < 0 || parseFloat(saltValue) > 45) {
        // Jika tidak valid, menampilkan pesan error dan mengubah warna border input field menjadi merah
        saltInput.setCustomValidity('Salinitas harus antara 0 dan 45');
        saltInput.style.borderColor = 'red';
        saltError.textContent = 'Salinitas harus antara 0 dan 45';
        saltError.style.display = 'block';
        } else {
        // Jika valid, menghapus pesan error dan mengembalikan warna border input field ke warna aslinya
        saltInput.setCustomValidity('');
        saltInput.style.borderColor = '';
        saltError.textContent = '';
        saltError.style.display = 'none';
        }
    });

    // Mendapatkan input field dan span untuk pesan kesalahan
    const doInput = document.getElementById('do');
    const doError = document.getElementById('do-error');

    // Menambahkan event listener pada saat input berubah
    doInput.addEventListener('input', () => {
        // Mendapatkan nilai yang dimasukkan pada input field
        const doValue = doInput.value.trim();

        // Memeriksa apakah nilai DO yang dimasukkan valid
        if (isNaN(doValue) || parseFloat(doValue) < 0 || parseFloat(doValue) > 10) {
        // Jika tidak valid, menampilkan pesan error dan mengubah warna border input field menjadi merah
        doInput.setCustomValidity('DO harus antara 0 dan 10');
        doInput.style.borderColor = 'red';
        doError.textContent = 'DO harus antara 0 dan 10';
        doError.style.display = 'block';
        } else {
        // Jika valid, menghapus pesan error dan mengembalikan warna border input field ke warna aslinya
        doInput.setCustomValidity('');
        doInput.style.borderColor = '';
        doError.textContent = '';
        doError.style.display = 'none';
        }
    });
    </script>
@endpush
