@extends('layouts.app')

@section('content')
@include('layouts.headers.header')
    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 mb-5 mb-xl-0">

              <button type="button" data-toggle="modal" data-target="#exampleModal" class="btn btn-success"><i class="fas fa-plus"></i> Add Data</button>

              <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Add Data</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <form action="{{route('aePerformance.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                          <div class="form-group">
                            <label for="formGroupExampleInput">Nama Pegawai</label>
                            <select id="demo_overview_minimal" class="form-control" data-role="select-dropdown" data-profile="minimal" name="employee_id" required>
                                <option value="">PILIH NAMA PEGAWAI AE</option>
                                @foreach ($dataAeEmployee as $item)
                                    <option value="{{$item->id}}">{{$item->name}}</option>    
                                @endforeach
                            </select>
                          </div>
                          <div class="form-group">
                            <label class="" for="formGroupExampleInput2">Target</label>
                            <div class="input-group mb-2">
                              <div class="input-group-prepend">
                                <div class="input-group-text">Rp</div>
                              </div>
                              <input type="text" class="form-control" id="target" placeholder="" name="target">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="" for="formGroupExampleInput2">Pencapaian</label>
                            <div class="input-group mb-2">
                              <div class="input-group-prepend">
                                <div class="input-group-text">Rp</div>
                              </div>
                              <input type="text" class="form-control" id="pencapaian" placeholder="" name="pencapaian">
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="">Tanggal</label>
                            <select id="demo_overview_minimal" class="form-control" data-role="select-dropdown" data-profile="minimal" name="tanggal" required>
                              <option value="">PILIH TANGGAL</option>
                              <option value="1">1</option>
                              <option value="2">2</option>
                              <option value="3">3</option>
                              <option value="4">4</option>
                              <option value="5">5</option>
                              <option value="6">6</option>
                              <option value="7">7</option>
                              <option value="8">8</option>
                              <option value="9">9</option>
                              <option value="10">10</option>
                              <option value="11">11</option>
                              <option value="12">12</option>
                              <option value="13">13</option>
                              <option value="14">14</option>
                              <option value="15">15</option>
                              <option value="16">16</option>
                              <option value="17">17</option>
                              <option value="18">18</option>
                              <option value="19">19</option>
                              <option value="20">20</option>
                              <option value="21">21</option>
                              <option value="22">22</option>
                              <option value="23">23</option>
                              <option value="24">24</option>
                              <option value="25">25</option>
                              <option value="26">26</option>
                              <option value="27">27</option>
                              <option value="28">28</option>
                              <option value="29">29</option>
                              <option value="30">30</option>
                              <option value="31">31</option>
                            </select>
                          </div>
                          <div class="form-group">
                            <label for="formGroupExampleInput2">Bulan</label>
                            <select id="demo_overview_minimal" class="form-control" data-role="select-dropdown" data-profile="minimal" name="bulan" required>
                              <option value="">PILIH BULAN</option>
                              <option value="1">Januari</option>
                              <option value="2">Februari</option>
                              <option value="3">Maret</option>
                              <option value="4">April</option>
                              <option value="5">Mei</option>
                              <option value="6">Juni</option>
                              <option value="7">Juli</option>
                              <option value="8">Agustus</option>
                              <option value="9">September</option>
                              <option value="10">Oktober</option>
                              <option value="11">November</option>
                              <option value="12">Desember</option>
                            </select>
                          </div>
                          <div class="form-group">
                            <label for="formGroupExampleInput2">Tahun</label>
                            <select id="demo_overview_minimal" class="form-control" data-role="select-dropdown" data-profile="minimal" name="tahun" required>
                              <option value="">PILIH TAHUN</option>
                              <option value="2023">2023</option>
                              <option value="2024">2024</option>
                              <option value="2025">2025</option>
                              <option value="2026">2026</option>
                              <option value="2027">2027</option>
                              <option value="2028">2028</option>
                              <option value="2029">2029</option>
                              <option value="2030">2030</option>
                            </select>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="sybmit" class="btn btn-primary">Add Data</button>
                          </div>
                      </form>
                    </div>    
                  </div>
                </div>
              </div>

                <div class="card bg-secondary-default shadow">
                    <div class="" style="padding:25px;">
                      <table id="table-os" class="table table-bordered text-center">
                        <thead class="thead-light">
                          <tr>
                            <th scope="col">Nama</th>
                            <th scope="col">Target</th>
                            <th scope="col">Pencapaian</th>
                            <th scope="col">Bulan</th>
                            <th scope="col">Tahun</th>
                            <th scope="col">Actions</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($dataAePerformance as $item)
                            <tr style="text-align: center">
                              <td><a href="{{route('aePerformance.edit', $item->id)}}">{{$item->getEmployee->name ?? "nama tidak ditemukan"}}</a></td>
                              <td>Rp {{number_format($item->target)}}</td>
                              <td>Rp {{number_format($item->pencapaian)}}</td>
                              <td>{{$item->bulan}}</td>
                              <td>{{$item->tahun}}</td>
                              <td>
                                <form action="{{route('aePerformance.destroy', $item->id)}}" method="POST">
                                  @csrf
                                  @method('post')
                                  <button type="submit" class="btn btn-danger" onclick="return confirm('Yang bener?');"><i class="fas fa-trash"></i></button></td>
                                </form>
                            </tr>
                          @endforeach
                        </tbody>
                      </table>
                    </div>
                </div>
            </div>
        </div>
        @include('layouts.footers.auth')
    </div>
@endsection
@push('js')
    <script type="text/javascript">
      $(document).ready( function () {
            $('#table-os').DataTable({
                
            });
            $('#pencapaian').mask('#.##0', {reverse: true});
            $('#target').mask('#.##0', {reverse: true});
        } );
    </script>
@endpush