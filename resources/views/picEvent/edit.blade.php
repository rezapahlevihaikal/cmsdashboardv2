@extends('layouts.app')

@section('content')
@include('layouts.headers.header')
    <div class="container-fluid mt--7">
        <div class="card">
            <div class="card-body">
                <form class="" action="{{ route('picEvent.update', $dataPic->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                    <div class="row">
                        <div class="col-12">
                            <p>Nama PIC</p>
                            <input id="startDate" class="form-control" type="text" name="nama_pic" value="{{$dataPic->nama_pic}}"/>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <p>Divis</p>
                            <input id="startDate" class="form-control" type="text" name="divisi" value="{{$dataPic->divisi}}"/>
                        </div>
                    </div>
                    </div><br>
                    <div class="row justify-content-md-center">
                        <button class="btn btn-success" onclick="window.location='{{url('/eventCategory')}}'" type="reset">Back</button>
                        <button class="btn btn-primary" type="submit">Update Data</button>
                    </div>
                  </form>
            </div>
        </div>
        @include('layouts.footers.auth')
    </div>
@endsection