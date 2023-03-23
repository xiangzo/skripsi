@extends('admin.partials.master')
@section('content')
    <!-- Content wrapper -->
    <div class="content-wrapper">
        <!-- Content -->

        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="row">
                <div class="row mt-5">
                    {{-- <div class="col-lg-4 col-md-12 mb-4"> --}}
                    <div class="card">
                        <div class="card-header">Grafik Sensor PH</div>
                        <div class="card-body">
                            <div class="chart-area">
                                <div id="grafik_ph"></div>
                            </div>
                        </div>
                    </div>
                    {{-- </div> --}}
                    {{-- <div class="col-lg-4 col-md-12 mb-4"> --}}
                    <div class="card mt-4">
                        <div class="card-header">Grafik Sensor Suhu</div>
                        <div class="card-body">
                            <div id="grafik_suhu"></div>
                        </div>
                    </div>
                    {{-- </div> --}}
                    {{-- <div class="col-lg-4 col-md-12 mb-4"> --}}
                    <div class="card mt-4">
                        <div class="card-header">Grafik Sensor Salinitas</div>
                        <div class="card-body">
                            <div id="grafik_salinitas">

                            </div>
                        </div>
                    </div>
                    {{-- </div> --}}
                </div>
            </div>
        </div>
        <!-- / Content -->
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
                    url: "{{ route('get-data-sensor-all') }}",
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

                        'height': 400,
                        
                        
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

                        'height': 400,
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

                        'height': 400,
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
    @endpush
