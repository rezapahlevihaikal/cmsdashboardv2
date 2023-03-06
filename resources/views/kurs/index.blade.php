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
                            <th scope="col">Tanggal</th>
                            <th scope="col">Kurs</th>
                            <th scope="col">Actions</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($dataKurs as $item)
                            <tr style="text-align: center">
                              <td>{{$item->tanggal}}</td>
                              <td>@currency($item->kurs)</td>
                              <td>
                                <form action="{{route('kurs.edit', $item->id)}}" method="get">
                                  @csrf
                                  @method('get')
                                  <button type="submit" class="btn btn-success" ><i class="fas fa-edit"></i></button></td>
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
            $('#pencapaian').mask('#.##0', {reverse: true});
            $('#target').mask('#.##0', {reverse: true});
        } );
    </script>
@endpush