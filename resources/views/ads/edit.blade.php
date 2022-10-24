@extends('layouts.app')

@section('content')
@include('layouts.headers.header')
    <div class="container-fluid mt--7">
        <div class="card">
            <div class="card-body">
                <form class="" action="{{ route('ads.update', $dataAds->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                    <div class="row">
                        <div class="col">
                            <label for="demo_overview_minimal">Website</label>
                            <select id="demo_overview_minimal" class="form-control" data-role="select-dropdown" data-profile="minimal" name="website" value="" selected="">
                                @foreach ($dataWebsite as $item)
                                    <option value="{{ $item->id }}" {{$dataAds->website == $item->id  ? 'selected' : ''}}>{{ $item->website_name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row" style="padding-top: 10px">
                        <div class="col">
                            <label for="demo_overview_minimal">Tanggal Deposit</label>
                            <input type="date" class="form-control" id="" placeholder="" name="tanggal_deposit" value="{{$dataAds->tanggal_deposit}}">
                        </div>
                        <div class="col">
                            <label for="demo_overview_minimal">Tanggal Habis</label>
                            <input type="date" class="form-control" id="" placeholder="" name="tanggal_habis" value="{{$dataAds->tanggal_habis}}">
                        </div>
                    </div>
                    <div class="row" style="padding-top: 10px">
                        <div class="col">
                            <label for="demo_overview_minimal">Deposit</label>
                            <input type="text" class="form-control" id="" placeholder="" name="deposit" value="{{$dataAds->deposit}}">
                        </div>
                        <div class="col">
                            <label for="demo_overview_minimal">Status</label>
                            <select id="demo_overview_minimal" class="form-control" data-role="select-dropdown" data-profile="minimal" name="status" value="" selected="">
                                <option value="0" {{$dataAds->status == 0  ? 'selected' : ''}}>On Progress</option>
                                <option value="1" {{$dataAds->status == 1  ? 'selected' : ''}}>Finish</option>
                            </select>
                        </div>
                        <div class="col">
                            <label for="demo_overview_minimal">Sisa Slot</label>
                            <input type="text" class="form-control" id="" placeholder="" name="sisa_slot" value="{{$dataAds->sisa_slot}}">
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