@extends('admin.partials.master')
@push('css-plugin')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endpush
@section('content')
<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
      <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Pengetahuan / </span>Fuzzy Rules</h4>

      <!-- Hoverable Table rows -->
      <div class="card">
        <h5 class="card-header">
            @if(auth()->user()->role == '1')
                <a type="button" class="btn btn-primary" href="/fuzzy-rules/add">
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
                    <meta name="csrf-token" content="{{ csrf_token() }}">
                    <a href="#" class="btn btn-sm btn-danger delete" data-id ="{{ $item->_id }}"><i class="bx bx-trash"></i></a>
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
@push('js')
{{-- <script>
    @if(Session::has('success'))
    toastr.options =
    {
        "closeButton" : true,
        "progressBar" : true
    }
            toastr.success("{{ session('success') }}");
    @endif

    @if(Session::has('error'))
    toastr.options =
    {
        "closeButton" : true,
        "progressBar" : true
    }
            toastr.error("{{ session('error') }}");
    @endif

    @if(Session::has('info'))
    toastr.options =
    {
        "closeButton" : true,
        "progressBar" : true
    }
            toastr.info("{{ session('info') }}");
    @endif

    @if(Session::has('warning'))
    toastr.options =
    {
        "closeButton" : true,
        "progressBar" : true
    }
            toastr.warning("{{ session('warning') }}");
    @endif
</script> --}}
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
                    url: "/fuzzy-rules/delete/"+id,
                    type: 'DELETE',
                    data: {
                    "id": id,
                    "_token": token,
                    },
                    success: function (data){
                        swal("Data Berhasil Dihapus!", {
                        icon: "success",
                        });
                        window.location = "/fuzzy-rules"
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
