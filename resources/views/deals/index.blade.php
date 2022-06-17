@extends('layouts.app')

@section('content')
@include('layouts.headers.header')
    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 mb-5 mb-xl-0">
                <div class="card bg-secondary-default shadow">
                    <div class="" style="padding:25px;">
                      <table id="table" class="table table-bordered text-center">
                        <thead class="thead-light">
                          <tr>
                            <th scope="col">Product</th>  
                            <th scope="col">Name</th>
                            <th scope="col">Owner</th>
                            <th scope="col">Team </th>
                            <th scope="col">Size</th>
                            <th scope="col">Stage</th>
                            <th scope="col">Company</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($dataDeals as $item)
                            <tr style="text-align:center;">
                              <td title="{{$item->Products}}">{!! Str::limit($item->Products, 40) !!}</td>
                              <td>{{$item->Name}}</td>
                              <td>{{$item->Owner_Fullname}}</td>
                              <td>{{$item->Team}}</td>
                              <td>{{$item->Size}}</td>
                              <td>{{$item->Stage}}</td>
                              <td>{{$item->Company}}</td>
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
            $('#table').DataTable({
                scrollX:true,
            });
        } );
    </script>
@endpush