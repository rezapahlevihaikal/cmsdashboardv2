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
                            <label for="demo_overview_minimal">Tanggal</label>
                            <select id="demo_overview_minimal" class="form-control" data-role="select-dropdown" data-profile="minimal" name="tanggal" required>
                                <option value="">PILIH TANGGAL</option>
                                <option value="1" {{$dataAePerformance->tanggal == "1"  ? 'selected' : ''}}>1</option>
                                <option value="2" {{$dataAePerformance->tanggal == "2"  ? 'selected' : ''}}>2</option>
                                <option value="3" {{$dataAePerformance->tanggal == "3"  ? 'selected' : ''}}>3</option>
                                <option value="4" {{$dataAePerformance->tanggal == "4"  ? 'selected' : ''}}>4</option>
                                <option value="5" {{$dataAePerformance->tanggal == "5"  ? 'selected' : ''}}>5</option>
                                <option value="6" {{$dataAePerformance->tanggal == "6"  ? 'selected' : ''}}>6</option>
                                <option value="7" {{$dataAePerformance->tanggal == "7"  ? 'selected' : ''}}>7</option>
                                <option value="8" {{$dataAePerformance->tanggal == "8"  ? 'selected' : ''}}>8</option>
                                <option value="9" {{$dataAePerformance->tanggal == "9"  ? 'selected' : ''}}>9</option>
                                <option value="10" {{$dataAePerformance->tanggal == "10"  ? 'selected' : ''}}>10</option>
                                <option value="11" {{$dataAePerformance->tanggal == "11"  ? 'selected' : ''}}>11</option>
                                <option value="12" {{$dataAePerformance->tanggal == "12"  ? 'selected' : ''}}>12</option>
                                <option value="13" {{$dataAePerformance->tanggal == "13"  ? 'selected' : ''}}>13</option>
                                <option value="14" {{$dataAePerformance->tanggal == "14"  ? 'selected' : ''}}>14</option>
                                <option value="15" {{$dataAePerformance->tanggal == "15"  ? 'selected' : ''}}>15</option>
                                <option value="16" {{$dataAePerformance->tanggal == "16"  ? 'selected' : ''}}>16</option>
                                <option value="17" {{$dataAePerformance->tanggal == "17"  ? 'selected' : ''}}>17</option>
                                <option value="18" {{$dataAePerformance->tanggal == "18"  ? 'selected' : ''}}>18</option>
                                <option value="19" {{$dataAePerformance->tanggal == "19"  ? 'selected' : ''}}>19</option>
                                <option value="20" {{$dataAePerformance->tanggal == "20"  ? 'selected' : ''}}>20</option>
                                <option value="21" {{$dataAePerformance->tanggal == "21"  ? 'selected' : ''}}>21</option>
                                <option value="22" {{$dataAePerformance->tanggal == "22"  ? 'selected' : ''}}>22</option>
                                <option value="23" {{$dataAePerformance->tanggal == "23"  ? 'selected' : ''}}>23</option>
                                <option value="24" {{$dataAePerformance->tanggal == "24"  ? 'selected' : ''}}>24</option>
                                <option value="25" {{$dataAePerformance->tanggal == "25"  ? 'selected' : ''}}>25</option>
                                <option value="26" {{$dataAePerformance->tanggal == "26"  ? 'selected' : ''}}>26</option>
                                <option value="27" {{$dataAePerformance->tanggal == "27"  ? 'selected' : ''}}>27</option>
                                <option value="28" {{$dataAePerformance->tanggal == "28"  ? 'selected' : ''}}>28</option>
                                <option value="29" {{$dataAePerformance->tanggal == "29"  ? 'selected' : ''}}>29</option>
                                <option value="30" {{$dataAePerformance->tanggal == "30"  ? 'selected' : ''}}>30</option>
                                <option value="31" {{$dataAePerformance->tanggal == "31"  ? 'selected' : ''}}>31</option>
                              </select>
                        </div>
                        <div class="col">
                            <label for="demo_overview_minimal">Bulan</label>
                            <select id="demo_overview_minimal" class="form-control" data-role="select-dropdown" data-profile="minimal" name="bulan" required>
                                <option value="">PILIH BULAN</option>
                                <option value="1" {{$dataAePerformance->bulan == "1"  ? 'selected' : ''}}>Januari</option>
                                <option value="2" {{$dataAePerformance->bulan == "2"  ? 'selected' : ''}}>Februari</option>
                                <option value="3" {{$dataAePerformance->bulan == "3"  ? 'selected' : ''}}>Maret</option>
                                <option value="4" {{$dataAePerformance->bulan == "4"  ? 'selected' : ''}}>April</option>
                                <option value="5" {{$dataAePerformance->bulan == "5"  ? 'selected' : ''}}>Mei</option>
                                <option value="6" {{$dataAePerformance->bulan == "6"  ? 'selected' : ''}}>Juni</option>
                                <option value="7" {{$dataAePerformance->bulan == "7"  ? 'selected' : ''}}>Juli</option>
                                <option value="8" {{$dataAePerformance->bulan == "8"  ? 'selected' : ''}}>Agustus</option>
                                <option value="9" {{$dataAePerformance->bulan == "9"  ? 'selected' : ''}}>September</option>
                                <option value="10" {{$dataAePerformance->bulan == "10"  ? 'selected' : ''}}>Oktober</option>
                                <option value="11" {{$dataAePerformance->bulan == "11"  ? 'selected' : ''}}>November</option>
                                <option value="12" {{$dataAePerformance->bulan == "12"  ? 'selected' : ''}}>Desember</option>
                              </select>
                        </div>
                        <div class="col">
                            <label for="demo_overview_minimal">Tahun</label>
                            <select id="demo_overview_minimal" class="form-control" data-role="select-dropdown" data-profile="minimal" name="tahun" required>
                                <option value="">PILIH TAHUN</option>
                                <option value="2022" {{$dataAePerformance->tahun == "2022"  ? 'selected' : ''}}>2022</option>
                                <option value="2023" {{$dataAePerformance->tahun == "2023"  ? 'selected' : ''}}>2023</option>
                                <option value="2024" {{$dataAePerformance->tahun == "2024"  ? 'selected' : ''}}>2024</option>
                                <option value="2025" {{$dataAePerformance->tahun == "2025"  ? 'selected' : ''}}>2025</option>
                                <option value="2026" {{$dataAePerformance->tahun == "2026"  ? 'selected' : ''}}>2026</option>
                                <option value="2027" {{$dataAePerformance->tahun == "2027"  ? 'selected' : ''}}>2027</option>
                                <option value="2028" {{$dataAePerformance->tahun == "2028"  ? 'selected' : ''}}>2028</option>
                                <option value="2029" {{$dataAePerformance->tahun == "2029"  ? 'selected' : ''}}>2029</option>
                                <option value="2030" {{$dataAePerformance->tahun == "2030"  ? 'selected' : ''}}>2030</option>
                            </select>
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