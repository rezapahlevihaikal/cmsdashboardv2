@extends('layouts.app')

@section('content')
@include('layouts.headers.header')
    <div class="container-fluid mt--7">
        <div class="card">
            <div class="card-body">
                <form class="" action="{{ route('events.update', $dataEvents->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                    <div class="row">
                        <div class="col">
                            <label for="demo_overview_minimal">Partner</label>
                            <select id="demo_overview_minimal" class="form-control" data-role="select-dropdown" data-profile="minimal" name="partner_id" value="" selected="">
                                @foreach ($dataPartner as $item)
                                <option value="{{ $item->id }}" {{$dataEvents->partner_id == $item->id  ? 'selected' : ''}}>{{ $item->nama_partner}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col">
                            <label for="demo_overview_minimal">Tanggal</label>
                            <input id="startDate" class="form-control" type="date" name="tanggal" value="{{$dataEvents->tanggal}}"/>
                            <span id="dateSelected"></span>
                        </div>
                    </div>
                    <div class="row" style="padding-top: 10px">
                        <div class="col">
                            <p>Start Time</p>
                            <input id="startDate" class="form-control" type="time" name="start_time" value="{{$dataEvents->start_time}}"/>
                          </div>    
                        <div class="col">
                            <p>Finish Time</p>
                            <input id="startDate" class="form-control" type="time" name="finish_time" value="{{$dataEvents->finish_time}}"/>
                        </div>
                        <div class="col">
                            <p>Venue</p>
                            <input type="text" class="form-control" name="venue" value="{{$dataEvents->venue}}">
                        </div>
                    </div>
                    <div class="row" style="padding-top: 10px">
                        <div class="col">
                            <p>Deskripsi</p>
                            <textarea class="form-control rounded-0" id="exampleFormControlTextarea2" rows="3" name="deskripsi" value="">{{$dataEvents->deskripsi}}</textarea>
                        </div>
                    </div>
                    <div class="row" style="padding-top: 10px">
                        <div class="col">
                            <label for="demo_overview_minimal">Kategori</label>
                            <select id="demo_overview_minimal" class="form-control" data-role="select-dropdown" data-profile="minimal" name="id_kategori" value="" selected="">
                                @foreach ($dataKategori as $item)
                                <option value="{{ $item->id }}" {{$dataEvents->id_kategori == $item->id  ? 'selected' : ''}}>{{ $item->nama_kategori}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col">
                            <label for="demo_overview_minimal">PIC</label>
                            <select id="demo_overview_minimal" class="form-control" data-role="select-dropdown" data-profile="minimal" name="id_pic" value="" selected="">
                                @foreach ($dataPicEvent as $item)
                                <option value="{{ $item->id }}" {{$dataEvents->id_pic == $item->id  ? 'selected' : ''}}>{{ $item->nama_pic}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col">
                            <label for="demo_overview_minimal">Status</label>
                            <select id="demo_overview_minimal" class="form-control" data-role="select-dropdown" data-profile="minimal" name="id_status" value="" selected="">
                                @foreach ($dataStatusEvent as $item)
                                <option value="{{ $item->id }}" {{$dataEvents->id_status == $item->id  ? 'selected' : ''}}>{{ $item->nama_status}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row" style="padding-top: 10px">
                        <div class="col">
                            <p>Cost</p>
                            <input type="text" class="form-control" name="cost" value="{{$dataEvents->cost}}">
                        </div>
                        <div class="col">
                            <p>Revenue</p>
                            <input type="text" class="form-control" name="revenue" value="{{$dataEvents->revenue}}">
                        </div>
                    </div>
                    <br>
                    <button class="btn btn-success" onclick="window.location='{{url('/events')}}'" type="reset">Back</button>
                    <button class="btn btn-primary" type="submit">Update Data</button>
                  </form>
            </div>
        </div>
        @include('layouts.footers.auth')
    </div>
@endsection