@extends('layouts.app')

@section('navbar')
    @include('layouts.navbar.navbar')
@endsection

@section('toolbar')
    @include('layouts.navbar.toolbar')
@endsection

@section('content')
    <div class="row justify-content-center mt-n20">
        <div class="col-lg-12 mt-n20">
            <div class="row justify-content-center mt-md-n20">
                <div class="col mt-md-n14">
                    <!-- Content Gender Row -->
                    <div class="row">

                        <!--Laki-Laki -->
                        <div class="col-xl-6 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-lg fw-bold text-primary text-uppercase mb-1">
                                                Laki-Laki</div>
                                            <div class="h5 mb-0 fw-bold text-gray-800">400</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fa fa-user-tie fa-2x"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Perempuan -->
                        <div class="col-xl-6 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-lg fw-bold text-success text-uppercase mb-1">
                                                Perempuan</div>
                                            <div class="h5 mb-0 fw-bold text-gray-800">200</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-user"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- TotalWarga -->
                        <div class="col mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-lg text-center fw-bold text-success text-uppercase mb-1">
                                                Total Warga RT.42</div>
                                            <div class="h5 mb-0 text-center fw-bold text-gray-800">200</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-users"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Content Lorong Row -->
                    <div class="row">

                        <!-- Lorong 1 -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-lg fw-bold text-primary text-uppercase mb-1">
                                                Total Warga Lorong - 1</div>
                                            <div class="h5 mb-0 fw-bold text-gray-800">400</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-users"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- lorong 2 -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-lg fw-bold text-primary text-uppercase mb-1">
                                                Total Warga Lorong - 2</div>
                                            <div class="h5 mb-0 fw-bold text-gray-800">400</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-users"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Lorong 3 -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-lg fw-bold text-primary text-uppercase mb-1">
                                                Total Warga Lorong - 3</div>
                                            <div class="h5 mb-0 fw-bold text-gray-800">400</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-users"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Lorong 4 -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body border-left border-primary">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-lg  fw-bold text-success text-uppercase mb-1">
                                                Total Warga Lorong - 4</div>
                                            <div class="h5 mb-0 fw-bold text-gray-800">200</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-users"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Content Chart Row -->
                    <div class="row">
                        <!-- Bar Chart -->
                        <div class="col">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Jumlah Anak, Orang Tua, dan Lansia</h6>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <canvas id="barChart"></canvas>
                                </div>
                            </div>
                        </div>

                        <div class="col">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div class="card-header py-3 d-flex flex-row align-items-center">
                                    <h6 class="m-0 font-weight-bold text-primary">Berkeluarga atau Tidak</h6>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body w-75 d-flex justify-content-center">
                                    <canvas id="donutChart"></canvas>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        //Chart.js
        var ctx = document.getElementById('barChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: @json($chartData['labels']),
                datasets: [{
                    label: 'Data',
                    data: @json($chartData['data']),
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 3
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        var ctx = document.getElementById('donutChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: @json($chartData['labels']),
                datasets: [{
                    label: 'Data',
                    data: @json($chartData['data']),
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 3
                }]
            },
            options: {
                padding: 10
            }
        });
    </script>
@endsection
