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
                      <label for="formGroupExampleInput2">Partner</label>
                      <select id="demo_overview_minimal" class="form-control" data-role="select-dropdown" data-profile="minimal" name="partner_id" required>
                        <option value="">PILIH PARTNER</option>
                        @foreach ($dataPartner as $item)
                            <option value="{{$item->id}}">{{$item->nama_partner}}</option>    
                        @endforeach
                      </select>
                    </div>
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
                        <select id="demo_overview_minimal" class="form-control" data-role="select-dropdown" data-profile="minimal" name="id_kategori" required>
                          <option value="">PILIH KATEGORI</option>
                          @foreach ($dataKategori as $item)
                              <option value="{{$item->id}}">{{$item->nama_kategori}}</option>    
                          @endforeach
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="formGroupExampleInput2">PIC</label>
                        <select id="demo_overview_minimal" class="form-control" data-role="select-dropdown" data-profile="minimal" name="id_pic" required>
                          <option value="">PILIH PIC</option>
                          @foreach ($dataPicEvent as $item)
                            <option value="{{$item->id}}">{{$item->nama_pic}} ({{$item->divisi}})</option>    
                          @endforeach
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="formGroupExampleInput2">Status</label>
                        <select id="demo_overview_minimal" class="form-control" data-role="select-dropdown" data-profile="minimal" name="id_status">
                          <option value="">PILIH STATUS</option>
                          @foreach ($dataStatusEvent as $item)
                            <option value="{{$item->id}}">{{$item->nama_status}}</option>    
                          @endforeach
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="formGroupExampleInput2">Cost</label>
                        <input type="text" class="form-control" id="" placeholder="" name="cost">
                      </div>
                      <div class="form-group">
                        <label for="formGroupExampleInput2">Revenue</label>
                        <input type="text" class="form-control" id="" placeholder="" name="revenue">
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
                                <th>Deksripsi</th>
                                <th>PIC/Partner</th>
                                <th>Tanggal</th>
                                <th>Start Time</th>
                                <th>Finish Time</th>
                                <th>Venue</th>
                                <th>Kategori</th>
                                <th>Status</th>
                                <th>Cost</th>
                                <th>Revenue</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($dataEvents as $row)
                              <tr style="text-align: center">
                                <td><a href="{{route('events.edit', $row->id)}}" title="{{$row->deskripsi}}">{!! Str::limit($row->deskripsi, 60) !!}</a></td>
                                <td>
                                  {{$row->pic_name[0]->nama_pic ?? null}}
                                  <br>
                                  {{$row->getPartner->nama_partner ?? 'kosong'}}
                                </td>
                                <td>{{$row->tanggal}}</td>
                                <td>{{$row->start_time}}</td>
                                <td>{{$row->finish_time}}</td>
                                <td>{{$row->venue}}</td>
                                <td>{{$row->cat->nama_kategori ?? null}}</td>
                                <td>{{$row->stat2->nama_status ?? null}}</td>
                                <td>Rp {{number_format($row->cost)}}</td>
                                <td>Rp {{number_format($row->revenue)}}</td>
                                <td>
                                  <form action="{{route('events.destroy', $row->id)}}" method="POST">
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