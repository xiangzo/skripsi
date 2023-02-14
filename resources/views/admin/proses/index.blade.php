@extends('admin.partials.master')
@section('content')
<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
      <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Proses</span> Data</h4>

      <!-- Hoverable Table rows -->
      <div class="card">
        <h5 class="card-header">
            <div class="btn-group">
                <button
                  type="button"
                  class="btn btn-primary dropdown-toggle"
                  data-bs-toggle="dropdown"
                  aria-expanded="false"
                >
                  Tambah Proses Data
                </button>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="javascript:void(0);">Perhitungan Data Sensor</a></li>
                  <li><a class="dropdown-item" href="javascript:void(0);">Perhitungan Manual</a></li>
                </ul>
              </div>
        </h5>
        <div class="table-responsive text-nowrap">
          <table class="table table-hover">
            <thead>
              <tr>
                <th>No</th>
                <th>Judul</th>
                <th>Lokasi</th>
                <th>Nama Kolam</th>
                <th>Status</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody class="table-border-bottom-0">
              {{-- @foreach ($dataRules as $item) --}}
              <tr>
                {{-- <td>{{ $loop->iteration }}</td>
                <td>{{ $item->ph }}</td>
                <td>{{ $item->suhu }}</td>
                <td>{{ $item->salinitas }}</td>
                <td>{{ $item->do }}</td>
                <td>{{ $item->grade }}</td> --}}
                <td>
                    {{-- <a class="btn btn-sm btn-secondary" href=""><i class="bx bx-edit-alt"></i></a> --}}
                    {{-- delete action--}}
                    {{-- <form action="/fuzzy-rules/{{ $item->_id }}" method="POST" class="d-inline">
                        @csrf
                        @method('delete')
                        <button class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus data ini?')"><i class="bx bx-trash"></i></button>
                    </form> --}}
                </td>
              </tr>
              {{-- @endforeach --}}
            </tbody>
          </table>
        </div>
      </div>
      <!--/ Hoverable Table rows -->

    </div>
    <!-- / Content -->

    <div class="content-backdrop fade"></div>
</div>
@endsection
