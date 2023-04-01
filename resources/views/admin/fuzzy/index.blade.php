@extends('admin.partials.master')
@section('content')
<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
      <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Pengetahuan / </span>Fuzzy Tsukamoto</h4>

      {{-- ISI --}}
      <div class="row mb-5">
        <div class="row mb-5">
            <div class="col-md">
              <div class="card mb-3">
                <div class="row g-0">
                  <div class="col-md-4">
                    <img class="card-img card-img-left" src="{{ asset('assets/img/illustrations/girl-doing-yoga-light.png') }}" alt="Card image" style="padding: 20px"/>
                  </div>
                  <div class="col-md-8">
                    <div class="card-body">
                       <h5 class="card-title">Fuzzy Logic</h5>
                       <p class="card-text">
                            Fuzzy Logic adalah sebuah algoritma yang didasarkan pada derajat kebenaran, Metode Fuzzy akan mengambil sebuah keputusan yang bersifat ambigu. Seperti: besar, sangat besar, sedang.
                            Logika Fuzzy merupakan peningkatan dari logika boolean (True/False) yang berhadapan dengan konsep kebenaran sebagian.
                        </p>
                        <p>
                            Logika Berfungsi sebagai berikut:
                        </p>
                        <p>
                            1. Menangani sebuah permasalahan yang impresisi / ketidaktepatan
                        </p>
                        <p>
                            2. Logika fuzzy menjebatani antara bahasa mesin yang presisi dengan bahasa manusia yang menekankan kepada makna / arti
                        </p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
        </div>

        <div class="col-md-6 col-lg-12 order-1 mb-4">
            <div class="card h-100">
              <div class="card-header">
                  <h4 class="card-title">Fungsi Keanggotaan PH</h4>
              </div>
              <div class="card-body px-0">
                <div class="tab-content p-0">
                  <div class="tab-pane fade show active" id="" role="tabpanel">
                    <div id="ph"></div>
                  </div>
                </div>
              </div>
            </div>
        </div>

        <div class="col-md-6 col-lg-12 order-1 mb-4">
            <div class="card h-100">
              <div class="card-header">
                  <h4 class="card-title">Fungsi Keanggotaan Suhu</h4>
              </div>
              <div class="card-body px-0">
                <div class="tab-content p-0">
                  <div class="tab-pane fade show active" id="" role="tabpanel">
                    <div id="suhu"></div>
                  </div>
                </div>
              </div>
            </div>
        </div>

        <div class="col-md-6 col-lg-12 order-1 mb-4">
          <div class="card h-100">
            <div class="card-header">
                <h4 class="card-title">Fungsi Keanggotaan Salinitas</h4>
            </div>
            <div class="card-body px-0">
              <div class="tab-content p-0">
                <div class="tab-pane fade show active" id="" role="tabpanel">
                  <div id="salinity"></div>
                </div>
              </div>
            </div>
          </div>
      </div>

      <div class="col-md-6 col-lg-12 order-1 mb-4">
        <div class="card h-100">
          <div class="card-header">
              <h4 class="card-title">Fungsi Keanggotaan Do</h4>
          </div>
          <div class="card-body px-0">
            <div class="tab-content p-0">
              <div class="tab-pane fade show active" id="" role="tabpanel">
                <div id="dos"></div>
              </div>
            </div>
          </div>
        </div>
    </div>

    <div class="col-md-6 col-lg-12 order-1 mb-4">
        <div class="card h-100">
          <div class="card-header">
              <h4 class="card-title">Fungsi Keanggotaan Kualitas Air</h4>
          </div>
          <div class="card-body px-0">
            <div class="tab-content p-0">
              <div class="tab-pane fade show active" id="" role="tabpanel">
                <div id="kual"></div>
              </div>
            </div>
          </div>
        </div>
    </div>

      </div>

    </div>
    <!-- / Content -->

    <div class="content-backdrop fade"></div>
</div>
@endsection

