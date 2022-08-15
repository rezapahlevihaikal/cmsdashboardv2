@extends('layouts.app')

@section('content')
@include('layouts.headers.header')
    <div class="container-fluid mt--7">
        <div class="card">
            <div class="card-body">
                <form class="" action="{{ route('performanceJprof.update', $dataPerformance->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                      <div class="form-group">
                        <label for="formGroupExampleInput2">Produk</label>
                        <input type="text" class="form-control" id="" placeholder="" name="produk" value="{{$dataPerformance->produk}}">
                      </div>
                      <div class="form-group">
                        <label for="formGroupExampleInput2">Instansi</label>
                        <input type="text" class="form-control" id="" placeholder="" name="instansi" value="{{$dataPerformance->instansi}}">
                      </div>
                      <div class="form-group">
                        <label for="formGroupExampleInput2">Target</label>
                        <input type="text" class="form-control" id="" placeholder="" name="target" value="{{$dataPerformance->target}}">
                      </div>
                      <div class="form-group">
                        <label for="formGroupExampleInput2">Pencapaian</label>
                        <input type="text" class="form-control" id="" placeholder="" name="pencapaian" value="{{$dataPerformance->pencapaian}}">
                      </div>
                      <div class="form-group">
                        <label for="formGroupExampleInput2">Core Bisnis</label>
                        <select id="demo_overview_minimal" class="form-control" data-role="select-dropdown" data-profile="divisi" name="id_core_bisnis" value="" selected="">
                          <option value="">PILIH CORE BISNIS</option>
                          @foreach ($dataCoreBisnis as $item)
                          <option value="{{ $item->id }}" {{$dataPerformance->id_core_bisnis == $item->id  ? 'selected' : ''}}>{{ $item->nama_core_jprof}}</option>
                          @endforeach
                        </select>
                      </div>
                    <button class="btn btn-success" onclick="window.location='{{url('/performanceJprof')}}'" type="reset">Back</button>
                    <button class="btn btn-primary" type="submit">Update Data</button>
                  </form>
            </div>
        </div>
        @include('layouts.footers.auth')
    </div>
@endsection