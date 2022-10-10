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
                      <form action="{{route('website.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                          <div class="form-group">
                            <label for="formGroupExampleInput">Tanggal</label>
                            <input type="date" class="form-control" id="formGroupExampleInput" placeholder="" name="tanggal">
                          </div>
                          <div class="form-group">
                            <label for="formGroupExampleInput2">Warta Ekonomi</label>
                            <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="" name="we">
                          </div>
                          <div class="form-group">
                            <label for="formGroupExampleInput2">HerStory</label>
                            <input type="text" class="form-control" id="" placeholder="" name="hs">
                          </div>
                          <div class="form-group">
                            <label for="formGroupExampleInput2">Populis</label>
                            <input type="text" class="form-control" id="" placeholder="" name="populis">
                          </div>
                          <div class="form-group">
                            <label for="formGroupExampleInput2">Konten Jatim</label>
                            <input type="text" class="form-control" id="" placeholder="" name="konten_jatim">
                          </div>
                          <div class="form-group">
                            <label for="formGroupExampleInput2">News Worthy</label>
                            <input type="text" class="form-control" id="" placeholder="" name="news_worthy">
                          </div>
                          <div class="form-group">
                            <label for="formGroupExampleInput2">WE Finance</label>
                            <input type="text" class="form-control" id="" placeholder="" name="we_finance">
                          </div>
                          {{-- <div class="form-group">
                            <label for="formGroupExampleInput2">WE (Nilai)</label>
                            <input type="text" class="form-control" id="" placeholder="" name="we_nilai">
                          </div>
                          <div class="form-group">
                            <label for="formGroupExampleInput2">HS (Nilai)</label>
                            <input type="text" class="form-control" id="" placeholder="" name="hs_nilai">
                          </div>
                          <div class="form-group">
                            <label for="formGroupExampleInput2">Populis (Nilai)</label>
                            <input type="text" class="form-control" id="" placeholder="" name="populis_nilai">
                          </div>
                          <div class="form-group">
                            <label for="formGroupExampleInput2">Konten Jatim (Nilai)</label>
                            <input type="text" class="form-control" id="" placeholder="" name="konten_jatim_nilai">
                          </div> --}}
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
                            <th scope="col">Warta Ekonomi</th>
                            <th scope="col">HerStory</th>
                            <th scope="col">Populis</th>
                            <th scope="col">Konten Jatim</th>
                            <th scope="col">Nilai (WE)</th>
                            <th scope="col">Nilai (HS)</th>
                            <th scope="col">Nilai (Populis)</th>
                            <th scope="col">Nilai (Konten Jatim)</th>
                            <th scope="col">Actions</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($dataWebsite as $item)
                            <tr style="text-align: center">
                              <td><a href="{{ route('website.edit', $item->id) }}">{{$item->tanggal}}</a></td>
                              <td>{{$item->we}}</td>
                              <td>{{$item->hs}}</td>
                              <td>{{$item->populis}}</td>
                              <td>{{$item->konten_jatim}}</td>
                              <td>{{$item->we_nilai}}</td>
                              <td>{{$item->hs_nilai}}</td>
                              <td>{{$item->populis_nilai}}</td>
                              <td>{{$item->konten_jatim_nilai}}</td>
                              <td>
                                <form action="{{route('website.destroy', $item->id)}}" method="POST">
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
                scrollX:true,
            });
        } );
    </script>
@endpush