@push('js')
<script src="{{ asset('assets/js/chartsloader.js')}}"></script>
<script type="text/javascript">
    google.charts.load('current', {
        packages: ['corechart', 'line']
    });

    function phChart() {
        // Define the chart to be drawn.
        var data = new google.visualization.DataTable();
        data.addColumn('string');
        data.addColumn('number', 'Sedang');
        data.addColumn('number', 'Sangat Buruk');
        data.addColumn('number', 'Buruk');
        data.addColumn('number', 'Baik');
        data.addRows([
          //biru, merah, kuning, ijo
            ['0', 0, 1, 0, 0],
            ['3', 0, 1, 0, 0],
            ['4.5', 0, 0.5, 0, 0],
            ['5', 0, 0, 1, 0],
            ['6.5', 0, 0, 1, 0],
            ['6.9', 1, 0, 0, 0],
            ['7', 1, 0, 0, 0],
            ['7.5', 0, 0, 0, 1],
            ['8.5', 0, 0, 0, 1],
            ['9', 1, 0, 0, 0],
            ['9.5', 1, 0, 0, 0],
            ['10', 0, 0, 1, 0],
            ['11.5', 0, 0, 1, 0],
            ['12', 0, 0.5, 0, 0],
            ['12.5', 0, 1, 0, 0],
            ['', 0, 1, 0, 0]
        ]);

        // Set chart options
        var options = {

            hAxis: {
                title: 'PH'
            },
            vAxis: {
                title: 'Nilai Keanggotaan'
            },
            'width': 1000,
            'height': 200,
            pointsVisible: true
        };

        // Instantiate and draw the chart.
        var chart = new google.visualization.LineChart(document.getElementById('ph'));
        chart.draw(data, options);
    }
    google.charts.setOnLoadCallback(phChart);

    function suhuChart() {
        // Define the chart to be drawn.
        var data = new google.visualization.DataTable();
        data.addColumn('string');
        data.addColumn('number', 'Sedang');
        data.addColumn('number', 'Sangat Buruk');
        data.addColumn('number', 'Buruk');
        data.addColumn('number', 'Baik');
        data.addRows([
          //biru, merah, kuning, ijo
            ['0', 0, 1, 0, 0],
            ['7', 0, 1, 0, 0],
            ['15', 0, 0.5, 0, 0],
            ['18', 0, 0, 1, 0],
            ['22', 0, 0, 1, 0],
            ['24', 1, 0, 0, 0],
            ['25', 1, 0, 0, 0],
            ['28', 0, 0, 0, 1],
            ['30', 0, 0, 0, 1],
            ['35', 1, 0, 0, 0],
            ['38', 1, 0, 0, 0],
            ['40', 0, 0, 1, 0],
            ['44', 0, 0, 1, 0],
            ['45', 0, 0.5, 0, 0],
            ['52', 0, 1, 0, 0],
            ['', 0, 1, 0, 0]
        ]);

        // Set chart options
        var options = {

            hAxis: {
                title: 'Suhu'
            },
            vAxis: {
                title: 'Nilai Keanggotaan'
            },
            'width': 1000,
            'height': 200,
            pointsVisible: true
        };

        // Instantiate and draw the chart.
        var chart = new google.visualization.LineChart(document.getElementById('suhu'));
        chart.draw(data, options);
    }
    google.charts.setOnLoadCallback(suhuChart);

    function salinityChart() {
        // Define the chart to be drawn.
        var data = new google.visualization.DataTable();
        data.addColumn('string');
        data.addColumn('number', 'Sedang');
        data.addColumn('number', 'Sangat Buruk');
        data.addColumn('number', 'Buruk');
        data.addColumn('number', 'Baik');
        data.addRows([
          //biru, merah, kuning, ijo
            ['0', 0, 1, 0, 0],
            ['3', 0, 1, 0, 0],
            ['5', 0, 0.5, 0, 0],
            ['7', 0, 0, 1, 0],
            ['10', 0, 0, 1, 0],
            ['13', 1, 0, 0, 0],
            ['18', 1, 0, 0, 0],
            ['20', 0, 0, 0, 1],
            ['28', 0, 0, 0, 1],
            ['30', 1, 0, 0, 0],
            ['35', 1, 0, 0, 0],
            ['38', 0, 0, 1, 0],
            ['40', 0, 0, 1, 0],
            ['42', 0, 0.5, 0, 0],
            ['45', 0, 1, 0, 0],
            ['', 0, 1, 0, 0],
        ]);

        // Set chart options
        var options = {

            hAxis: {
                title: 'Salinity'
            },
            vAxis: {
                title: 'Nilai Keanggotaan'
            },
            'width': 1000,
            'height': 200,
            pointsVisible: true
        };

        // Instantiate and draw the chart.
        var chart = new google.visualization.LineChart(document.getElementById('salinity'));
        chart.draw(data, options);
    }
    google.charts.setOnLoadCallback(salinityChart);

    function dosChart() {
        // Define the chart to be drawn.
        var data = new google.visualization.DataTable();
        data.addColumn('string');
        data.addColumn('number', 'Sedang');
        data.addColumn('number', 'Sangat Buruk');
        data.addColumn('number', 'Buruk');
        data.addColumn('number', 'Baik');
        data.addRows([
            ['0', 0, 1, 0, 0],
            ['1', 0, 1, 0, 0],
            ['2', 0, 0.5, 0, 0],
            ['3', 0, 0, 1, 0],
            ['3.2', 0, 0, 1, 0],
            ['3.5', 1, 0, 0, 0],
            ['4', 1, 0, 0, 0],
            ['4.5', 0, 0, 0, 1],
            ['6.5', 0, 0, 0, 1],
            ['7', 1, 0, 0, 0],
            ['7.5', 1, 0, 0, 0],
            ['8', 0, 0, 1, 0],
            ['8.5', 0, 0, 1, 0],
            ['9', 0, 0.5, 0, 0],
            ['9.5', 0, 1, 0, 0],
            ['', 0, 1, 0, 0]
        ]);

        // Set chart options
        var options = {

            hAxis: {
                title: 'd.o'
            },
            vAxis: {
                title: 'Nilai Keanggotaan'
            },
            'width': 1000,
            'height': 200,
            pointsVisible: true
        };

        // Instantiate and draw the chart.
        var chart = new google.visualization.LineChart(document.getElementById('dos'));
        chart.draw(data, options);
    }
    google.charts.setOnLoadCallback(dosChart);

    function kualChart() {
        // Define the chart to be drawn.
        var data = new google.visualization.DataTable();
        data.addColumn('string');
        data.addColumn('number', 'B');
        data.addColumn('number', 'D');
        data.addColumn('number', 'C');
        data.addColumn('number', 'A');
        data.addRows([
            ['25', 0, 1, 0, 0],
            ['50', 0, 0, 1, 0],
            ['75', 1, 0, 0, 0],
            ['100', 0, 0, 0, 1],
            // ['3.2', 0, 0, 1, 0],
            // ['3.5', 1, 0, 0, 0],
            // ['4', 1, 0, 0, 0],
            // ['4.5', 0, 0, 0, 1],
            // ['6.5', 0, 0, 0, 1],
            // ['7', 1, 0, 0, 0],
            // ['7.5', 1, 0, 0, 0],
            // ['8', 0, 0, 1, 0],
            // ['8.5', 0, 0, 1, 0],
            // ['9', 0, 0.5, 0, 0],
            // ['9.5', 0, 1, 0, 0],
            // ['', 0, 1, 0, 0]
        ]);

        // Set chart options
        var options = {

            hAxis: {
                title: 'Kualitas  Air'
            },
            vAxis: {
                title: 'Nilai Keanggotaan'
            },
            'width': 1000,
            'height': 200,
            pointsVisible: true
        };

        // Instantiate and draw the chart.
        var chart = new google.visualization.LineChart(document.getElementById('kual'));
        chart.draw(data, options);
    }
    google.charts.setOnLoadCallback(kualChart);

</script>
@endpush
