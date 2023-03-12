@extends('admin.partials.master')
@push('css-plugin')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.3/css/jquery.dataTables.min.css">
@endpush
@section('content')
<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
      <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Riwayat </span> Perhitungan</h4>

      <!-- Hoverable Table rows -->
      <div class="card">
        <div class="table-responsive text-nowrap">
          <table class="table table-hover" id="table">
            <thead>
              <tr>
                <th>No</th>
                <th>Nama Kolam</th>
                <th>PH</th>
                <th>Suhu</th>
                <th>Salinitas</th>
                <th>Do</th>
                <th>Nilai</th>
                <th>Status</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody class="table-border-bottom-0">
              @foreach ($data as $item)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->proses->name }}</td>
                <td>{{ $item->ph }}</td>
                <td>{{ $item->temp }}</td>
                <td>{{ $item->salinity }}</td>
                <td>{{ $item->do }}</td>
                <td>{{ $item->perhitunganDetail[0]->defuzzy }}%</td>
                <td>{{ $item->perhitunganDetail[0]->status }}</td>
                <td>
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
@push('js')
    <script src="https://cdn.datatables.net/1.13.3/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready( function () {
            $('.table').DataTable();
        } );
    </script>
@endpush
