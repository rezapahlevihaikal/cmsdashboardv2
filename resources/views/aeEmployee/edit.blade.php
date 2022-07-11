@extends('layouts.app')

@section('content')
@include('layouts.headers.header')
    <div class="container-fluid mt--7">
        <div class="card">
            <div class="card-body">
                <form class="" action="{{ route('aeEmployee.update', $dataAeEmployee->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                    <div class="row">
                        <div class="col-12">
                            <label for="demo_overview_minimal">Nama Pegawai</label>
                            <input id="startDate" class="form-control" type="text" name="name" value="{{$dataAeEmployee->name}}"/>
                        </div>
                    </div>
                    <div class="row" style="padding-top: 10px">
                        <div class="col">
                            <label for="demo_overview_minimal">Divisi</label>
                            <select id="demo_overview_minimal" class="form-control" data-role="select-dropdown" data-profile="minimal" name="divisi_id" value="" selected="">
                                @foreach ($dataDivisi as $item)
                                    <option value="{{ $item->id }}" {{$dataAeEmployee->divisi_id == $item->id  ? 'selected' : ''}}>{{ $item->nama_divisi}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col">
                            <label for="demo_overview_minimal">Core Bisnis</label>
                            <select id="demo_overview_minimal" class="form-control" data-role="select-dropdown" data-profile="minimal" name="core_bisnis_id" value="" selected="">
                                @foreach ($dataCoreBisnis as $item)
                                <option value="{{ $item->id }}" {{$dataAeEmployee->core_bisnis_id == $item->id  ? 'selected' : ''}}>{{ $item->nama_core_bisnis}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col">
                            <label for="demo_overview_minimal">Hire Date</label>
                            <input type="date" class="form-control" id="" placeholder="" name="hiredate" value="{{$dataAeEmployee->hiredate}}">
                        </div>
                    </div>
                    <br>
                    <button class="btn btn-success" onclick="window.location='{{url('/aeEmployee')}}'" type="reset">Back</button>
                    <button class="btn btn-primary" type="submit">Update Data</button>
                  </form>
            </div>
        </div>
        @include('layouts.footers.auth')
    </div>
@endsection