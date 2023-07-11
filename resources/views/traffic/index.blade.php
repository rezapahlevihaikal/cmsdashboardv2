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
                      <form action="{{route('traffic.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="formGroupExampleInput">Tanggal</label>
                            <input type="date" class="form-control" name="tanggal">
                          </div>
                          <div class="form-group">
                            <label for="formGroupExampleInput">Nama Website</label>
                            <select id="demo_overview_minimal" class="form-control" data-role="select-dropdown" data-profile="minimal" name="website_id" required>
                                <option value="">PILIH NAMA WEBSITE</option>
                                @foreach ($website as $item)
                                    <option value="{{$item->id}}">{{$item->website_name}}</option>    
                                @endforeach
                            </select>
                          </div>
                          <div class="form-group">
                            <label class="" for="formGroupExampleInput2">Pageview</label>
                            <input type="text" name="pageview" id="target" class="form-control">
                          </div>
                          <div class="form-group">
                            <label class="" for="formGroupExampleInput2">User</label>
                            <input type="text" name="user" id="pencapaian" class="form-control">
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
                            <th scope="col">Tanggal</th>
                            <th scope="col">Website</th>
                            <th scope="col">Pageview</th>
                            <th scope="col">User</th>
                            <th scope="col">Actions</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($data as $item)
                            <tr style="text-align: center">
                              <td>
                                <a href="{{route('traffic.edit', $item->id)}}">{{  date('d-m-Y', strtotime($item->tanggal)) }}</a>
                              </td>
                              <td>{{$item->getWebsite->website_name ?? "nama tidak ditemukan"}}</td>
                              <td>{{number_format($item->pageview)}}</td>
                              <td>{{number_format($item->user)}}</td>
                              <td>
                                <form action="{{route('traffic.destroy', $item->id)}}" method="POST">
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
              ordering: false
            });
            $('#pencapaian').mask('#.##0', {reverse: true});
            $('#target').mask('#.##0', {reverse: true});
        } );
    </script>
@endpush