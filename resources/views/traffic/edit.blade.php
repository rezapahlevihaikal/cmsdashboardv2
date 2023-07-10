@extends('layouts.app')

@section('content')
@include('layouts.headers.header')
    <div class="container-fluid mt--7">
        <div class="card">
            <div class="card-body">
                <form class="" action="{{ route('traffic.update', $data->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                    <div class="row">
                        <div class="col-6">
                            <label for="demo_overview_minimal">Tanggal</label>
                            <input type="date" class="form-control" value="{{$data->tanggal}}" name="tanggal" id="">
                        </div>
                        <div class="col-6">
                            <label for="demo_overview_minimal">Nama Website</label>
                            <select id="demo_overview_minimal" class="form-control" data-role="select-dropdown" data-profile="minimal" name="website_id" value="{{$data->website_id}}" selected="">
                                @foreach ($website as $item)
                                    <option value="{{ $item->id }}" {{$data->website_id == $item->id  ? 'selected' : ''}}>{{$item->website_name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row" style="padding-top: 10px">
                        <div class="col">
                            <div class="form-group">
                                <label class="" for="formGroupExampleInput2">Pageview</label>
                                <input type="text" class="form-control" value="{{$data->pageview}}" name="pageview" id="target">
                              </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label class="" for="formGroupExampleInput2">User</label>
                                <input type="text" class="form-control" name="user" id="pencapaian" value="{{$data->user}}">
                              </div>
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
@push('js')
    <script type="text/javascript">
       $(document).ready( function () {
            $('#pencapaian').mask('#.##0', {reverse: true});
            $('#target').mask('#.##0', {reverse: true});
        } );
    </script>
@endpush