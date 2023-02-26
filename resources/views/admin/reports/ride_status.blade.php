@extends('admin.layout.app')

@section('title')
   All Rides
@endsection

@section('content')

    <div class="card-box">
        <a href="{{route('admin.rides.create')}}">
            <button type="button" class="btn btn-info">Create New Rides</button>
        </a>
        <div id="datatable-buttons_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
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
                                Capacity
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1">
                                Park Name
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1">
                                Zone
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1">
                                status
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1">
                                stoppage category
                            </th>
                        </tr>
                        </thead>

                        <tbody>

                        @foreach ($rides as $item)
                            <tr role="row" class="odd" id="row-{{ $item->id }}">
                                <td tabindex="0" class="sorting_1">{{ $item->id }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->capacity_one_cycle }}</td>
                                <td>{{ $item->park->name }}</td>
                                <td>{{ $item->zone->name }}</td>
                                <td> closed</td>
                                <td> Stoppage Category</td>
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


