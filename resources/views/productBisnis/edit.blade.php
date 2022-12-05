@extends('layouts.app')

@section('content')
@include('layouts.headers.header')
    <div class="container-fluid mt--7">
        <div class="card">
            <div class="card-body">
                <form class="" action="{{ route('productBisnis.update', $data->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                    <div class="row">
                        <div class="col">
                            <label for="formGroupExampleInput2">Kategori</label>
                            <select id="demo_overview_minimal" class="form-control" data-role="select-dropdown" data-profile="minimal" name="kategori_id" value="" selected="">
                                @foreach ($kategoriBisnis as $item)
                                    <option value="{{ $item->id }}" {{$data->kategori_id == $item->id  ? 'selected' : ''}}>{{ $item->nama_kategori}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col">
                            <label for="formGroupExampleInput2">Nama Product</label>
                            <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="" name="nama_product" value="{{$data->nama_product}}">
                        </div>
                        <div class="col">
                            <label for="formGroupExampleInput2">Keterangan</label>
                            <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="" name="keterangan" value="{{$data->keterangan}}">
                        </div>
                    </div>
                    <br>
                    <button class="btn btn-success" onclick="window.location='{{url('/productBisnis')}}'" type="reset">Back</button>
                    <button class="btn btn-primary" type="submit">Update Data</button>
                  </form>
            </div>
        </div>
        @include('layouts.footers.auth')
    </div>
@endsection