@extends('layouts.app')

@section('content')
@include('layouts.headers.header')
    <div class="container-fluid mt--7">
        <div class="card">
            <div class="card-body">
                <form class="" action="{{ route('tiktok.update', $dataTiktok->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                    <div class="form-row">
                        <div class="col-md-3 mb-3">
                            <label for="validationTooltip02">Warta Ekonomi</label>
                            <input type="text" class="form-control" id="validationTooltip02" name="tiktok_we_rank" value="{{$dataTiktok->tiktok_we_rank}}" required>
                        
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="validationTooltip02">HerStory</label>
                            <input type="text" class="form-control" id="validationTooltip02" name="tiktok_hs_rank" value="{{$dataTiktok->tiktok_hs_rank}}" required>
                            
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="validationTooltip02">Populis</label>
                            <input type="text" class="form-control" id="validationTooltip02" name="tiktok_populis_rank" value="{{$dataTiktok->tiktok_populis_rank}}" required>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="validationTooltip02">Konten Jatim</label>
                            <input type="text" class="form-control" id="validationTooltip02" name="tiktok_konten_jatim_rank" value="{{$dataTiktok->tiktok_konten_jatim_rank}}" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-3 mb-3">
                            <label for="validationTooltip02">Warta Ekonomi (Nilai)</label>
                            <input type="text" class="form-control" id="validationTooltip02" name="tiktok_we_nilai" value="{{$dataTiktok->tiktok_we_nilai}}" required>
                        
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="validationTooltip02">HerStory (Nilai)</label>
                            <input type="text" class="form-control" id="validationTooltip02" name="tiktok_hs_nilai" value="{{$dataTiktok->tiktok_hs_nilai}}" required>
                            
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="validationTooltip02">Populis (Nilai)</label>
                            <input type="text" class="form-control" id="validationTooltip02" name="tiktok_populis_nilai" value="{{$dataTiktok->tiktok_populis_nilai}}" required>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="validationTooltip02">Konten Jatim (Nilai)</label>
                            <input type="text" class="form-control" id="validationTooltip02" name="tiktok_konten_jatim_nilai" value="{{$dataTiktok->tiktok_konten_jatim_nilai}}" required>
                        </div>
                    </div>
                    <button class="btn btn-success" onclick="window.location='{{url('/tiktok')}}'" type="reset">Back</button>
                    <button class="btn btn-primary" type="submit">Update Data</button>
                  </form>
            </div>
        </div>
        @include('layouts.footers.auth')
    </div>
@endsection