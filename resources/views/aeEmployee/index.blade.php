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
                      <form action="{{route('aeEmployee.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                          <div class="form-group">
                            <label for="formGroupExampleInput">Nama Pegawai</label>
                            <input type="text" class="form-control" id="formGroupExampleInput" placeholder="" name="name">
                          </div>
                          <div class="form-group">
                            <label for="formGroupExampleInput2">Divisi</label>
                                <select id="demo_overview_minimal" class="form-control" data-role="select-dropdown" data-profile="minimal" name="divisi_id" required>
                                    @foreach ($dataDivisi as $item)
                                    <option value="{{$item->id}}">{{$item->nama_divisi}}</option>    
                                    @endforeach
                                </select>
                          </div>
                          <div class="form-group">
                            <label for="formGroupExampleInput2">Core Bisnis</label>
                                <select id="demo_overview_minimal" class="form-control" data-role="select-dropdown" data-profile="minimal" name="core_bisnis_id" required>
                                    @foreach ($dataCoreBisnis as $item)
                                        <option value="{{$item->id}}">{{$item->nama_core_bisnis}} ({{$item->divisi}})</option>    
                                    @endforeach
                                </select>
                          </div>
                          <div class="form-group">
                            <label for="formGroupExampleInput2">Hire Date</label>
                            <input type="date" class="form-control" id="" placeholder="" name="hiredate">
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
                            <th scope="col">Divisi</th>
                            <th scope="col">Core Bisnis</th>
                            <th scope="col">Hire Date</th>
                            <th scope="col">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($dataAeEmployee as $item)
                            <tr style="text-align: center">
                              <td><a href="{{ route('aeEmployee.edit', $item->id) }}">{{$item->name}}</a></td>
                              <td>{{$item->getDivisi->nama_divisi ?? null}}</td>
                              <td>{{$item->getCoreBisnis->nama_core_bisnis ?? null}}</td>
                              <td>{{$item->hiredate}}</td>
                              <td>
                                <form action="{{route('aeEmployee.destroy', $item->id)}}" method="POST">
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