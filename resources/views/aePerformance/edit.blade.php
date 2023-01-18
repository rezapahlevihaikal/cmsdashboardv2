@extends('layouts.app')

@section('content')
@include('layouts.headers.header')
    <div class="container-fluid mt--7">
        <div class="card">
            <div class="card-body">
                <form class="" action="{{ route('aePerformance.update', $dataAePerformance->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                    <div class="row">
                        <div class="col-12">
                            <label for="demo_overview_minimal">Nama Pegawai</label>
                            <select id="demo_overview_minimal" class="form-control" data-role="select-dropdown" data-profile="minimal" name="employee_id" value="{{$dataAePerformance->employee_id}}" selected="">
                                @foreach ($dataAeEmployee as $item)
                                    <option value="{{ $item->id }}" {{$dataAePerformance->employee_id == $item->id  ? 'selected' : ''}}>{{ $item->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row" style="padding-top: 10px">
                        <div class="col">
                            <div class="form-group">
                                <label class="" for="formGroupExampleInput2">Target</label>
                                <div class="input-group mb-2">
                                  <div class="input-group-prepend">
                                    <div class="input-group-text">Rp</div>
                                  </div>
                                  <input type="text" class="form-control" id="target" placeholder="" name="target" value="{{$dataAePerformance->target}}">
                                </div>
                              </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label class="" for="formGroupExampleInput2">Pencapaian</label>
                                <div class="input-group mb-2">
                                  <div class="input-group-prepend">
                                    <div class="input-group-text">Rp</div>
                                  </div>
                                  <input type="text" class="form-control" id="pencapaian" placeholder="" name="pencapaian" value="{{$dataAePerformance->pencapaian}}">
                                </div>
                              </div>
                        </div>
                    </div>
                    <div class="row" style="padding-top: 10px">
                        <div class="col">
                            <label for="demo_overview_minimal">Bulan</label>
                            <input type="text" class="form-control" name="bulan" value="{{$dataAePerformance->bulan}}">
                        </div>
                        <div class="col">
                            <label for="demo_overview_minimal">Tahun</label>
                            <input type="text" class="form-control" name="tahun" value="{{$dataAePerformance->tahun}}">
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