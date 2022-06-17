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
                            <th scope="col">Contact Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Phone </th>
                            <th scope="col">Company</th>
                            <th scope="col">Creator Name</th>
                            <th scope="col">Team</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($dataContacts as $item)
                            <tr style="text-align:center;">
                              <td>{{$item->First_Name}}</td>
                              <td>{{$item->Contact_Email}}</td>
                              <td>{{$item->Phone_Number}}</td>
                              <td>{{$item->Company_Name}}</td>
                              <td>{{$item->Creator_Name}}</td>
                              <td>{{$item->Team}}</td>
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