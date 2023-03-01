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
                      <form action="{{route('programmatics.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                          <div class="form-group">
                            <label for="formGroupExampleInput2">Tanggal</label>
                            <input type="date" class="form-control" id="dataadd" placeholder="" name="dataadd">
                          </div>                          
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
                            <label for="formGroupExampleInput2">Partner</label>
                                <select id="demo_overview_minimal" class="form-control" data-role="select-dropdown" data-profile="minimal" name="partner_id" required>
                                    <option value="">PILIH PARTNER</option>
                                    @foreach ($dataPartner as $item)
                                      <option value="{{$item->id}}">{{$item->name}}</option>    
                                    @endforeach
                                </select>
                          </div>
                          <div class="form-group">
                            <label for="formGroupExampleInput2">Matchedrequests</label>
                            <input type="text" class="form-control" id="matchedrequests" placeholder="" name="matchedrequests">
                          </div>
                          <div class="form-group">
                            <label for="formGroupExampleInput2">Impressions</label>
                            <input type="text" class="form-control" id="impressions" placeholder="" name="impressions">
                          </div>
                          <div class="form-group">
                            <label for="formGroupExampleInput2">Fillrate</label>
                            <input type="text" class="form-control" id="fillrate" placeholder="" name="fillrate">
                          </div>
                          {{-- <div class="form-group">
                            <label for="formGroupExampleInput2">Views</label>
                            <input type="text" class="form-control" id="views" placeholder="" name="views">
                          </div> --}}
                          <div class="form-group">
                            <label for="formGroupExampleInput2">Clicks</label>
                            <input type="text" class="form-control" id="clicks" placeholder="" name="clicks">
                          </div>
                          <div class="form-group">
                            <label for="formGroupExampleInput2">CTR</label>
                            <input type="text" class="form-control" id="ctr" placeholder="" name="ctr">
                          </div>
                          <div class="form-group">
                            <label for="formGroupExampleInput2">CPC</label>
                            <input type="text" class="form-control" id="cpc" placeholder="" name="cpc">
                          </div>
                          <div class="form-group">
                            <label for="formGroupExampleInput2">CPM</label>
                            <input type="text" class="form-control" id="cpm" placeholder="" name="cpm">
                          </div>
                          <div class="form-group">
                            <label for="formGroupExampleInput2">Laba</label>
                            <input type="text" class="form-control" id="laba" placeholder="" name="laba">
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
                    <div class="" style="padding:25px;">
                      <table id="table-os" class="table table-bordered text-center">
                        <thead class="thead-light">
                          <tr>
                            <th scope="col">Action</th>
                            <th scope="col">Website</th>
                            <th scope="col">Laba</th>
                            <th scope="col">Matchedrequests</th>
                            <th scope="col">Impressions</th>
                            <th scope="col">Fillrate</th>
                            {{-- <th scope="col">Views</th> --}}
                            <th scope="col">Clicks</th>
                            <th scope="col">CTR</th>
                            <th scope="col">CPC</th>
                            <th scope="col">CPM</th>
                           
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($dataProg as $item)
                            <tr style="text-align: center">
                              <td>
                                <form action="{{route('programmatics.destroy', $item->id)}}" method="POST">
                                  <a href="{{route('programmatics.edit', $item->id)}}" class="btn btn-success btn-sm" role="button" aria-disabled="true"><i class="fas fa-edit"></i></a>
                                  @csrf
                                  @method('post')
                                  <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yang bener?');"><i class="fas fa-trash"></i></button></td>
                                </form>
                            </td>
                              <td>
                                {{$item->getWebsite->website_name ?? "kosong"}} ({{$item->getPartner->name ?? "kosong"}})
                                <br>
                                {{$item->dataadd}}
                              </td>
                              <td>{{$item->laba}}</td>
                              <td>{{$item->matchedrequests}}</td>
                              <td>{{$item->impressions}}</td>
                              <td>{{$item->fillrate}}</td>
                              {{-- <td>
                                {{$item->views}}
                              </td> --}}
                              <td>
                                {{$item->clicks}}
                              </td>
                              <td>
                                {{$item->ctr}}
                              </td>
                              <td>{{$item->cpc}}</td>
                              <td>{{$item->cpm}}</td>
                              
                              
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
              ordering: false
            });
            // $('#ctr').mask('00.000', {reverse: true});
            // $('#cpc').mask('00.000', {reverse: true});
            // $('#cpm').mask('00.000', {reverse: true});
            // $('#laba').mask('00.000', {reverse: true});
      });
    </script>
@endpush