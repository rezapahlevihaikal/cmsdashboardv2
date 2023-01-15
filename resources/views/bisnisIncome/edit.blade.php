@extends('layouts.app')

@section('content')
@include('layouts.headers.header')
    <div class="container-fluid mt--7">
        <div class="card">
            <div class="card-body">
                <form class="" action="{{ route('bisnisIncome.update', $data->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                    <div class="row">
                        <div class="col">
                            <label for="demo_overview_minimal">Core Bisnis</label>
                            <select id="demo_overview_minimal" class="form-control" data-role="select-dropdown" data-profile="minimal" name="core_bisnis_id" value="" selected="">
                                @foreach ($dataCoreBisnis as $item)
                                <option value="{{ $item->id }}" {{$data->core_bisnis_id == $item->id  ? 'selected' : ''}}>{{ $item->nama_core_bisnis}} | {{$item->divisi}} </option>
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
                            <div class="form-group">
                                <label class="" for="formGroupExampleInput2">Pendapatan</label>
                                <div class="input-group mb-2">
                                  <div class="input-group-prepend">
                                    <div class="input-group-text">Rp</div>
                                  </div>
                                  <input type="text" class="form-control" id="pendapatan" placeholder="" name="pendapatan" value="{{$data->pendapatan}}">
                                </div>
                              </div>
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
                            <p>Deskripsi</p>
                            <textarea class="form-control rounded-0" id="exampleFormControlTextarea2" rows="3" name="description" value="">{{$data->description}}</textarea>
                        </div>
                    </div>
                    
                    <br>
                    <button class="btn btn-success" onclick="window.location='{{url('/bisnisIncome')}}'" type="reset">Back</button>
                    <button class="btn btn-primary" type="submit">Update Data</button>
                  </form>
            </div>
        </div>
        @include('layouts.footers.auth')
    </div>
@endsection
@push('js')
    <script type="text/javascript">
       $(document).ready( function () {
            $('#pendapatan').mask('#.##0', {reverse: true});
        } );
    </script>
@endpush