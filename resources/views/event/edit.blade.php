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
                        <div class="col-12">
                            <p>Tanggal</p>
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
                            <select id="demo_overview_minimal" class="form-control" data-role="select-dropdown" data-profile="minimal" name="kategori" value="{{$dataEvents->kategori}}" selected="{{$dataEvents->kategori}}">
                                <option value="Award">Award</option>
                                <option value="Seminar">Seminar</option>
                                <option value="Client Services">Client Service</option>
                                <option value="Talkshow">Talkshow</option>
                            </select>
                        </div>
                        <div class="col">
                            <label for="demo_overview_minimal">PIC</label>
                            <select id="demo_overview_minimal" class="form-control" data-role="select-dropdown" data-profile="minimal" name="pic" value="{{$dataEvents->pic}}">
                                <option value="WE">WE</option>
                                <option value="HS">HS</option>
                                <option value="Pop">POPULIS</option>
                            </select>
                        </div>
                        <div class="col">
                            <label for="demo_overview_minimal">Status</label>
                            <select id="demo_overview_minimal" class="form-control" data-role="select-dropdown" data-profile="minimal" name="status" value="{{$dataEvents->status}}">
                                <option value="Start">Start</option>
                                <option value="Progress">Progress</option>
                                <option value="Finish">Finish</option>
                            </select>
                        </div>
                    </div><br>
                    <button class="btn btn-success" onclick="window.location='{{url('/events')}}'" type="reset">Back</button>
                    <button class="btn btn-primary" type="submit">Update Data</button>
                  </form>
            </div>
        </div>
        @include('layouts.footers.auth')
    </div>
@endsection