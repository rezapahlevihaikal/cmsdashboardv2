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
                      <form action="{{route('measurement.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                          <div class="form-group">
                            <label for="formGroupExampleInput">Masa Kerja</label>
                            <select id="demo_overview_minimal" class="form-control" data-role="select-dropdown" data-profile="minimal" name="masa_kerja" required>
                                <option value="">PILIH WAKTU MASA KERJA (BULAN)</option>
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
                            </select>
                          </div>
                          <div class="form-group">
                            <label for="formGroupExampleInput2">Salary</label>
                            <input type="text" class="form-control" name="salary">
                          </div>
                          <div class="form-group">
                            <label for="formGroupExampleInput2">Target</label>
                            <input type="text" class="form-control" name="target">
                          </div>
                          <div class="form-group">
                            <label for="formGroupExampleInput2">Core Bisnis</label>
                            <select id="demo_overview_minimal" class="form-control" data-role="select-dropdown" data-profile="minimal" name="id_core_bisnis" required>
                                <option value="">PILIH CORE BISNIS</option>
                                @foreach ($dataCoreBisnis as $item)
                                    <option value="{{$item->id}}">{{$item->nama_core_bisnis}} ({{$item->divisi}})</option>    
                                @endforeach
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
                            <th scope="col">Masa Kerja</th>
                            <th scope="col">Salary</th>
                            <th scope="col">Target</th>
                            <th scope="col">Core Bisnis</th>
                            <th scope="col">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($dataMeasurement as $item)
                            <tr style="text-align: center">
                              <td><a href="{{route('measurement.edit', $item->id)}}">{{$item->masa_kerja}}</a></td>
                              <td>Rp {{number_format($item->salary)}}</td>
                              <td>Rp {{number_format($item->target)}}</td>
                              <td>{{$item->getCoreBisnis->nama_core_bisnis ?? null}}</td>
                              <td>
                                <form action="{{route('measurement.destroy', $item->id)}}" method="POST">
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