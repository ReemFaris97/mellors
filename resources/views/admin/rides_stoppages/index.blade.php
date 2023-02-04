@extends('admin.layout.app')

@section('title')
   All Rides
@endsection

@section('content')

    <div class="card-box">
        <a href="{{route('admin.rides.create')}}">
            <button type="button" class="btn btn-info">Create New Stoppage</button>
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
                                Ride Number
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1">
                                Number of Seats
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1">
                                Operator Number
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1">
                                Operator Name
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1">
                                Date
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1">
                                Time
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1">
                                Ride_Status
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1">
                                Ride_Stoppage_Category
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1">
                                Ride_Stoppage_SubCategory
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1">
                                Ride Notes
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1">
                                Opened_Date
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1">
                                Park Name
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1">
                                DateTime
                            </th>

                            <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1">
                                Process
                            </th>
                        </tr>
                        </thead>

                        <tbody>

                        @foreach ($items as $item)
                            <tr role="row" class="odd" id="row-{{ $item->id }}">
                                <td tabindex="0" class="sorting_1">{{ $item->id }}</td>
                                <td>{{ $item->ride->name }}</td>
                                <td>{{ $item->ride->id }}</td>
                                <td>{{ $item->number_of_seats ?? "" }}</td>
                                <td>{{ $item->operator_number?? "" }}</td>
                                <td>{{ $item->operator_name }}</td>
                                <td>{{ $item->date }}</td>
                                <td>{{ $item->time }}</td>
                                <td>{{ $item->ride_status }}</td>
                                <td>{{ $item->stopageSubCategory->name ?? "name" }}</td>
                                <td>{{ $item->ride_notes }}</td>
                                <td>{{ $item->opened_Date }}</td>
                                <td>{{ $item->date_time }}</td>
                                <td>{{ $item->down_minutes }}</td>
                                {!!Form::open( ['route' => ['admin.rides.destroy',$item->id] ,'id'=>'delete-form'.$item->id, 'method' => 'Delete']) !!}
                                {!!Form::close() !!}
                                <td>

                                        <a class="btn btn-danger" data-name="{{ $item->name }}"
                                           data-url="{{ route('admin.rides.destroy', $item) }}"
                                           onclick="delete_form(this)">
                                            Delete
                                        </a>

                                </td>

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


