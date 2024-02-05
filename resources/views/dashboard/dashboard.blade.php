@extends('include.mainlayout')
@section('title', 'Dashboard')
@section('content')
    <div class="pagetitle">
        <h1>Dashboard</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
        </nav>

        {{-- filter Bulan baru --}}
        <div class="col-md-2" style="right=0px">
            <div class="form-floating">
                <select class="form-control" id="bulan-dropdown" name="bulan-dropdown">
                    <option value="" selected>Select Bulan</option>
                    <option value="1" >Januari</option>
                    <option value="2" >Februari</option>
                    <option value="3" >Maret</option>
                    <option value="4" >April</option>
                    <option value="5" >Mei</option>
                    <option value="6" >Juni</option>
                    <option value="7" >July</option>
                    <option value="8" >Agusstus</option>
                    <option value="9" >September</option>
                    <option value="10" >Oktober</option>
                    <option value="11" >November</option>
                    <option value="12" >Desember</option>
                </select>
                <label for="nrp">Filter Bulan <span style="color:red">*</span></label>
            </div>
        </div>
    </div>

    <section class="section dashboard">
        <div class="row">

            <!-- Left side columns -->
            <div class="col-lg-12">
                <div class="row">

                    <!-- Pelatihan Card -->
                    <div class="col-xxl-4 col-md-12">
                        <div class="card info-card sales-card">

                            <div class="filter">
                                <a class="icon" href="#" data-bs-toggle="dropdown"><i
                                        class="bi bi-three-dots"></i></a>
                                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                    <li class="dropdown-header text-start">
                                        <h6>Filter</h6>
                                    </li>

                                    <li><a class="dropdown-item" href="#">Today</a></li>
                                    <li><a class="dropdown-item" href="#">This Month</a></li>
                                    <li><a class="dropdown-item" href="#">This Year</a></li>
                                </ul>
                            </div>

                            <div class="card-body">
                                <h5 class="card-title">Pelatihan <span>| This Year</span></h5>

                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-person-workspace"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>{{ $TotalPelatihan }}</h6>


                                        <span
                                            class="text-{{ $presenPelatihan < 0 ? 'danger' : 'success' }} small pt-1 fw-bold">{{ $presenPelatihan }}%</span> <span
                                            class="text-muted small pt-2 ps-1">{{ $presenPelatihan < 0 ? 'decrease' : 'increase' }}</span>

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div><!-- End Pelatihan Card -->

                    <!-- Biaya Card -->
                    <div class="col-xxl-4 col-md-12">
                        <div class="card info-card revenue-card">

                            <div class="filter">
                                <a class="icon" href="#" data-bs-toggle="dropdown"><i
                                        class="bi bi-three-dots"></i></a>
                                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                    <li class="dropdown-header text-start">
                                        <h6>Filter</h6>
                                    </li>

                                    <li><a class="dropdown-item" href="#">Today</a></li>
                                    <li><a class="dropdown-item" href="#">This Month</a></li>
                                    <li><a class="dropdown-item" href="#">This Year</a></li>
                                </ul>
                            </div>

                            <div class="card-body">
                                <h5 class="card-title">Biaya <span>| This Year</span></h5>

                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-currency-dollar"></i>
                                    </div>
                                    <div class="ps-3">
                                        @foreach ($TotalBiaya as $data)
                                            <h6>{{ $data->total == null ? 0 : $data->total }}</h6>
                                        @endforeach
                                        <span
                                            class="text-{{ $presenBiaya < 0 ? 'danger' : 'success' }} small pt-1 fw-bold">{{ $presenBiaya }}%</span>
                                        <span
                                            class="text-muted small pt-2 ps-1">{{ $presenBiaya < 0 ? 'decrease' : 'increase' }}</span>

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div><!-- End Biaya Card -->

                    <!-- Jumlah Train Card -->
                    <div class="col-xxl-4 col-xl-12">

                        <div class="card info-card customers-card">

                            <div class="filter">
                                <a class="icon" href="#" data-bs-toggle="dropdown"><i
                                        class="bi bi-three-dots"></i></a>
                                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                    <li class="dropdown-header text-start">
                                        <h6>Filter</h6>
                                    </li>

                                    <li><a class="dropdown-item" href="#">Today</a></li>
                                    <li><a class="dropdown-item" href="#">This Month</a></li>
                                    <li><a class="dropdown-item" href="#">This Year</a></li>
                                </ul>
                            </div>

                            <div class="card-body">
                                <h5 class="card-title">Jumlah Karyawan Training <span>| This Year</span></h5>

                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-people"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>{{ $JumlahKaryawan }}</h6>
                                        <span
                                            class="text-{{ $PresentageTraining < 0 ? 'danger' : 'success' }} small pt-1 fw-bold">{{ $PresentageTraining }}%</span>
                                        <span
                                            class="text-muted small pt-2 ps-1">{{ $PresentageTraining < 0 ? 'decrease' : 'increase' }}</span>

                                    </div>
                                </div>

                            </div>
                        </div>

                    </div><!-- End Jumlah Train Card -->

                    {{-- ini Baru dibawah --}}

                    <!-- Overall Training Card -->
                    <div class="col-xxl-4 col-xl-12">

                        <div class="card info-card train-card">

                            <div class="card-body">
                                <h5 class="card-title">Overal Progress Training Tahunan <span>| This Year</span></h5>

                                <div class="d-flex align-items-center">
                                    <div class="p-6 m-20 bg-white rounded shadow">
                                        {!! $chart->container() !!}
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div><!-- End Overall Training  Card -->

                    <!-- Overall ADMP Card -->
                    <div class="col-xxl-4 col-xl-12">

                        <div class="card info-card train-card">

                            <div class="card-body">
                                <h5 class="card-title">Overal Progress ADMP Tahunan <span>| This Year</span></h5>

                                <div class="d-flex align-items-center">
                                    <div class="p-6 m-20 bg-white rounded shadow">
                                        {!! $admpChartDonat->container() !!}
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div><!-- End Overall ADMP Card -->

                    <!-- Overall Coaching Card -->
                    <div class="col-xxl-4 col-xl-12">

                        <div class="card info-card train-card">

                            <div class="card-body">
                                <h5 class="card-title">Overal Progress Coaching Tahunan <span>| This Year</span></h5>

                                <div class="d-flex align-items-center">
                                    <div class="p-6 m-20 bg-white rounded shadow">
                                        {!! $coachingChartDonat->container() !!}
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div><!-- End Overall Coaching Card -->

                    <!-- Total Approve Pelatihan Atasan Card -->
                    <div class="col-xxl-3 col-md-6">
                        <div class="card info-card sales-card">

                            <div class="card-body">
                                <h5 class="card-title">Total Approve Pelatihan </br> by Superintendent PD</h5>

                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-file-earmark-check"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>{{ $aprvAtasan }}</h6>

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div><!-- End Total Approve Pelatihan Atasan Card -->

                    <!-- Total Approve Pelatihan HRD Card -->
                    <div class="col-xxl-3 col-md-6">
                        <div class="card info-card sales-card">

                            <div class="card-body">
                                <h5 class="card-title">Total Approve Pelatihan </br> by Manager</h5>

                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-file-earmark-check"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>{{ $aprvHRD }}</h6>

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div><!-- End Total Approve Pelatihan HRD Card -->

                    <!-- Total Approve Manager Pelatihan Card -->
                    <div class="col-xxl-3 col-md-6">
                        <div class="card info-card sales-card">

                            <div class="card-body">
                                <h5 class="card-title">Total Approve Pelatihan </br> by HRD Manager</h5>

                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-file-earmark-check"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>{{ $aprvManager }}</h6>

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div><!-- End Total Approve Pelatihan Manager Card -->

                    <!-- Total Approve Pelatihan Direksi Card -->
                    <div class="col-xxl-3 col-md-6">
                        <div class="card info-card sales-card">

                            <div class="card-body">
                                <h5 class="card-title">Total Approve Pelatihan </br> by Direksi</h5>

                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-file-earmark-check"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>{{ $aprvDireksi }}</h6>

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div><!-- End Total Approve Pelatihan Direksi Card -->

                    <!-- Budget Training per month Card -->
                    <div class="col-xxl-6 col-xl-12">

                        <div class="card info-card train-card">

                            <div class="card-body">
                                <h5 class="card-title">Budget Karyawan Training <span>| This Year</span></h5>

                                <div class="d-flex align-items-center">
                                    <div class="p-6 m-20 bg-white rounded shadow">
                                        {!! $chartLine->container() !!}
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div><!-- End Budget  Training per month Card -->

                    <!-- Jumlah Training per month Card -->
                    <div class="col-xxl-6 col-xl-12">

                        <div class="card info-card train-card">

                            <div class="card-body">
                                <h5 class="card-title">Karyawan Training | ADMP | Coaching | <span>| This Year</span></h5>

                                <div class="d-flex align-items-center">
                                    <div class="p-6 m-20 bg-white rounded shadow">
                                        {!! $chartBar->container() !!}
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div><!-- End Jumlah Training per month Card -->

                </div>


            </div><!-- End Left side columns -->



        </div>
    </section>

    {{-- Semua Script Baru --}}
    <script>
        $(document).ready(function() {

            $('#bulan-dropdown').on('change', function() {
                var selectedVal = $(this).val();
                $.ajax({
                    type: 'GET',
                    url: '/dashboard',
                    data: {
                        month: selectedVal,
                    },
                    success: function() {
                        // console.log(data);
                        location.href = '/dashboard?month=' + selectedVal;
                        $('#bulan-dropdown').val(selectedVal);
                    },
                    error: function(error) {
                        console.log('Ajax Error:', error);
                    }
                });
            });
        });
    </script>

    {{-- // Script For Chart --}}
    <script src="{{ $chart->cdn() }}"></script>
    <script src="{{ $chartLine->cdn() }}"></script>
    <script src="{{ $chartBar->cdn() }}"></script>
    <script src="{{ $admpChartDonat->cdn() }}"></script>
    <script src="{{ $coachingChartDonat->cdn() }}"></script>

    {{-- // Script For Chart --}}
    {{ $chart->script() }}
    {{ $chartLine->script() }}
    {{ $chartBar->script() }}
    {{ $admpChartDonat->script() }}
    {{ $coachingChartDonat->script() }}

@endsection
