@extends('layouts.app')

@section('content')
@include('layouts.headers.header')
    <div class="container-fluid mt--7">
        <div class="card">
            <div class="card-body">
                <form class="" action="{{ route('kurs.update', $dataKurs->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                    <div class="form-row">
                        <div class="col-md-3 mb-3">
                            <label for="validationTooltip02">Tanggal</label>
                            <input type="date" class="form-control" id="validationTooltip02" name="tanggal" value="{{$dataKurs->tanggal}}">
                        
                        </div>
                        <div class="col">
                            <label for="kurs">Kurs</label>
                            <input type="text" class="form-control" id="kurs" placeholder="" name="kurs" value="{{$dataKurs->kurs}}">
                        </div>
                    </div>
                    <button class="btn btn-success" onclick="window.location='{{url('/kurs')}}'" type="reset">Back</button>
                    <button class="btn btn-primary" type="submit">Update Data</button>
                  </form>
            </div>
        </div>
        @include('layouts.footers.auth')
    </div>
@endsection
{{-- @push('js')
    <script type="text/javascript">
      $(document).ready( function () {
            $('#kurs').mask('#.##0', {reverse: true});
        } );
    </script>
@endpush --}}