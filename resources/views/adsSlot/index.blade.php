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
                      <form action="{{route('ads_slot.store')}}" method="post" enctype="multipart/form-data">
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
                            <label for="formGroupExampleInput2">Mobile Top</label>
                            <select id="demo_overview_minimal" class="form-control" data-role="select-dropdown" data-profile="minimal" name="mob_top" required>
                                <option value="">MOBILE TOP</option>
                                @foreach ($dataPartner as $item)
                                  <option value="{{$item->id}}">{{$item->name}}</option>    
                                @endforeach
                            </select>
                          </div>
                          <div class="form-group">
                            <label for="formGroupExampleInput2">Mobile in Article 1</label>
                            <select id="demo_overview_minimal" class="form-control" data-role="select-dropdown" data-profile="minimal" name="website" required>
                                    <option value="">MOBILE IN ARTICLE 1</option>
                                    @foreach ($dataPartner as $item)
                                      <option value="{{$item->id}}">{{$item->name}}</option>    
                                    @endforeach
                                </select>
                          </div>
                          <div class="form-group">
                            <label for="formGroupExampleInput2">Mobile in Article 2</label>
                            <select id="demo_overview_minimal" class="form-control" data-role="select-dropdown" data-profile="minimal" name="website" required>
                                    <option value="">MOBILE IN ARTICLE 2</option>
                                    @foreach ($dataPartner as $item)
                                      <option value="{{$item->id}}">{{$item->name}}</option>    
                                    @endforeach
                                </select>
                          </div>
                          <div class="form-group">
                            <label for="formGroupExampleInput2">Mobile in Article 3</label>
                            <select id="demo_overview_minimal" class="form-control" data-role="select-dropdown" data-profile="minimal" name="website" required>
                                <option value="">MOBILE IN ARTICLE 3</option>
                                @foreach ($dataPartner as $item)
                                  <option value="{{$item->id}}">{{$item->name}}</option>    
                                @endforeach
                            </select>
                          </div>
                          <div class="form-group">
                            <label for="formGroupExampleInput2">Mobile Sticky Bottom</label>
                           <select id="demo_overview_minimal" class="form-control" data-role="select-dropdown" data-profile="minimal" name="website" required>
                                    <option value="">MOBILE STICKY BOTTOM</option>
                                    @foreach ($dataPartner as $item)
                                      <option value="{{$item->id}}">{{$item->name}}</option>    
                                    @endforeach
                                </select>
                          </div>
                          <div class="form-group">
                            <label for="formGroupExampleInput2">Mobile Image Banner</label>
                           <select id="demo_overview_minimal" class="form-control" data-role="select-dropdown" data-profile="minimal" name="website" required>
                                    <option value="">MOBILE IMAGE BANNER</option>
                                    @foreach ($dataPartner as $item)
                                      <option value="{{$item->id}}">{{$item->name}}</option>    
                                    @endforeach
                                </select>
                          </div>
                          <div class="form-group">
                            <label for="formGroupExampleInput2">Mobile Native Ad</label>
                           <select id="demo_overview_minimal" class="form-control" data-role="select-dropdown" data-profile="minimal" name="website" required>
                                    <option value="">MOBILE NATIVE AD</option>
                                    @foreach ($dataPartner as $item)
                                      <option value="{{$item->id}}">{{$item->name}}</option>    
                                    @endforeach
                                </select>
                          </div>
                          <div class="form-group">
                            <label for="formGroupExampleInput2">Mobile Video</label>
                           <select id="demo_overview_minimal" class="form-control" data-role="select-dropdown" data-profile="minimal" name="website" required>
                                    <option value="">MOBILE VIDEO</option>
                                    @foreach ($dataPartner as $item)
                                      <option value="{{$item->id}}">{{$item->name}}</option>    
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
                            <th scope="col">Website</th>
                            <th scope="col">Mobile Top</th>
                            <th scope="col">Article 1</th>
                            <th scope="col">Article 2</th>
                            <th scope="col">Article 3</th>
                            <th scope="col">Sticky bottom</th>
                            <th scope="col">Image Banner</th>
                            <th scope="col">NativeAds</th>
                            <th scope="col">Video</th>
                            <th scope="col">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($dataAdsSlot as $item)
                            <tr style="text-align: center">
                              <td>{{$item->getWebsite->website_name ?? kosong}}</td>
                              <td>{{$item->getPartner->name ?? 'kosong'}}</td>
                              <td>{{$item->getPartner->name ?? 'kosong'}}</td>
                              <td>{{$item->getPartner->name ?? 'kosong'}}</td>
                              <td>{{$item->getPartner->name ?? 'kosong'}}</td>
                              <td>{{$item->getPartner->name ?? 'kosong'}}</td>
                              <td>{{$item->getPartner->name ?? 'kosong'}}</td>
                              <td>{{$item->getPartner->name ?? 'kosong'}}</td>
                              <td>{{$item->getPartner->name ?? 'kosong'}}</td>
                              <td>
                                <form action="{{route('ads_slot.destroy', $item->id)}}" method="POST">
                                    <a href="{{route('ads_slot.edit', $item->id)}}" class="btn btn-success btn-sm" role="button" aria-disabled="true"><i class="fas fa-edit"></i></a>
                                    @csrf
                                    @method('post')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yang bener?');"><i class="fas fa-trash"></i></button></td>
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
                scrollX:true
            });
        } );
    </script>
@endpush