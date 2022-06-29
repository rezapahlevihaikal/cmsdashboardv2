@extends('layouts.app')

@section('content')
@include('layouts.headers.header')
    <div class="container-fluid mt--7">
        <div class="card">
            <div class="card-body">
                <form class="" action="{{ route('performance.update', $dataPerformance->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                    <div class="form-group">
                        <label for="formGroupExampleInput2">Divisi</label>
                        <select id="demo_overview_minimal" class="form-control" data-role="select-dropdown" data-profile="divisi" name="id_divisi" value="" selected="{{$dataPerformance->divisi}}">
                          @foreach ($dataDivisi as $item)
                            <option value="{{ $item->id }}" {{$dataPerformance->id_divisi == $item->id  ? 'selected' : ''}}>{{ $item->nama_divisi}}</option>
                          @endforeach
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="formGroupExampleInput2">Core Bisnis</label>
                        <select id="demo_overview_minimal" class="form-control" data-role="select-dropdown" data-profile="core_bisnis" name="id_core_bisnis" value="" selected="">
                          @foreach ($dataCoreBisnis as $item)
                            <option value="{{ $item->id }}" {{$dataPerformance->id_core_bisnis == $item->id  ? 'selected' : ''}}>{{ $item->nama_core_bisnis}}</option>
                          @endforeach
                      </select>
                      </div>
                      <div class="form-group">
                        <label for="formGroupExampleInput2">Target</label>
                        <input type="text" class="form-control" id="" placeholder="" name="target" value="{{$dataPerformance->target}}">
                      </div>
                      <div class="form-group">
                        <label for="formGroupExampleInput2">Pencapaian</label>
                        <input type="text" class="form-control" id="" placeholder="" name="pencapaian" value="{{$dataPerformance->pencapaian}}">
                      </div>
                      {{-- <div class="form-group">
                        <label for="formGroupExampleInput2">Value</label>
                        <input type="text" class="form-control" id="" placeholder="" name="value">
                      </div> --}}
                      <div class="form-group">
                        <label for="formGroupExampleInput2">Tanggal</label>
                        <input type="text" class="form-control" id="" placeholder="" name="tanggal" value="{{$dataPerformance->tanggal}}">
                      </div>
                      <div class="form-group">
                        <label for="formGroupExampleInput2">Bulan</label>
                        <input type="text" class="form-control" id="" placeholder="" name="bulan" value="{{$dataPerformance->bulan}}">
                      </div>
                      <div class="form-group">
                        <label for="formGroupExampleInput2">Tahun</label>
                        <input type="text" class="form-control" id="" placeholder="" name="tahun" value="{{$dataPerformance->tahun}}">
                      </div>
                      <br>
                    <button class="btn btn-success" onclick="window.location='{{url('/performance')}}'" type="reset">Back</button>
                    <button class="btn btn-primary" type="submit">Update Data</button>
                  </form>
            </div>
        </div>
        @include('layouts.footers.auth')
    </div>
@endsection