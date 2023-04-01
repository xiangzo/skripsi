@extends('admin.partials.master')
@section('content')
<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
      <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Perhitungan / </span>Proses Data</h4>

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
                <span class="tf-icons bx bx-plus"></span> &nbsp;
                  Tambah Proses Data
                </button>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="/perhitungan">Perhitungan Data Sensor</a></li>
                  <li><a class="dropdown-item" href="/proses/add">Input Data Manual</a></li>
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
              @foreach ($dataProses as $item)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->title }}</td>
                <td>{{ $item->location }}</td>
                <td>{{ $item->name }}</td>
                <td>
                    @if ($item->status == "1")
                        <span class="badge rounded-pill bg-dark">Sistem IoT</span>
                    @else
                        <span class="badge rounded-pill bg-primary">Manual</span>
                    @endif
                </td>
                <td>{{ $item->action }}</td>
                <td>
                    @if ($item-> status == "1")
                        <a class="btn btn-sm btn-secondary" href="/perhitungan/detail/{{ $item->_id }}"><i class="bx bx-info-circle"></i></a>
                    @else
                        <a class="btn btn-sm btn-secondary" href="/proses/detail/{{ $item->_id }}"><i class="bx bx-info-circle"></i></a>
                    @endif
                    {{-- delete action --}}
                    <meta name="csrf-token" content="{{ csrf_token() }}">
                    <a href="#" class="btn btn-sm btn-danger delete" data-id ="{{ $item->_id }}"><i class="bx bx-trash"></i></a>
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
<script>
    $(".delete").click(function(){
    var id = $(this).data("id");
    var token = $("meta[name='csrf-token']").attr("content");
        swal({
            title: "Apakah anda yakin?",
            text: "Jika dihapus, anda tidak akan bisa mengembalikan data ini!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
            }).then((willDelete) => {
            if (willDelete) {
                $.ajax(
                {
                    url: "/proses/delete/"+id,
                    type: 'DELETE',
                    data: {
                    "id": id,
                    "_token": token,
                    },
                    success: function (data){
                        swal("Data Berhasil Dihapus!", {
                        icon: "success",
                        });
                        window.location = "/proses"
                    }
                });
            } else {
                swal("Data Tidak Jadi Dihapus!");
            }
        }
    );
    });
</script>
@endpush
