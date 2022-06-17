@extends('layouts.app')

@section('content')
    <div class="header bg-gradient pb-8 pt-5 pt-md-8" style="background-color: #990000">
        <div class="container-fluid">
            <div class="header-body">
                <!-- Card stats -->
                <div class="row">
                    <div class="col-xl-4 col-lg-6">
                        <div class="card card-stats mb-4 mb-xl-0">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h5 class="card-title text-uppercase text-muted mb-0">Warta Ekonomi</h5>
                                        <span class="h2 font-weight-bold mb-0">{{$topRanks->we}}</span>
                                    </div>
                                    <div class="col-auto">
                                        <div class="avatar avatar-sm rounded-circle">
                                            <img src="{{ asset('argon') }}/img/brand/logowe.png" alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-6">
                        <div class="card card-stats mb-4 mb-xl-0">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h5 class="card-title text-uppercase text-muted mb-0">Populis</h5>
                                        <span class="h2 font-weight-bold mb-0">{{$topRanks->populis}}</span>
                                    </div>
                                    <div class="col-auto">
                                        <div class="avatar avatar-sm rounded-circle">
                                            <img src="{{ asset('argon') }}/img/brand/populis.jpg" alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-6">
                        <div class="card card-stats mb-4 mb-xl-0">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h5 class="card-title text-uppercase text-muted mb-0">HerStory</h5>
                                        <span class="h2 font-weight-bold mb-0">{{$topRanks->hs}}</span>
                                    </div>
                                    <div class="col-auto">
                                        <div class="avatar avatar-sm rounded-circle">
                                            <img src="{{ asset('argon') }}/img/brand/hs.jpg" alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-4 mb-5 mb-xl-0">
                <div class="card shadow">
                    <div class="card-header bg-transparent">
                        <div class="row align-items-center">
                            <div class="col">
                                <h6 class="text-uppercase text-muted ls-1 mb-1">Warta Ekonomi</h6>
                                <h2 class="mb-0">Total Ranks</h2>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <!-- Chart -->
                        <div class="chart">
                            <canvas id="we" class="chart-canvas"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 mb-5 mb-xl-0">
                <div class="card shadow">
                    <div class="card-header bg-transparent">
                        <div class="row align-items-center">
                            <div class="col">
                                <h6 class="text-uppercase text-muted ls-1 mb-1">HerStory</h6>
                                <h2 class="mb-0">Total Ranks</h2>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <!-- Chart -->
                        <div class="chart">
                            <canvas id="hs" class="chart-canvas"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 mb-5 mb-xl-0">
                <div class="card shadow">
                    <div class="card-header bg-transparent">
                        <div class="row align-items-center">
                            <div class="col">
                                <h6 class="text-uppercase text-muted ls-1 mb-1">Populis</h6>
                                <h2 class="mb-0">Total orders</h2>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <!-- Chart -->
                        <div class="chart">
                            <canvas id="pop" class="chart-canvas"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        @include('layouts.footers.auth')
    </div>
@endsection

@push('js')
    {{-- <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>
    <script>
        var tanggalWe = <?php echo $tanggalWe; ?>;
        var rankWe = <?php echo $rankWe; ?>;
    
        var tanggalHs = <?php echo $tanggalHs; ?>;
        var rankHs = <?php echo $rankHs; ?>;
    
        var tanggalPop = <?php echo $tanggalPop; ?>;
        var rankPop = <?php echo $rankPop; ?>;
    
        var WeData = {
            labels: tanggalWe,
            datasets: [{
                label: 'Grafik rank',
                backgroundColor: "#FF6B6B",
                data: rankWe
            }]
        };
    
        var HsData = {
            labels: tanggalHs,
            datasets: [{
                label: 'Grafik rank',
                backgroundColor: "#6BCB77",
                data: rankHs
            }]
        };
    
        var PopData = {
            labels: tanggalPop,
            datasets: [{
                label: 'Grafik rank',
                backgroundColor: "#062C30",
                data: rankPop
            }]
        };
    
        window.onload = function() 
        {
            var ctx = document.getElementById("we").getContext("2d");
            window.myBar = new Chart(ctx, {
                type: 'bar',
                data: WeData,
                options: {
                    elements: {
                        rectangle: {
                            borderWidth: 2,
                            borderColor: '#c1c1c1',
                            borderSkipped: 'bottom'
                        }
                    },
                    responsive: true,
                    title: {
                        display: true,
                        text: 'Per tanggal'
                    }
                }
            });
    
            var cty = document.getElementById("hs").getContext("2d");
            window.myBar = new Chart(cty, {
                type: 'bar',
                data: HsData,
                options: {
                    elements: {
                        rectangle: {
                            borderWidth: 2,
                            borderColor: '#6BCB77',
                            borderSkipped: 'bottom'
                        }
                    },
                    responsive: true,
                    title: {
                        display: true,
                        text: 'Per tanggal'
                    }
                }
            });
    
            var cty = document.getElementById("pop").getContext("2d");
            window.myBar = new Chart(cty, {
                type: 'bar',
                data: PopData,
                options: {
                    elements: {
                        rectangle: {
                            borderWidth: 2,
                            borderColor: '#062C30',
                            borderSkipped: 'bottom'
                        }
                    },
                    responsive: true,
                    title: {
                        display: true,
                        text: 'Per tanggal'
                    }
                }
            });
        };
    </script>
@endpush