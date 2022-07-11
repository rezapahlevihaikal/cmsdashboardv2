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
                            <label for="formGroupExampleInput2">Target</label>
                            <input type="text" class="form-control" name="target">
                          </div>
                          <div class="form-group">
                            <label for="formGroupExampleInput2">Percapaian</label>
                            <input type="text" class="form-control" name="pencapaian">
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
                    <div class="" style="padding:25px;">
                      <table id="table-os" class="table table-bordered text-center">
                        <thead class="thead-light">
                          <tr>
                            <th scope="col">Nama</th>
                            <th scope="col">Target</th>
                            <th scope="col">Pencapaian</th>
                            <th scope="col">Bulan</th>
                            <th scope="col">Tahun</th>
                            <th scope="col">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($dataAePerformance as $item)
                            <tr style="text-align: center">
                              <td><a href="{{route('aePerformance.edit', $item->id)}}">{{$item->getEmployee->name}}</a></td>
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
        } );
    </script>
@endpush