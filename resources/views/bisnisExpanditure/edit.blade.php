@extends('layouts.app')

@section('content')
@include('layouts.headers.header')
    <div class="container-fluid mt--7">
        <div class="card">
            <div class="card-body">
                <form class="" action="{{ route('bisnisExpanditure.update', $data->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                    <div class="row">
                        <div class="col">
                            <label for="demo_overview_minimal">Core Bisnis</label>
                            <select id="demo_overview_minimal" class="form-control" data-role="select-dropdown" data-profile="minimal" name="core_bisnis_id" value="" selected="">
                                @foreach ($dataCoreBisnis as $item)
                                <option value="{{ $item->id }}" {{$data->core_bisnis_id == $item->id  ? 'selected' : ''}}>{{ $item->nama_core_bisnis}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col">
                            <label for="formGroupExampleInput2">Kategori</label>
                            <select id="demo_overview_minimal" class="form-control" data-role="select-dropdown" data-profile="minimal" name="kategori_id" required>
                                <option value="">PILIH KATEGORI</option>
                                @foreach ($dataMaster as $item)
                                    <option value="{{ $item->id }}" {{$data->kategori_id == $item->id  ? 'selected' : ''}}>{{ $item->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row" style="padding-top: 10px">
                        <div class="col">
                            <p>Sub Domain</p>
                            <input id="" class="form-control" type="text" name="sub_domain" value="{{$data->sub_domain}}"/>
                          </div>    
                        <div class="col">
                            <p>Nominal</p>
                            <input id="" class="form-control" type="text" name="nominal" value="{{$data->nominal}}"/>
                        </div>
                    </div>
                    <div class="row" style="padding-top: 10px">
                        <div class="col">
                            <p>Bulan</p>
                            <input type="text" class="form-control" name="bulan" value="{{$data->bulan}}">
                        </div>
                        <div class="col">
                            <p>Tahun</p>
                            <input type="text" class="form-control" name="tahun" value="{{$data->tahun}}">
                        </div>
                    </div>
                    <div class="row" style="padding-top: 10px">
                        <div class="col">
                            <p>Keterangan</p>
                            <textarea class="form-control rounded-0" id="exampleFormControlTextarea2" rows="3" name="keterangan" value="">{{$data->keterangan}}</textarea>
                        </div>
                    </div>
                    
                    <br>
                    <button class="btn btn-success" onclick="window.location='{{url('/bisnisExpanditure')}}'" type="reset">Back</button>
                    <button class="btn btn-primary" type="submit">Update Data</button>
                  </form>
            </div>
        </div>
        @include('layouts.footers.auth')
    </div>
@endsection