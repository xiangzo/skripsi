@extends('admin.partials.master')
@section('content')
<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
      <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Fuzzy </span> Rules</h4>

      <!-- Hoverable Table rows -->
      <div class="card">
        <h5 class="card-header">
            @if(auth()->user()->role == '1')
                <a type="button" class="btn btn-sm btn-primary" href="/fuzzy-rules/add">
                    <span class="tf-icons bx bx-plus"></span>&nbsp; Tambah Data
                </a>
            @endif
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
                @if(auth()->user()->role == '1')
                <th>Aksi</th>
                @endif
              </tr>
            </thead>
            <tbody class="table-border-bottom-0">
              @foreach ($dataRules as $item)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->ph }}</td>
                <td>{{ $item->temp }}</td>
                <td>{{ $item->salinity }}</td>
                <td>{{ $item->do }}</td>
                <td>{{ $item->grade }}</td>
                @if(auth()->user()->role == '1')
                <td>
                    <a class="btn btn-sm btn-secondary" href="/fuzzy-rules/edit/{{ $item->_id }}"><i class="bx bx-edit-alt"></i></a>
                    {{-- delete action--}}
                    <form action="/fuzzy-rules/{{ $item->_id }}" method="POST" class="d-inline">
                        @csrf
                        @method('delete')
                        <button class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus data ini?')"><i class="bx bx-trash"></i></button>
                    </form>
                </td>
                @endif
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
