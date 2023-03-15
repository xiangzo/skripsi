@extends('admin.partials.master')
@section('content')
    <div class="content-wrapper">
        <!-- Content -->
        <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="fw-bold py-3 mb-4">
                <span class="text-muted fw-light">Blank /</span> blank page
            </h4>

            <div class="row">
                <div class="col-lg-3 col-md-12 col-4 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <span class="fw-semibold d-block mb-1">Diambil Tanggal</span>
                            <h4 class="card-title mb-3" id="last-time"></h4>

                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-12 col-4 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <span class="fw-semibold d-block mb-1">PH</span>
                            <h4 class="card-title mb-5" id="last-ph"></h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-12 col-4 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <span class="fw-semibold d-block mb-1">Suhu</span>
                            <h4 class="card-title mb-5" id="last-suhu"></h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-12 col-4 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <span class="fw-semibold d-block mb-1">Salinitas</span>
                            <h4 class="card-title mb-5" id="last-salinitas"></h4>
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
                          <div
                          id="grafik_suhu"></div>
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

            <div class="card">
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
            </div>

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
            var datajson = $.ajax({
                url: "{{ route('get-data-sensor') }}",
                method: "GET",
                dataType: "json",
                success: function(data) {
                    console.log(data);
                    // tampilkan data kedalam chart
                    tampilkanChartpH(data)
                    tampilkanChartSuhu(data)
                    tampilkanChartTDS(data)

                }
            });
            function tampilkanChartpH(data){
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

            function tampilkanChartSuhu(data){
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

            function tampilkanChartTDS(data){
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
           $.ajax({
                url: "{{ route('get-one-last-data-sensor') }}",
                method: "GET",
                dataType: "json",
                success: function(dataone) {
                    console.log(dataone);
                    //tamplikan data ke h4
                    $('#last-time').append(dataone.tanggal);
                    $('#last-ph').html(dataone.ph);
                    $('#last-suhu').html(dataone.suhu);
                    $('#last-salinitas').html(dataone.salinitas);

                }
            });
    </script>
@endpush
