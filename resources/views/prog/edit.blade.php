@extends('layouts.app')

@section('content')
@include('layouts.headers.header')
    <div class="container-fluid mt--7">
        <div class="card">
            <div class="card-body">
                <form class="" action="{{ route('programmatics.update', $dataProg->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                    <div class="row">
                        <div class="col">
                            <label for="demo_overview_minimal">Tanggal</label>
                            <input type="date" class="form-control" id="dataadd" placeholder="" name="dataadd" value="{{$dataProg->dataadd}}">
                        </div>
                    </div>
                    <div class="row" style="padding-top: 10px">
                        <div class="col">
                            <label for="demo_overview_minimal">Website</label>
                            <select id="demo_overview_minimal" class="form-control" data-role="select-dropdown" data-profile="minimal" name="website" value="" selected="">
                                @foreach ($dataWebsite as $item)
                                    <option value="{{ $item->id }}" {{$dataProg->website == $item->id  ? 'selected' : ''}}>{{ $item->website_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col">
                            <label for="demo_overview_minimal">Partner</label>
                            <select id="demo_overview_minimal" class="form-control" data-role="select-dropdown" data-profile="minimal" name="partner_id" value="" selected="">
                                @foreach ($dataPartner as $item)
                                    <option value="{{ $item->id }}" {{$dataProg->partner_id == $item->id  ? 'selected' : ''}}>{{ $item->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row" style="padding-top: 10px">
                        <div class="col">
                            <label for="demo_overview_minimal">Views</label>
                            <input type="text" class="form-control" id="views" placeholder="" name="views" value="{{$dataProg->views}}">
                        </div>
                        <div class="col">
                            <label for="demo_overview_minimal">Clicks</label>
                            <input type="text" class="form-control" id="clicks" placeholder="" name="clicks" value="{{$dataProg->clicks}}">
                        </div>
                        <div class="col">
                            <label for="demo_overview_minimal">CTR</label>
                            <input type="text" class="form-control" id="ctr" placeholder="" name="ctr" value="{{$dataProg->ctr}}">
                        </div>
                    </div>
                    <div class="row" style="padding-top: 10px">
                        <div class="col">
                            <label for="demo_overview_minimal">CPC</label>
                            <input type="text" class="form-control" id="cpc" placeholder="" name="cpc" value="{{$dataProg->cpc}}">
                        </div>
                        <div class="col">
                            <label for="demo_overview_minimal">CPM</label>
                            <input type="text" class="form-control" id="cpm" placeholder="" name="cpm" value="{{$dataProg->cpm}}">
                        </div>
                        <div class="col">
                            <label for="demo_overview_minimal">Laba</label>
                            <input type="text" class="form-control" id="laba" placeholder="" name="laba" value="{{$dataProg->laba}}">
                        </div>
                    </div>
                    <br>
                    <button class="btn btn-success" onclick="window.location='{{url('/ads')}}'" type="reset">Back</button>
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
            $('#ctr').mask('00.000', {reverse: true});
            $('#cpc').mask('00.000', {reverse: true});
            $('#cpm').mask('00.000', {reverse: true});
            $('#laba').mask('00.000', {reverse: true});
      });
    </script>
@endpush