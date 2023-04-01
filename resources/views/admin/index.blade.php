@extends('admin.partials.master')
@section('content')
    <!-- Content wrapper -->
    <div class="content-wrapper">
        <!-- Content -->

        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="row">
                <div class="col-lg-8 mb-4 order-0">
                    <div class="card">
                      <div class="d-flex align-items-end row">
                        <div class="col-sm-8">
                          <div class="card-body">
                            <h5 class="card-title text-primary">Selamat Datang, di Sistem Monitoring Kualitas Air</h5>
                            <p class="mb-4">
                                Sistem ini digunakan untuk memantau dan menghitung kualitas air tambak udang vanamei
                                menggunakan metode Fuzzy Tsukamoto
                            </p>
                            <a href="/proses" class="btn btn-sm btn-outline-primary">Lihat monitoring</a>
                          </div>
                        </div>
                        <div class="col-sm-4 text-center text-sm-left">
                          <div class="card-body pb-0 px-0 px-md-4">
                            <img
                              src="../assets/img/illustrations/man-with-laptop-light.png"
                              height="140"
                              alt="View Badge User"
                              data-app-dark-img="illustrations/man-with-laptop-dark.png"
                              data-app-light-img="illustrations/man-with-laptop-light.png"
                            />
                          </div>
                        </div>
                      </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 order-1">
                  <div class="row">
                    <div class="col-6 mb-4">
                        <div class="card">
                          <div class="card-body">
                            <div class="card-title d-flex align-items-start justify-content-between">
                              <div class="avatar flex-shrink-0">
                                <img src="{{ asset('assets/img/icons/unicons/ph.png') }}" alt="Credit Card" class="rounded" height="50"/>
                              </div>
                            </div>
                            <span class="d-block mb-1">PH</span>
                            <h3 class="card-title text-nowrap mb-2">...</h3>
                          </div>
                        </div>
                      </div>
                      <div class="col-6 mb-4">
                        <div class="card">
                          <div class="card-body">
                            <div class="card-title d-flex align-items-start justify-content-between">
                              <div class="avatar flex-shrink-0">
                                <img src="{{ asset('assets/img/icons/unicons/temperature.png') }}" alt="Credit Card" class="rounded" />
                              </div>
                            </div>
                            <span class="fw-semibold d-block mb-1">Suhu</span>
                            <h3 class="card-title mb-2">...</h3>
                          </div>
                        </div>
                    </div>
                  </div>
                </div>
                <!-- Total Revenue -->
                <div class="col-12 col-lg-8 order-2 order-md-3 order-lg-2 mb-4">
                    <div class="card">
                        <div class="card">
                            <div class="card-header">Grafik Sensor PH</div>
                            <div class="card-body">
                                <div class="chart-area">
                                    <div id="grafik_ph"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                  <!--/ Total Revenue -->
                <div class="col-12 col-md-8 col-lg-4 order-3 order-md-2">
                    <div class="row">
                      <div class="col-6 mb-4">
                        <div class="card">
                          <div class="card-body">
                            <div class="card-title d-flex align-items-start justify-content-between">
                              <div class="avatar flex-shrink-0">
                                <img src="{{ asset('assets/img/icons/unicons/drip.png') }}" alt="Credit Card" class="rounded" />
                              </div>
                            </div>
                            <span class="d-block mb-1">Salinitas</span>
                            <h3 class="card-title text-nowrap mb-2">...</h3>
                          </div>
                        </div>
                      </div>
                      <div class="col-6 mb-4">
                        <div class="card">
                          <div class="card-body">
                            <div class="card-title d-flex align-items-start justify-content-between">
                              <div class="avatar flex-shrink-0">
                                <img src="{{ asset('assets/img/icons/unicons/oxygen.png') }}" alt="Credit Card" class="rounded" />
                              </div>
                            </div>
                            <span class="fw-semibold d-block mb-1">Do</span>
                            <h3 class="card-title mb-2">...</h3>
                          </div>
                        </div>
                      </div>
                      <div class="col-12 mb-4">
                        <div class="card">
                          <div class="card-body">
                            <div class="d-flex justify-content-between flex-sm-row flex-column gap-3">
                              <div class="d-flex flex-sm-column flex-row align-items-start justify-content-between">
                                <div class="card-title">
                                  <h5 class="text-nowrap mb-2">Riwayat Perhitungan</h5>
                                  <span class="badge bg-label-warning rounded-pill">Year 2023</span>
                                </div>
                                <div class="mt-sm-auto">
                                    <a type="button" class="btn rounded-pill btn-outline-primary" href="/history">
                                        <span class="tf-icons bx bx-pie-chart-alt"></span>&nbsp; Lihat Semua
                                    </a>
                                </div>
                              </div>
                              {{-- <div id="profileReportChart"></div> --}}
                              {{-- <i class="fa-solid fa-clock-rotate-left" style="color: #2a8ac6;"></i> --}}
                              <img src="../assets/img/icons/unicons/history.png" alt="" height="70">
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                </div>

                <div class="col-12 col-md-8 col-lg-6 order-3 order-md-2">
                    <div class="row">
                        <div class="card mt-4">
                            <div class="card-header">Grafik Sensor Suhu</div>
                            <div class="card-body">
                                <div id="grafik_suhu"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-8 col-lg-6 order-3 order-md-2">
                    <div class="row">
                        <div class="card mt-4">
                            <div class="card-header">Grafik Sensor Salinitas</div>
                            <div class="card-body">
                                <div id="grafik_salinitas"></div>
                            </div>
                        </div>
                    </div>
                </div>
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

                        'height': 280,
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

                        'height': 280,
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

                        'height': 280,
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
