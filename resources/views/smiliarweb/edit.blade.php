@extends('layouts.app')

@section('content')
@include('layouts.headers.header')
    <div class="container-fluid mt--7">
        <div class="card">
            <div class="card-body">
                <form class="" action="{{ route('website.update', $dataWebsite->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                    <div class="form-row">
                      <div class="col-md mb-3">
                        <label for="validationTooltip01">Tanggal</label>
                        <input type="date" class="form-control" id="validationTooltip01" name="tanggal" value="{{$dataWebsite->tanggal}}" required>
                        <div class="valid-tooltip">
                          Looks good!
                        </div>
                      </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-3 mb-3">
                            <label for="validationTooltip02">Warta Ekonomi</label>
                            <input type="text" class="form-control" id="validationTooltip02" name="we" value="{{$dataWebsite->we}}" required>
                        
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="validationTooltip02">HerStory</label>
                            <input type="text" class="form-control" id="validationTooltip02" name="hs" value="{{$dataWebsite->hs}}" required>
                            
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="validationTooltip02">Populis</label>
                            <input type="text" class="form-control" id="validationTooltip02" name="populis" value="{{$dataWebsite->populis}}" required>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="validationTooltip02">Konten Jatim</label>
                            <input type="text" class="form-control" id="validationTooltip02" name="konten_jatim" value="{{$dataWebsite->konten_jatim}}" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-3 mb-3">
                            <label for="validationTooltip02">Warta Ekonomi (Nilai)</label>
                            <input type="text" class="form-control" id="validationTooltip02" name="we_nilai" value="{{$dataWebsite->we_nilai}}" required>
                        
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="validationTooltip02">HerStory (Nilai)</label>
                            <input type="text" class="form-control" id="validationTooltip02" name="hs_nilai" value="{{$dataWebsite->hs_nilai}}" required>
                            
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="validationTooltip02">Populis (Nilai)</label>
                            <input type="text" class="form-control" id="validationTooltip02" name="populis_nilai" value="{{$dataWebsite->populis_nilai}}" required>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="validationTooltip02">Konten Jatim (Nilai)</label>
                            <input type="text" class="form-control" id="validationTooltip02" name="konten_jatim_nilai" value="{{$dataWebsite->konten_jatim_nilai}}" required>
                        </div>
                    </div>
                    <button class="btn btn-success" onclick="window.location='{{url('/website')}}'" type="reset">Back</button>
                    <button class="btn btn-primary" type="submit">Update Data</button>
                  </form>
            </div>
        </div>
        @include('layouts.footers.auth')
    </div>
@endsection