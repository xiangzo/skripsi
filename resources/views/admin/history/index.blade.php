@extends('admin.partials.master')
{{-- @push('css-plugin')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.3/css/jquery.dataTables.min.css">
@endpush --}}
@section('content')
<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
      <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Perhitungan / </span>Riwayat Perhitungan</h4>

      <!-- Hoverable Table rows -->
      <div class="card">
        <h6 class="card-header">
        </h6>
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
                <td>{{ $item->name }}</td>
                <td>{{ $item->perhitungan[0]->ph  ?? 0}}</td>
                <td>{{ $item->perhitungan[0]->temp ?? 0}}</td>
                <td>{{ $item->perhitungan[0]->salinity ?? 0}}</td>
                <td>{{ $item->perhitungan[0]->do ?? 0}}</td>
                <td>{{ $item->perhitungan[0]->perhitunganDetail[0]->defuzzy ?? '' }}%</td>
                <td>{{ $item->perhitungan[0]->perhitunganDetail[0]->status ?? '' }}</td>
                <td>
                    <a class="btn btn-sm btn-secondary" href="/proses/detail/{{ $item->_id }}"><i class="bx bx-info-circle"></i></a>
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
{{-- @push('js')
    <script src="https://cdn.datatables.net/1.13.3/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready( function () {
            $('.table').DataTable();
        } );
    </script>
@endpush --}}
