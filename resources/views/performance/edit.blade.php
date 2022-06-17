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
                        <select id="demo_overview_minimal" class="form-control" data-role="select-dropdown" data-profile="divisi" name="divisi" value="" selected="{{$dataPerformance->divisi}}">
                          <option value="">Pilih Divisi</option>
                          <option value="WE">WE</option>
                          <option value="HS">HS</option>
                          <option value="POPULIS">POPULIS</option>
                          <option value="Q1 Ide">Q1 Ide</option>
                          <option value="Q1 Revitalisasi">Q1 Revitalisasi</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="formGroupExampleInput2">Core Bisnis</label>
                        <select id="demo_overview_minimal" class="form-control" data-role="select-dropdown" data-profile="core_bisnis" name="core_bisnis" value="" selected="">
                          <option value="">Pilih Core Bisnis</option>
                          <option value="Iklan WE">Iklan WE</option>
                          <option value="Award WE">Award WE</option>
                          <option value="Seminar Banking">Seminar Banking</option>
                          <option value="Programatic WE">Programatic WE</option>
                          <option value="Youtube WE">Youtube WE</option>
                          <option value="WEA">WEA</option>
                          <option value="Iklan HS">Iklan HS</option>
                          <option value="Award HS">Award HS</option>
                          <option value="Seminar HS">Seminar HS</option>
                          <option value="Programatic HS">Programatic HS</option>
                          <option value="Programatic Populis">Programatic Populis</option>
                          <option value="Q1 Revitalisasi">Q1 Revitalisasi</option>
                          <option value="Q1 Ide">Q1 Ide</option>
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