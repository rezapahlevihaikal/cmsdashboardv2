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
                  <h5 class="modal-title" id="exampleModalLabel">Add Data Followers</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form action="{{route('followers.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                      <div class="form-group">
                        <label for="formGroupExampleInput2">Social Media</label>
                        <select id="demo_overview_minimal" class="form-control" data-role="select-dropdown" data-profile="minimal" name="socmed_id" required>
                          <option value="">PILIH SOCIAL MEDIA</option>
                          @foreach ($dataSocmed as $item)
                              <option value="{{$item->id}}">{{$item->name}}</option>    
                          @endforeach
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="formGroupExampleInput2">Sub Social Media</label>
                        <select id="demo_overview_minimal" class="form-control" data-role="select-dropdown" data-profile="minimal" name="sub_socmed_id" required>
                          <option value="">PILIH SUB</option>
                          @foreach ($dataSubSocmed as $item)
                            <option value="{{$item->id}}">{{$item->name}} - ({{$item->getSocMed->name ?? 'tidak ada'}})</option>    
                          @endforeach
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="formGroupExampleInput2">Value</label>
                        <input type="text" class="form-control" id="" placeholder="" name="value">
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
                                <th>Social Media</th>
                                <th>Sub Social Media</th>
                                <th>Value</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($dataFollowers as $row)
                            <tr style="text-align: center">
                              <td><a href="{{route('followers.edit', $row->id)}}">{{$row->getSocmed->name ?? "kosong"}}</a></td>
                              <td>{{$row->getSubSocmed->name ?? "kosong"}}</td>
                              <td>{{$row->value}}</td>
                              <td>
                                <form action="{{route('followers.destroy', $row->id)}}" method="POST">
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
                
            });
        } );
    </script>
@endpush