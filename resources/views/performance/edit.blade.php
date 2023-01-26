@extends('layouts.app')

@section('content')
@include('layouts.headers.header')
    <div class="container-fluid mt--7">
        <div class="card">
            <div class="card-body">
                <form class="" action="{{ route('performance.update', $dataPerformance->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                    <div class="form-group">
                        <label for="formGroupExampleInput2">Divisi</label>
                        <select id="demo_overview_minimal" class="form-control" data-role="select-dropdown" data-profile="divisi" name="id_divisi" value="" selected="{{$dataPerformance->divisi}}">
                          @foreach ($dataDivisi as $item)
                            <option value="{{ $item->id }}" {{$dataPerformance->id_divisi == $item->id  ? 'selected' : ''}}>{{ $item->nama_divisi}}</option>
                          @endforeach
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="formGroupExampleInput2">Core Bisnis</label>
                        <select id="demo_overview_minimal" class="form-control" data-role="select-dropdown" data-profile="core_bisnis" name="id_core_bisnis" value="" selected="">
                          @foreach ($dataCoreBisnis as $item)
                            <option value="{{ $item->id }}" {{$dataPerformance->id_core_bisnis == $item->id  ? 'selected' : ''}}>{{ $item->nama_core_bisnis}}</option>
                          @endforeach
                      </select>
                      </div>
                      
                        <div class="form-group">
                            <label class="" for="formGroupExampleInput2">Target</label>
                            <div class="input-group mb-2">
                              <div class="input-group-prepend">
                                <div class="input-group-text">Rp</div>
                              </div>
                              <input type="text" class="form-control" id="target" placeholder="" name="target" value="{{$dataPerformance->target}}">
                            </div>
                          </div>
                   
                   
                        <div class="form-group">
                            <label class="" for="formGroupExampleInput2">Pencapaian</label>
                            <div class="input-group mb-2">
                              <div class="input-group-prepend">
                                <div class="input-group-text">Rp</div>
                              </div>
                              <input type="text" class="form-control" id="pencapaian" placeholder="" name="pencapaian" value="{{$dataPerformance->pencapaian}}">
                            </div>
                          </div>
                    
                      {{-- <div class="form-group">
                        <label for="formGroupExampleInput2">Value</label>
                        <input type="text" class="form-control" id="" placeholder="" name="value">
                      </div> --}}
                      <div class="form-group">
                        <label for="formGroupExampleInput2">Tanggal</label>
                        <select id="demo_overview_minimal" class="form-control" data-role="select-dropdown" data-profile="minimal" name="tanggal" required>
                          <option value="">PILIH TANGGAL</option>
                          <option value="1" {{$dataPerformance->tanggal == "1"  ? 'selected' : ''}}>1</option>
                          <option value="2" {{$dataPerformance->tanggal == "2"  ? 'selected' : ''}}>2</option>
                          <option value="3" {{$dataPerformance->tanggal == "3"  ? 'selected' : ''}}>3</option>
                          <option value="4" {{$dataPerformance->tanggal == "4"  ? 'selected' : ''}}>4</option>
                          <option value="5" {{$dataPerformance->tanggal == "5"  ? 'selected' : ''}}>5</option>
                          <option value="6" {{$dataPerformance->tanggal == "6"  ? 'selected' : ''}}>6</option>
                          <option value="7" {{$dataPerformance->tanggal == "7"  ? 'selected' : ''}}>7</option>
                          <option value="8" {{$dataPerformance->tanggal == "8"  ? 'selected' : ''}}>8</option>
                          <option value="9" {{$dataPerformance->tanggal == "9"  ? 'selected' : ''}}>9</option>
                          <option value="10" {{$dataPerformance->tanggal == "10"  ? 'selected' : ''}}>10</option>
                          <option value="11" {{$dataPerformance->tanggal == "11"  ? 'selected' : ''}}>11</option>
                          <option value="12" {{$dataPerformance->tanggal == "12"  ? 'selected' : ''}}>12</option>
                          <option value="13" {{$dataPerformance->tanggal == "13"  ? 'selected' : ''}}>13</option>
                          <option value="14" {{$dataPerformance->tanggal == "14"  ? 'selected' : ''}}>14</option>
                          <option value="15" {{$dataPerformance->tanggal == "15"  ? 'selected' : ''}}>15</option>
                          <option value="16" {{$dataPerformance->tanggal == "16"  ? 'selected' : ''}}>16</option>
                          <option value="17" {{$dataPerformance->tanggal == "17"  ? 'selected' : ''}}>17</option>
                          <option value="18" {{$dataPerformance->tanggal == "18"  ? 'selected' : ''}}>18</option>
                          <option value="19" {{$dataPerformance->tanggal == "19"  ? 'selected' : ''}}>19</option>
                          <option value="20" {{$dataPerformance->tanggal == "20"  ? 'selected' : ''}}>20</option>
                          <option value="21" {{$dataPerformance->tanggal == "21"  ? 'selected' : ''}}>21</option>
                          <option value="22" {{$dataPerformance->tanggal == "22"  ? 'selected' : ''}}>22</option>
                          <option value="23" {{$dataPerformance->tanggal == "23"  ? 'selected' : ''}}>23</option>
                          <option value="24" {{$dataPerformance->tanggal == "24"  ? 'selected' : ''}}>24</option>
                          <option value="25" {{$dataPerformance->tanggal == "25"  ? 'selected' : ''}}>25</option>
                          <option value="26" {{$dataPerformance->tanggal == "26"  ? 'selected' : ''}}>26</option>
                          <option value="27" {{$dataPerformance->tanggal == "27"  ? 'selected' : ''}}>27</option>
                          <option value="28" {{$dataPerformance->tanggal == "28"  ? 'selected' : ''}}>28</option>
                          <option value="29" {{$dataPerformance->tanggal == "29"  ? 'selected' : ''}}>29</option>
                          <option value="30" {{$dataPerformance->tanggal == "30"  ? 'selected' : ''}}>30</option>
                          <option value="31" {{$dataPerformance->tanggal == "31"  ? 'selected' : ''}}>31</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="formGroupExampleInput2">Bulan</label>
                        <select id="demo_overview_minimal" class="form-control" data-role="select-dropdown" data-profile="minimal" name="bulan" required>
                          <option value="">PILIH BULAN</option>
                          <option value="1" {{$dataPerformance->bulan == "1"  ? 'selected' : ''}}>Januari</option>
                          <option value="2" {{$dataPerformance->bulan == "2"  ? 'selected' : ''}}>Februari</option>
                          <option value="3" {{$dataPerformance->bulan == "3"  ? 'selected' : ''}}>Maret</option>
                          <option value="4" {{$dataPerformance->bulan == "4"  ? 'selected' : ''}}>April</option>
                          <option value="5" {{$dataPerformance->bulan == "5"  ? 'selected' : ''}}>Mei</option>
                          <option value="6" {{$dataPerformance->bulan == "6"  ? 'selected' : ''}}>Juni</option>
                          <option value="7" {{$dataPerformance->bulan == "7"  ? 'selected' : ''}}>Juli</option>
                          <option value="8" {{$dataPerformance->bulan == "8"  ? 'selected' : ''}}>Agustus</option>
                          <option value="9" {{$dataPerformance->bulan == "9"  ? 'selected' : ''}}>September</option>
                          <option value="10" {{$dataPerformance->bulan == "10"  ? 'selected' : ''}}>Oktober</option>
                          <option value="11" {{$dataPerformance->bulan == "11"  ? 'selected' : ''}}>November</option>
                          <option value="12" {{$dataPerformance->bulan == "12"  ? 'selected' : ''}}>Desember</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="formGroupExampleInput2">Tahun</label>
                        <select id="demo_overview_minimal" class="form-control" data-role="select-dropdown" data-profile="minimal" name="tahun" required>
                          <option value="">PILIH TAHUN</option>
                          <option value="2022" {{$dataPerformance->tahun == "2022"  ? 'selected' : ''}}>2022</option>
                          <option value="2023" {{$dataPerformance->tahun == "2023"  ? 'selected' : ''}}>2023</option>
                          <option value="2024" {{$dataPerformance->tahun == "2024"  ? 'selected' : ''}}>2024</option>
                          <option value="2025" {{$dataPerformance->tahun == "2025"  ? 'selected' : ''}}>2025</option>
                          <option value="2026" {{$dataPerformance->tahun == "2026"  ? 'selected' : ''}}>2026</option>
                          <option value="2027" {{$dataPerformance->tahun == "2027"  ? 'selected' : ''}}>2027</option>
                          <option value="2028" {{$dataPerformance->tahun == "2028"  ? 'selected' : ''}}>2028</option>
                          <option value="2029" {{$dataPerformance->tahun == "2029"  ? 'selected' : ''}}>2029</option>
                          <option value="2030" {{$dataPerformance->tahun == "2030"  ? 'selected' : ''}}>2030</option>
                      </select>
                      </div>
                      <br>
                    <button class="btn btn-success" onclick="window.location='{{url('/performance')}}'" type="reset">Back</button>
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