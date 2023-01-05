@extends('layouts.app')

@section('content')
@include('layouts.headers.header')
    <div class="container-fluid mt--7">
        <div class="card">
            <div class="card-body">
                <form class="" action="{{ route('youtube.update', $dataYoutube->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                    <div class="form-row">
                        <div class="col-md-3 mb-3">
                            <label for="validationTooltip02">Tanggal</label>
                            <input type="date" class="form-control" id="validationTooltip02" name="dataadd" value="{{$dataYoutube->dataadd}}" required>
                        
                        </div>
                        <div class="col">
                            <label for="formGroupExampleInput2">Website</label>
                            <select id="demo_overview_minimal" class="form-control" data-role="select-dropdown" data-profile="minimal" name="website_id" value="" selected="">
                                @foreach ($dataWebsite as $item)
                                    <option value="{{ $item->id }}" {{$dataYoutube->website_id == $item->id  ? 'selected' : ''}}>{{ $item->website_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col">
                            <label for="formGroupExampleInput2">Rank</label>
                            <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="" name="rank" value="{{$dataYoutube->rank}}">
                        </div>
                    </div>
                    <button class="btn btn-success" onclick="window.location='{{url('/youtbe')}}'" type="reset">Back</button>
                    <button class="btn btn-primary" type="submit">Update Data</button>
                  </form>
            </div>
        </div>
        @include('layouts.footers.auth')
    </div>
@endsection