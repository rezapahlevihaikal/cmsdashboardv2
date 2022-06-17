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
                  <form action="{{route('events.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                      <div class="form-group">
                        <label for="formGroupExampleInput2">Tanggal</label>
                        <input type="date" class="form-control" id="formGroupExampleInput2" placeholder="" name="tanggal">
                      </div>
                      <div class="form-group">
                        <label for="formGroupExampleInput2">Start Time</label>
                        <input type="time" class="form-control" id="formGroupExampleInput2" placeholder="" name="start_time">
                      </div>
                      <div class="form-group">
                        <label for="formGroupExampleInput2">Finish Time</label>
                        <input type="time" class="form-control" id="" placeholder="" name="finish_time">
                      </div>
                      <div class="form-group">
                        <label for="formGroupExampleInput2">Venue</label>
                        <input type="text" class="form-control" id="" placeholder="" name="venue">
                      </div>
                      <div class="form-group">
                        <label for="formGroupExampleInput2">Deskripsi</label>
                        <textarea class="form-control rounded-0" id="exampleFormControlTextarea2" rows="3" name="deskripsi" required></textarea>
                      </div>
                      <div class="form-group">
                        <label for="formGroupExampleInput2">Kategori</label>
                        <select id="demo_overview_minimal" class="form-control" data-role="select-dropdown" data-profile="minimal" name="kategori" required>
                            <option value="Award">Award</option>
                            <option value="Seminar">Seminar</option>
                            <option value="Client Services">Client Service</option>
                            <option value="Talkshow">Talkshow</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="formGroupExampleInput2">PIC</label>
                        <select id="demo_overview_minimal" class="form-control" data-role="select-dropdown" data-profile="minimal" name="pic" required>
                            <option value="WE">WE</option>
                            <option value="HS">HS</option>
                            <option value="Pop">POPULIS</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="formGroupExampleInput2">Status</label>
                        <select id="demo_overview_minimal" class="form-control" data-role="select-dropdown" data-profile="minimal" name="status">
                            <option value="Start">Start</option>
                            <option value="Progress">Progress</option>
                            <option value="Finish">Finish</option>
                            <option value="Tentatf">Tentatif</option>
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
                <div class="" style="padding:25px">
                    <table class="table table-bordered text-center" id="table-os">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">{{ __('Deksripsi')}}</th>
                                <th scope="col">{{ __('PIC') }}</th>
                                <th scope="col">{{ __('Tanggal') }}</th>
                                <th scope="col">{{ __('Start Time') }}</th>
                                <th scope="col">{{ __('Finish Time') }}</th>
                                <th scope="col">{{ __('Venue') }}</th>
                                <th scope="col">{{ __('Kategori') }}</th>
                                <th scope="col">{{ __('Status') }}</th>
                                <th scope="col">{{ __('Action') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($dataEvents as $item)
                              <tr style="text-align: center">
                                <td><a href="{{route('events.edit', $item->id)}}" title="{{$item->deskripsi}}">{!! Str::limit($item->deskripsi, 60) !!}</a></td>
                                <td>{{$item->pic}}</td>
                                <td>{{$item->tanggal}}</td>
                                <td>{{$item->start_time}}</td>
                                <td>{{$item->finish_time}}</td>
                                <td>{{$item->venue}}</td>
                                <td>{{$item->kategori}}</td>
                                <td>{{$item->status}}</td>
                                <td>
                                  <form action="{{route('events.destroy', $item->id)}}" method="POST">
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