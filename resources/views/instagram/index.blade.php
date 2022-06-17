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
                  <form action="{{route('instagram.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                      <div class="form-group">
                        <label for="formGroupExampleInput2">Warta Ekonomi</label>
                        <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="" name="ig_we_rank">
                      </div>
                      <div class="form-group">
                        <label for="formGroupExampleInput2">HerStory</label>
                        <input type="text" class="form-control" id="" placeholder="" name="ig_hs_rank">
                      </div>
                      <div class="form-group">
                        <label for="formGroupExampleInput2">Populis</label>
                        <input type="text" class="form-control" id="" placeholder="" name="ig_populis_rank">
                      </div>
                      <div class="form-group">
                        <label for="formGroupExampleInput2">Konten Jatim</label>
                        <input type="text" class="form-control" id="" placeholder="" name="ig_konten_jatim_rank">
                      </div>
                      <div class="form-group">
                        <label for="formGroupExampleInput2">WE (Nilai)</label>
                        <input type="text" class="form-control" id="" placeholder="" name="ig_we_nilai">
                      </div>
                      <div class="form-group">
                        <label for="formGroupExampleInput2">HS (Nilai)</label>
                        <input type="text" class="form-control" id="" placeholder="" name="ig_hs_nilai">
                      </div>
                      <div class="form-group">
                        <label for="formGroupExampleInput2">Populis (Nilai)</label>
                        <input type="text" class="form-control" id="" placeholder="" name="ig_populis_nilai">
                      </div>
                      <div class="form-group">
                        <label for="formGroupExampleInput2">Konten Jatim (Nilai)</label>
                        <input type="text" class="form-control" id="" placeholder="" name="ig_konten_jatim_nilai">
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
                                <th scope="col">{{ __('Warta Ekonomi')}}</th>
                                <th scope="col">{{ __('HerStory') }}</th>
                                <th scope="col">{{ __('Populis') }}</th>
                                <th scope="col">{{ __('Konten Jatim') }}</th>
                                <th scope="col">{{ __('WE (Nilai)') }}</th>
                                <th scope="col">{{ __('HS (Nilai)') }}</th>
                                <th scope="col">{{ __('Populis (Nilai)') }}</th>
                                <th scope="col">{{ __('Konten Jatim (Nilai)') }}</th>
                                <th scope="col">{{ __('Action') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($dataInstagram as $item)
                              <tr style="text-align: center">
                                <td><a href="{{route('instagram.edit', $item->id)}}">{{$item->ig_we_rank}}</a></td>
                                <td>{{$item->ig_hs_rank}}</td>
                                <td>{{$item->ig_populis_rank}}</td>
                                <td>{{$item->ig_konten_jatim_rank}}</td>
                                <td>{{$item->ig_we_nilai}}</td>
                                <td>{{$item->ig_hs_nilai}}</td>
                                <td>{{$item->ig_populis_nilai}}</td>
                                <td>{{$item->ig_konten_jatim_nilai}}</td>
                                <td>
                                  <form action="{{route('instagram.destroy', $item->id)}}" method="POST">
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