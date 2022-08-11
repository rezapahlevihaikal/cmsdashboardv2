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
                  <form action="{{route('performanceJprof.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('post')
                      <div class="form-group">
                        <label for="formGroupExampleInput2">Produk</label>
                        <input type="text" class="form-control" id="" placeholder="" name="produk">
                      </div>
                      <div class="form-group">
                        <label for="formGroupExampleInput2">Instansi</label>
                        <input type="text" class="form-control" id="" placeholder="" name="instansi">
                      </div>
                      <div class="form-group">
                        <label for="formGroupExampleInput2">Pencapaian</label>
                        <input type="text" class="form-control" id="" placeholder="" name="pencapaian">
                      </div>
                      <div class="form-group">
                        <label for="formGroupExampleInput2">Core Bisnis</label>
                        <select id="demo_overview_minimal" class="form-control" data-role="select-dropdown" data-profile="divisi" name="id_core_bisnis" value="" selected="">
                          <option value="">PILIH CORE BISNIS</option>
                          @foreach ($dataCoreBisnis as $item)
                              <option value="{{$item->id}}">{{$item->nama_core_jprof}}</option>    
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
                                <th scope="col">{{ __('Produk')}}</th>
                                <th scope="col">{{ __('Instansi') }}</th>
                                <th scope="col">{{ __('Pencapaian') }}</th>
                                <th scope="col">{{ __('Core Bisnis') }}</th>
                                <th scope="col">{{ __('Bulan/Tahun') }}</th>
                                <th scope="col">{{ __('Action') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($dataPerformance as $item)
                              <tr style="">
                                <td><a href="{{route('performanceJprof.edit', $item->id)}}">{!! Str::limit($item->produk, 60) !!}</a></td>
                                <td>{{$item->instansi}}</td>
                                <td>Rp {{number_format($item->pencapaian)}}</td>
                                <td>{{$item->getCoreBisnis->nama_core_jprof ?? null}}</td>
                                <td>{{$item->bulan}} <br> {{$item->tahun}} </td>
                                <td>
                                  <form action="{{route('performanceJprof.destroy', $item->id)}}" method="POST">
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
               scrollX:true,
            });
        } );
    </script>
@endpush