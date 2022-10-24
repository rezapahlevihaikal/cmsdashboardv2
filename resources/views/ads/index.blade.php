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
                      <form action="{{route('ads.store')}}" method="post" enctype="multipart/form-data">
                        @csrf                          
                          <div class="form-group">
                            <label for="formGroupExampleInput2">Website</label>
                                <select id="demo_overview_minimal" class="form-control" data-role="select-dropdown" data-profile="minimal" name="website" required>
                                    <option value="">PILIH WEBSITE</option>
                                    @foreach ($dataWebsite as $item)
                                      <option value="{{$item->id}}">{{$item->website_name}}</option>    
                                    @endforeach
                                </select>
                          </div>
                          <div class="form-group">
                            <label for="formGroupExampleInput2">Deposit</label>
                            <input type="text" class="form-control" id="deposit" placeholder="" name="deposit">
                          </div>
                          <div class="form-group">
                            <label for="formGroupExampleInput2">Tanggal Deposit</label>
                            <input type="date" class="form-control" id="" placeholder="" name="tanggal_deposit">
                          </div>
                          <div class="form-group">
                            <label for="formGroupExampleInput2">Status</label>
                            <select id="demo_overview_minimal" class="form-control" data-role="select-dropdown" data-profile="minimal" name="status" required>
                                <option value="">PILIH STATUS</option>
                                <option value="0">On Progress</option>
                                <option value="1">Finish</option>
                            </select>
                          </div>
                          <div class="form-group">
                            <label for="formGroupExampleInput2">Tanggal Habis</label>
                            <input type="date" class="form-control" id="" placeholder="" name="tanggal_habis">
                          </div>
                          <div class="form-group">
                            <label for="formGroupExampleInput2">Sisa Slot</label>
                            <input type="text" class="form-control" id="" placeholder="" name="sisa_slot">
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
                            <th scope="col">Website</th>
                            <th scope="col">Tanggal</th>
                            <th scope="col">Deposit</th>
                            <th scope="col">Status</th>
                            <th scope="col">Sisa Slot</th>
                            <th scope="col">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($dataAds as $item)
                            <tr style="text-align: center">
                              <td>{{$item->getWebsite->website_name ?? kosong}}</td>
                              <td>
                                Deposit : {{$item->tanggal_deposit}} <br>
                                Habis   : {{$item->tanggal_habis}}
                              </td>
                              <td>Rp {{number_format($item->deposit)}}</td>
                              <td>
                                @if ($item->status == 0)
                                    <a href="#" class="btn btn-primary btn-sm disabled" role="button" aria-disabled="true">On Progress</a>
                                @else
                                    <a href="#" class="btn btn-success btn-sm disabled" role="button" aria-disabled="true">Finish</a>
                                @endif
                              </td>
                              <td>{{$item->sisa_slot}}</td>
                              <td>
                                  <form action="{{route('ads.destroy', $item->id)}}" method="POST">
                                    <a href="{{route('ads.edit', $item->id)}}" class="btn btn-success btn-sm" role="button" aria-disabled="true"><i class="fas fa-edit"></i></a>
                                    @csrf
                                    @method('post')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yang bener?');"><i class="fas fa-trash"></i></button></td>
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