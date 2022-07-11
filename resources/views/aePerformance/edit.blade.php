@extends('layouts.app')

@section('content')
@include('layouts.headers.header')
    <div class="container-fluid mt--7">
        <div class="card">
            <div class="card-body">
                <form class="" action="{{ route('aePerformance.update', $dataAePerformance->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                    <div class="row">
                        <div class="col-12">
                            <label for="demo_overview_minimal">Nama Pegawai</label>
                            <select id="demo_overview_minimal" class="form-control" data-role="select-dropdown" data-profile="minimal" name="employee_id" value="{{$dataAePerformance->employee_id}}" selected="">
                                @foreach ($dataAeEmployee as $item)
                                    <option value="{{ $item->id }}" {{$dataAePerformance->employee_id == $item->id  ? 'selected' : ''}}>{{ $item->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row" style="padding-top: 10px">
                        <div class="col">
                            <label for="demo_overview_minimal">Target</label>
                            <input type="text" class="form-control" name="target" value="{{$dataAePerformance->target}}">
                        </div>
                        <div class="col">
                            <label for="demo_overview_minimal">Pencapaian</label>
                            <input type="text" class="form-control" name="pencapaian" value="{{$dataAePerformance->pencapaian}}">
                        </div>
                    </div>
                    <div class="row" style="padding-top: 10px">
                        <div class="col">
                            <label for="demo_overview_minimal">Bulan</label>
                            <input type="text" class="form-control" name="bulan" value="{{$dataAePerformance->bulan}}">
                        </div>
                        <div class="col">
                            <label for="demo_overview_minimal">Tahun</label>
                            <input type="text" class="form-control" name="tahun" value="{{$dataAePerformance->tahun}}">
                        </div>
                    </div>
                    <br>
                    <button class="btn btn-success" onclick="window.location='{{url('/aePerformance')}}'" type="reset">Back</button>
                    <button class="btn btn-primary" type="submit">Update Data</button>
                  </form>
            </div>
        </div>
        @include('layouts.footers.auth')
    </div>
@endsection