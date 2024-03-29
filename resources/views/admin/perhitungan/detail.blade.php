@extends('admin.partials.master')
@section('content')
    <div class="content-wrapper">
        <!-- Content -->
        <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="fw-bold py-3 mb-4">
                <span class="text-muted fw-light">Monitoring </span>Data
                <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#hitungModal" style="float: right">
                    Hitung Kualitas Air
                </button>
                <!-- Modal -->
                <div class="modal fade" id="hitungModal" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <form action="{{ route('perhitungan.store') }}" method="post">
                                {{ csrf_field() }}
                                @method('POST')
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel1">Hitung Kualitas Air</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">

                                    <div class="row">
                                        <div class="col mb-3">
                                            <label for="nameBasic" class="form-label">Masukkan Do</label>
                                            <input type="text" name="do" id="nameBasic" class="form-control"
                                                placeholder="Contoh: 4.5 " />
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                        Batal
                                    </button>
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                            </form>
                        </div>
                    </div>
                </div>
        </div>
        </h4>

        <div class="row">
            <div class="col-3 mb-4">
                <div class="card">
                  <div class="card-body">
                    <div class="d-flex justify-content-between flex-sm-row flex-column gap-3">
                      <div class="d-flex flex-sm-column flex-row align-items-start justify-content-between">
                        <div class="card-title">
                          <h5 class="text-nowrap mb-2">Diambil Tanggal</h5>
                        </div>
                        <div class="mt-sm-auto">
                            <h4 class="card-title mb-5" id="last-time"></h4>
                        </div>
                      </div>
                      <img src="{{ asset('/assets/img/icons/unicons/date.png') }}" alt="" height="50">
                    </div>
                  </div>
                </div>
            </div>
            <div class="col-3 mb-4">
                <div class="card">
                  <div class="card-body">
                    <div class="d-flex justify-content-between flex-sm-row flex-column gap-3">
                      <div class="d-flex flex-sm-column flex-row align-items-start justify-content-between">
                        <div class="card-title">
                          <h5 class="text-nowrap mb-2">PH</h5>
                        </div>
                        <div class="mt-sm-auto">
                            {{-- <h3 class="card-title mb-5">{{ $data->ph }}</h3> --}}
                            <h4 class="card-title mb-5" id="last-ph"></h4>
                        </div>
                      </div>
                      <img src="{{ asset('/assets/img/icons/unicons/ph.png') }}" alt="" height="50">
                    </div>
                  </div>
                </div>
            </div>
            <div class="col-3 mb-4">
                <div class="card">
                  <div class="card-body">
                    <div class="d-flex justify-content-between flex-sm-row flex-column gap-3">
                      <div class="d-flex flex-sm-column flex-row align-items-start justify-content-between">
                        <div class="card-title">
                          <h5 class="text-nowrap mb-2">Suhu</h5>
                        </div>
                        <div class="mt-sm-auto">
                            {{-- <h3 class="card-title mb-5">{{ $data->temp }}&deg;C</h3> --}}
                            <h4 class="card-title mb-5" id="last-suhu">&deg;C</h4>
                        </div>
                      </div>
                      <img src="{{ asset('/assets/img/icons/unicons/temperature.png') }}" alt="" height="50">
                    </div>
                  </div>
                </div>
            </div>
            <div class="col-3 mb-4">
                <div class="card">
                  <div class="card-body">
                    <div class="d-flex justify-content-between flex-sm-row flex-column gap-3">
                      <div class="d-flex flex-sm-column flex-row align-items-start justify-content-between">
                        <div class="card-title">
                          <h5 class="text-nowrap mb-2">Salinitas</h5>
                        </div>
                        <div class="mt-sm-auto">
                            {{-- <h3 class="card-title mb-5">{{ $data->temp }}&deg;C</h3> --}}
                            <h4 class="card-title mb-5" id="last-salinitas"> ppt</h4>
                        </div>
                      </div>
                      <img src="{{ asset('/assets/img/icons/unicons/drip.png') }}" alt="" height="50">
                    </div>
                  </div>
                </div>
            </div>
        </div>

        <div class="row mt-5">
            <div class="col-lg-4 col-md-12 mb-4">
                <div class="card">
                    <div class="card-header">Grafik Sensor PH</div>
                    <div class="card-body">
                        <div class="chart-area">
                            <div id="grafik_ph"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-12 mb-4">
                <div class="card">
                    <div class="card-header">Grafik Sensor Suhu</div>
                    <div class="card-body">
                        <div id="grafik_suhu"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-12 mb-4">
                <div class="card">
                    <div class="card-header">Grafik Sensor Salinitas</div>
                    <div class="card-body">
                        <div id="grafik_salinitas">

                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- <div class="card">
            <div class="table-responsive text-nowrap">
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Tanggal</th>
                      <th>PH</th>
                      <th>Suhu</th>
                      <th>Salinitas</th>
                      <th>Do</th>
                    </tr>
                  </thead>
                  <tbody class="table-border-bottom-0">
                    @foreach ($dataRules as $item)
                    <tr>
                      <td>{{ $loop->iteration }}</td>
                      <td>{{ $item->created_date }}</td>
                      <td>{{ $item->ph }}</td>
                      <td>{{ $item->temp }}</td>
                      <td>{{ $item->salinity }}</td>
                      <td>{{ $item->do }}</td>
                      <td>{{ $item->grade }}</td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
            </div>
        </div> --}}

    </div>
    <!-- / Content -->

    <div class="content-backdrop fade"></div>
    </div>
