@extends('admin.layout.app')

@section('title')
Rides availablility
@endsection

@section('content')

<div class="card-box">

    <div id="datatable-buttons_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer  ">
        <div class="row">
            <div class="col-sm-12">
                <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap">
                    <thead>
                        <tr role="row">
                            <th class="sorting_asc" tabindex="0" aria-controls="datatable-buttons" rowspan="1"
                                colspan="1" aria-sort="ascending">ID
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1">
                                Ride Name
                            </th>

                            <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1">
                                Park Name
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1">
                                Status
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1">
                                Ride Notes
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1">
                                Ride Stoppage Description
                            </th>
                        </tr>
                    </thead>

                    <tbody>

                        @foreach ($rides as $item)
                        <tr role="row" class="odd" id="row-{{ $item->id }}">
                            <td tabindex="0" class="sorting_1">{{ $item->id }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->parkName }}</td>
                            <td> 
                            @if($item->available=='closed')
                                <span class=" btn-xs btn-danger">Closed</span>
                                  @else
                                  <span class=" btn-xs btn-success">Open</span>
                                @endif
                            </td>
                            <td> {{$item->ride_notes}}</td>
                            <td> {{$item->rideSroppageDescription}}</td>
                        </tr>

                        @endforeach

                    </tbody>
                </table>


            </div>
        </div>

    </div>
</div>


@endsection

@section('footer')
@include('admin.datatable.scripts')
@endsection