@extends('layouts.app')

@section('content')
@include('layouts.headers.header')
    <div class="container-fluid mt--7">
        <div class="card">
            <div class="card-body">
                <form class="" action="{{ route('mst_expanditure.update', $data->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                    <div class="row">
                        <div class="col-12">
                            <p>Kategori</p>
                            <select id="demo_overview_minimal" class="form-control" data-role="select-dropdown" data-profile="minimal" name="kategori" required>
                                <option value="">PILIH KATEGORI</option>
                                <option value="Beban Langsung" {{$data->kategori == "Beban Langsung"  ? 'selected' : ''}}>Beban Langsung</option>
                                <option value="Beban Tidak Langsung" {{$data->kategori == "Beban Tidak Langsung"  ? 'selected' : ''}}>Beban Tidak Langsung</option>
                            </select>
                        </div>
                        <div class="col-12">
                            <p>Nama</p>
                            <input id="startDate" class="form-control" type="text" name="name" value="{{$data->name}}"/>
                        </div>
                    </div>
                    </div><br>
                    <div class="row justify-content-md-center">
                        <button class="btn btn-success" onclick="window.location='{{url('/mst_expanditure')}}'" type="reset">Back</button>
                        <button class="btn btn-primary" type="submit">Update Data</button>
                    </div>
                  </form>
            </div>
        </div>
        @include('layouts.footers.auth')
    </div>
@endsection