@endsection

@push('js')
    <script src="{{ asset('assets/js/chartsloader.js') }}"></script>
    <script type="text/javascript">
        //buatkan google chart
        google.charts.load('current', {
            packages: ['corechart', 'line']
        });
        google.charts.setOnLoadCallback(tampilkanGrafik);

        //buatkan fungsi ajax untuk mengambil data dari database
        function tampilkanGrafik() {


            var url = window.location.href;
            var id = url.substring(url.lastIndexOf('/') + 1);
            // console.log(id);

            var datajson = $.ajax({
                url: "{{ route('get-data-sensor') }}",
                method: "GET",
                data: {
                    id: id
                },
                dataType: "json",
                success: function(data) {
                    console.log(data);
                    // tampilkan data kedalam chart
                    tampilkanChartpH(data)
                    tampilkanChartSuhu(data)
                    tampilkanChartTDS(data)

                }
            });

            function tampilkanChartpH(data) {
                var dataPH = new google.visualization.DataTable();
                dataPH.addColumn('string', 'Tanggal');
                dataPH.addColumn('number', 'PH');
                // console.log("ini data chart",dataPH);
                for (var i = 0; i < data.length; i++) {
                    dataPH.addRow([data[i].tanggal, parseFloat(data[i].ph)]);
                }
                var options = {

                    hAxis: {
                        title: 'Tanggal'
                    },
                    vAxis: {
                        title: 'pH '
                    },

                    'height': 500,
                    pointsVisible: true
                };
                var chart = new google.visualization.LineChart(document.getElementById('grafik_ph'));
                chart.draw(dataPH, options);
            }

            function tampilkanChartSuhu(data) {
                var dataSuhu = new google.visualization.DataTable();
                dataSuhu.addColumn('string', 'Tanggal');
                dataSuhu.addColumn('number', 'Suhu');
                // console.log("ini data chart",dataSuhu);
                for (var i = 0; i < data.length; i++) {
                    dataSuhu.addRow([data[i].tanggal, parseFloat(data[i].suhu)]);
                }
                var options = {

                    hAxis: {
                        title: 'Tanggal'
                    },
                    vAxis: {
                        title: 'Suhu '
                    },

                    'height': 500,
                    pointsVisible: true
                };
                var chart = new google.visualization.LineChart(document.getElementById('grafik_suhu'));
                chart.draw(dataSuhu, options);
            }

            function tampilkanChartTDS(data) {
                var dataTDS = new google.visualization.DataTable();
                dataTDS.addColumn('string', 'Tanggal');
                dataTDS.addColumn('number', 'salinitas');
                // console.log("ini data chart",dataTDS);
                for (var i = 0; i < data.length; i++) {
                    dataTDS.addRow([data[i].tanggal, parseFloat(data[i].salinitas)]);
                }
                var options = {

                    hAxis: {
                        title: 'Tanggal'
                    },
                    vAxis: {
                        title: 'TDS '
                    },

                    'height': 500,
                    pointsVisible: true
                };
                var chart = new google.visualization.LineChart(document.getElementById('grafik_salinitas'));
                chart.draw(dataTDS, options);
            }

        }

        // fetch data sensor setiap 5 detik
        setInterval(function() {
            tampilkanGrafik();
        }, 3000);
    </script>

    <script>

        var url = window.location.href;
        var id = url.substring(url.lastIndexOf('/') + 1);
        // console.log(id);

        $.ajax({
            url: "{{ route('get-one-last-data-sensor') }}",
            method: "GET",
            data: {
                id: id
            },
            dataType: "json",
            success: function(dataone) {
                console.log("ini jika succes",dataone);
                //tamplikan data ke h4
                var date = new Date(dataone.tanggal);
                //ubah format tanggal d F Y H:i:s
                var options = {
                    year: "numeric",
                    month: "numeric",
                    day: "numeric",
                    hour: "2-digit",
                    minute: "2-digit",
                };
                date = date.toLocaleDateString("id-ID", options);

                $('#last-time').append(date);
                $('#last-ph').html(dataone.ph);
                $('#last-suhu').html(dataone.suhu);
                $('#last-salinitas').html(dataone.salinitas);

            },
            error: function(dataone) {
                // console.log("ini jka error ",dataone);
                $('#last-time').append("Data Kosong");
                $('#last-ph').html("Data Kosong");
                $('#last-suhu').html("Data Kosong");
                $('#last-salinitas').html("Data Kosong");
            }
        });
    </script>
@endpush
