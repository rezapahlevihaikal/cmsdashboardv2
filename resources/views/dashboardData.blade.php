@extends('layouts.app')

@section('content')
    <div class="header bg-gradient pb-8 pt-5 pt-md-8" style="background-color: #990000">
        <div class="container-fluid">
            <div class="header-body">
                
            </div>
        </div>
    </div>
    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 mb-5 mb-xl-0">
                <div class="card shadow">
                    <div class="card-header bg-transparent">
                        <div class="row align-items-center">
                            <div class="col">
                                <h6 class="text-uppercase text-muted ls-1 mb-1">Selamat Datang</h6>
                                <h2 class="mb-0">{{Auth::user()->name}}</h2>
                            </div>
                        </div>
                    </div>
                    {{-- <div class="card-body">
                        <!-- Chart -->
                        <div class="chart">
                            <canvas id="we" class="chart-canvas"></canvas>
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>   
        
        @include('layouts.footers.auth')
    </div>
@endsection