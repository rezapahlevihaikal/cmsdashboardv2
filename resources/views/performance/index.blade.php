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
                  <h5 class="modal-title" id="exampleModalLabel">Add Data Rank</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form action="{{route('performance.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('post')
                      <div class="form-group">
                        <label for="formGroupExampleInput2">Divisi</label>
                        <select id="demo_overview_minimal" class="form-control" data-role="select-dropdown" data-profile="divisi" name="divisi" value="" selected="">
                          <option value="">Pilih Divisi</option>
                          <option value="WE">WE</option>
                          <option value="HS">HS</option>
                          <option value="POPULIS">POPULIS</option>
                          <option value="Q1 Ide">Q1 Ide</option>
                          <option value="Q1 Revitalisasi">Q1 Revitalisasi</option>
                      </select>
                      </div>
                      <div class="form-group">
                        <label for="formGroupExampleInput2">Core Bisnis</label>
                        <select id="demo_overview_minimal" class="form-control" data-role="select-dropdown" data-profile="core_bisnis" name="core_bisnis" value="" selected="">
                          <option value="">Pilih Core Bisnis</option>
                          <option value="Iklan WE">Iklan WE</option>
                          <option value="Award WE">Award WE</option>
                          <option value="Seminar Banking">Seminar Banking</option>
                          <option value="Programatic WE">Programatic WE</option>
                          <option value="Youtube WE">Youtube WE</option>
                          <option value="WEA">WEA</option>
                          <option value="Iklan HS">Iklan HS</option>
                          <option value="Award HS">Award HS</option>
                          <option value="Seminar HS">Seminar HS</option>
                          <option value="Programatic HS">Programatic HS</option>
                          <option value="Programatic Populis">Programatic Populis</option>
                          <option value="Q1 Revitalisasi">Q1 Revitalisasi</option>
                          <option value="Q1 Ide">Q1 Ide</option>
                      </select>
                      </div>
                      <div class="form-group">
                        <label for="formGroupExampleInput2">Target</label>
                        <input type="text" class="form-control" id="" placeholder="" name="target">
                      </div>
                      <div class="form-group">
                        <label for="formGroupExampleInput2">Pencapaian</label>
                        <input type="text" class="form-control" id="" placeholder="" name="pencapaian">
                      </div>
                      {{-- <div class="form-group">
                        <label for="formGroupExampleInput2">Value</label>
                        <input type="text" class="form-control" id="" placeholder="" name="value">
                      </div> --}}
                      <div class="form-group">
                        <label for="formGroupExampleInput2">Tanggal</label>
                        <input type="text" class="form-control" id="" placeholder="" name="tanggal">
                      </div>
                      <div class="form-group">
                        <label for="formGroupExampleInput2">Bulan</label>
                        <input type="text" class="form-control" id="" placeholder="" name="bulan">
                      </div>
                      <div class="form-group">
                        <label for="formGroupExampleInput2">Tahun</label>
                        <input type="text" class="form-control" id="" placeholder="" name="tahun">
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
                <div class="" style="padding:25px">
                    <table class="table table-bordered text-center" id="table-os">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">{{ __('Divisi')}}</th>
                                <th scope="col">{{ __('Core Bisnis') }}</th>
                                <th scope="col">{{ __('Target') }}</th>
                                <th scope="col">{{ __('Pencapaian') }}</th>
                                <th scope="col">{{ __('Value') }}</th>
                                <th scope="col">{{ __('Bulan') }}</th>
                                <th scope="col">{{ __('Tahun') }}</th>
                                <th scope="col">{{ __('Action') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($dataPerformance as $item)
                              <tr style="text-align: center">
                                <td><a href="{{route('performance.edit', $item->id)}}">{{$item->divisi}}</a></td>
                                <td>{{$item->core_bisnis}}</td>
                                <td>Rp {{number_format($item->target)}}</td>
                                <td>Rp {{number_format($item->pencapaian)}}</td>
                                <td>{{$item->value}}%</td>
                                <td>{{$item->bulan}}</td>
                                <td>{{$item->tahun}}</td>
                                <td>
                                  <form action="{{route('performance.destroy', $item->id)}}" method="POST">
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
                scrollX:true,
            });
        } );
    </script>
@endpush