@extends('layouts.app')

@section('content')
@include('layouts.headers.header')
    <div class="container-fluid mt--7">
        <div class="card">
            <div class="card-body">
                <form class="" action="{{ route('predictive.update', $data->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                    <div class="row" style="padding-top: 10px">
                        <div class="col">
                            <div class="form-group">
                                <label class="" for="formGroupExampleInput2">Core Bisnis</label>
                                <select id="demo_overview_minimal" class="form-control" data-role="select-dropdown" data-profile="minimal" name="corebisnis" value="" selected="">
                                    @foreach ($coreBisnis as $item)
                                        <option value="{{ $item->id }}" {{$data->corebisnis == $item->id  ? 'selected' : ''}}>{{$item->nama_core_bisnis}}</option>
                                    @endforeach
                                </select>
                              </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label class="" for="formGroupExampleInput2">Value</label>
                                <div class="input-group mb-2">
                                  <div class="input-group-prepend">
                                    <div class="input-group-text">Rp</div>
                                  </div>
                                  <input type="text" class="form-control" id="va" placeholder="" name="value" value="{{$data->value}}">
                                </div>
                              </div>
                        </div>
                    </div>
                    <div class="row" style="padding-top: 10px">
                        <div class="col">
                            <label for="demo_overview_minimal">Bulan</label>
                            <select id="demo_overview_minimal" class="form-control" data-role="select-dropdown" data-profile="minimal" name="bulan" required>
                                <option value="">PILIH BULAN</option>
                                <option value="1" {{$data->bulan == "1"  ? 'selected' : ''}}>Januari</option>
                                <option value="2" {{$data->bulan == "2"  ? 'selected' : ''}}>Februari</option>
                                <option value="3" {{$data->bulan == "3"  ? 'selected' : ''}}>Maret</option>
                                <option value="4" {{$data->bulan == "4"  ? 'selected' : ''}}>April</option>
                                <option value="5" {{$data->bulan == "5"  ? 'selected' : ''}}>Mei</option>
                                <option value="6" {{$data->bulan == "6"  ? 'selected' : ''}}>Juni</option>
                                <option value="7" {{$data->bulan == "7"  ? 'selected' : ''}}>Juli</option>
                                <option value="8" {{$data->bulan == "8"  ? 'selected' : ''}}>Agustus</option>
                                <option value="9" {{$data->bulan == "9"  ? 'selected' : ''}}>September</option>
                                <option value="10" {{$data->bulan == "10"  ? 'selected' : ''}}>Oktober</option>
                                <option value="11" {{$data->bulan == "11"  ? 'selected' : ''}}>November</option>
                                <option value="12" {{$data->bulan == "12"  ? 'selected' : ''}}>Desember</option>
                              </select>
                        </div>
                        <div class="col">
                            <label for="demo_overview_minimal">Tahun</label>
                            <select id="demo_overview_minimal" class="form-control" data-role="select-dropdown" data-profile="minimal" name="tahun" required>
                                <option value="">PILIH TAHUN</option>
                                <option value="2021" {{$data->tahun == "2021"  ? 'selected' : ''}}>2021</option>
                                <option value="2022" {{$data->tahun == "2022"  ? 'selected' : ''}}>2022</option>
                                <option value="2023" {{$data->tahun == "2023"  ? 'selected' : ''}}>2023</option>
                                <option value="2024" {{$data->tahun == "2024"  ? 'selected' : ''}}>2024</option>
                                <option value="2025" {{$data->tahun == "2025"  ? 'selected' : ''}}>2025</option>
                                <option value="2026" {{$data->tahun == "2026"  ? 'selected' : ''}}>2026</option>
                                <option value="2027" {{$data->tahun == "2027"  ? 'selected' : ''}}>2027</option>
                                <option value="2028" {{$data->tahun == "2028"  ? 'selected' : ''}}>2028</option>
                                <option value="2029" {{$data->tahun == "2029"  ? 'selected' : ''}}>2029</option>
                                <option value="2030" {{$data->tahun == "2030"  ? 'selected' : ''}}>2030</option>
                            </select>
                        </div>
                    </div>
                    <br>
                    <button class="btn btn-success" onclick="window.location='{{url('/predictive')}}'" type="reset">Back</button>
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
            $('#va').mask('#.##0', {reverse: true});
        } );
    </script>
@endpush