@extends('layouts.app')

@section('content')
@include('layouts.headers.header')
    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 mb-5 mb-xl-0">
                <div class="card bg-secondary-default shadow">
                    <div class="" style="padding:25px;">
                      <table id="table-os" class="table table-bordered text-center">
                        <thead class="thead-light">
                          <tr>
                            <th scope="col">Company Name</th>
                            <th scope="col">Address</th>
                            <th scope="col">City</th>
                            <th scope="col">Province</th>
                            <th scope="col">Contact</th>
                            <th scope="col">Type</th>
                            <th scope="col">Deal</th>
                            <th scope="col">Creator Name</th>
                            <th scope="col">Team</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($dataCompanies as $item)
                            <tr style="text-align:center;">
                              <td title="{{$item->name}}">{!! Str::limit($item->name, 40) !!}</td>
                              <td title="{{$item->address}}">{!! Str::limit($item->address, 40) !!}</td>
                              <td>{{$item->city}}</td>
                              <td>{{$item->province}}</td>
                              <td title="{{$item->contact}}">{!! Str::limit($item->contact, 40) !!}</td>
                              <td>{{$item->type}}</td>
                              <td title="{{$item->deal}}">{!! Str::limit($item->deal, 40) !!}</td>
                              <td>{{$item->creator_name}}</td>
                              <td>{{$item->team}}</td>
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