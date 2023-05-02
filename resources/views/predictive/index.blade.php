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
                  <form action="{{route('predictive.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('post')
                      <div class="form-group">
                        <label for="formGroupExampleInput2">Tahun </label>
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
                      <div class="form-group">
                        <label for="formGroupExampleInput2">Instansi</label>
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
                        <label for="formGroupExampleInput2">Tema</label>
                        <input type="text" class="form-control" id="" placeholder="" name="tema">
                      </div>
                      <div class="form-group">
                        <label for="formGroupExampleInput2">Value</label>
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                              <div class="input-group-text">Rp</div>
                            </div>
                            <input type="text" class="form-control" placeholder=" 123.456.789" id="va" name="value">
                          </div>
                      </div>
                      <div class="form-group">
                        <label for="formGroupExampleInput2">Core Bisnis</label>
                        <select id="demo_overview_minimal" class="form-control" data-role="select-dropdown" data-profile="divisi" name="corebisnis" value="" selected="">
                          <option value="">PILIH CORE BISNIS</option>
                          @foreach ($coreBisnis as $item)
                              <option value="{{$item->id}}">{{$item->nama_core_bisnis}} - {{$item->divisi}}</option>    
                          @endforeach
                        </select>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Add Data</button>
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
                                <th scope="col">{{ __('Tema')}}</th>
                                <th scope="col">{{ __('Tanggal')}}</th>
                                <th scope="col">{{ __('Core Bisnis')}}</th>
                                <th scope="col">{{ __('Value')}}</th>
                                <th scope="col">{{ __('Action') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $item)
                              <tr style="">
                                <td><a href="{{route('predictive.edit', $item->id)}}">{!! Str::limit($item->tema, 60) !!}</a></td>
                                <td>{{$item->bulan}} - {{$item->tahun}}</td>
                                <td>{{$item->getCoreBisnis->nama_core_bisnis ?? null}}</td>
                                <td> @currency($item->value) </td>
                                <td>
                                  <form action="{{route('predictive.destroy', $item->id)}}" method="POST">
                                    @csrf
                                    @method('post')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Yang bener?');"><i class="fas fa-trash"></i></button></td>
                                  </form>
                                </td>
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
            //    scrollX:true,
            ordering: false
            });
            $('#va').mask('#.##0', {reverse: true});
        } );
    </script>
@endpush