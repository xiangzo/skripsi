@extends('admin.partials.master')
@section('content')
<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
      <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Fuzzy </span> Rules</h4>

      <!-- Hoverable Table rows -->
      <div class="card">
        <h5 class="card-header">
            <a type="button" class="btn btn-sm btn-primary" href="#">
                <span class="tf-icons bx bx-plus"></span>&nbsp; Tambah Data
            </a>
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
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody class="table-border-bottom-0">
              @foreach ($dataRules as $item)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->ph }}</td>
                <td>{{ $item->suhu }}</td>
                <td>{{ $item->salinitas }}</td>
                <td>{{ $item->do }}</td>
                <td>{{ $item->grade }}</td>
                <td>
                    <a class="btn btn-sm btn-secondary" href=""><i class="bx bx-edit-alt"></i></a>
                    <a class="btn btn-sm btn-danger" href=""><i class="bx bx-trash"></i></a>
                </td>
              </tr>
              @endforeach
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
