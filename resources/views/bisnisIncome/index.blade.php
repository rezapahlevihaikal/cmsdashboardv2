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
                  <h5 class="modal-title" id="exampleModalLabel">Add Data Bisnis Income</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form action="{{route('bisnisIncome.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                      <div class="form-group">
                        <label for="formGroupExampleInput2">Core Bisnis</label>
                        <select id="demo_overview_minimal" class="form-control" data-role="select-dropdown" data-profile="minimal" name="core_bisnis_id" required>
                          <option value="">PILIH CORE BISNIS</option>
                          @foreach ($dataCoreBisnis as $item)
                              <option value="{{$item->id}}">{{$item->nama_core_bisnis}} | {{$item->divisi}} </option>    
                          @endforeach
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="formGroupExampleInput2">Sub Domain</label>
                        <input type="text" class="form-control" id="" placeholder="" name="sub_domain">
                      </div>
                      <div class="form-group">
                        <label class="" for="formGroupExampleInput2">Pendapatan</label>
                        <div class="input-group mb-2">
                          <div class="input-group-prepend">
                            <div class="input-group-text">Rp</div>
                          </div>
                          <input type="text" class="form-control" id="pendapatan" placeholder="" name="pendapatan">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="formGroupExampleInput2">Bulan</label>
                        <input type="text" class="form-control" id="" placeholder="" name="bulan">
                      </div>
                      <div class="form-group">
                        <label for="formGroupExampleInput2">Tahun</label>
                        <input type="text" class="form-control" id="" placeholder="" name="tahun">
                      </div>
                      <div class="form-group">
                        <label for="formGroupExampleInput2">Deskripsi</label>
                        <textarea name="description" class="form-control" id="" cols="20" rows="10"></textarea>
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
                                <th>Core Bisnis</th>
                                <th>Pendapatan</th>
                                <th>Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $row)
                              <tr style="text-align: center">
                                <td><a href="{{route('bisnisIncome.edit', $row->id)}}" title="{{$row->getCoreBisnis->nama_core_bisnis ?? 'kosong'}} | {{$row->getCoreBisnis->divisi ?? 'kosong'}}">{{$row->getCoreBisnis->nama_core_bisnis ?? 'kosong'}} | {{$row->getCoreBisnis->divisi ?? 'kosong'}}</a></td>
                                <td>Rp {{number_format($row->pendapatan)}}</td>
                                <td>{{$row->bulan}} - {{$row->tahun}} </td>
                                <td>
                                  <form action="{{route('bisnisIncome.destroy', $row->id)}}" method="POST">
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
                // scrollX:true,
            });
            $('#pendapatan').mask('#.##0', {reverse: true});
        } );
    </script>
@endpush