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
                                Name
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1">
                                Theoretical Number
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1">
                            Minimum Height 
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1">
                            Cycle Capacity 
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1">
                                Cycle Duration /sec
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1">
                                Cycle Mins (load /unload)
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1">
                                Ride Type
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1">
                                Ticket Price
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1">
                                Ticket Price FT
                            </th>            
            
                            <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1">
                            Category
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1">
                             Park 
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1">
                             Zone
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1">
                             Assign Park 
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1">
                             Assign Zone 
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
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->theoretical_number }}</td>
                                <td>{{ $item->minimum_height_requirement  }}</td>
                                <td>{{ $item->capacity_one_cycle }}</td>
                                <td>{{ $item->one_cycle_duration_seconds ?? "" }}</td>
                                <td>{{ $item->ride_cycle_mins?? "" }}</td>
                                <td>{{ $item->ride_type->name ?? "" }}</td>
                                <td>{{ $item->ride_price }}</td>
                                <td>{{ $item->ride_price_ft }}</td>
                                <td>{{ $item->ride_cat}}</td>
                                <td>{{ $item->park->name??"" }}</td>
                                <td>{{ $item->zone->name ?? ""}}</td>
                                {!!Form::open( ['route' => ['admin.rides.destroy',$item->id] ,'id'=>'delete-form'.$item->id, 'method' => 'Delete']) !!}
                                {!!Form::close() !!}
                                <td> @if(auth()->user()->can('addRidePark'))
                                        <a href="{{ route('admin.addRidePark', $item->id) }}"
                                        class=" btn {{($item->park_id == null)? 'btn-info' : 'btn-success'}}">
                                        <i class="fa {{($item->park_id == null)? 'fa-plus' : 'fa-edit'}}"></i>
                                        Assign
                                        </a>
                                        @endif
                                </td>
                                <td> @if(auth()->user()->can('addRideZone'))
                                        <a href="{{ route('admin.addRideZone', $item->id) }}"
                                        class=" btn {{($item->zone_id == null)? 'btn-info' : 'btn-success'}}">
                                        <i class="fa {{($item->zone_id == null)? 'fa-plus' : 'fa-edit'}}"></i>
                                        Assign
                                        </a>
                                        @endif

                                </td>
                             <!--    <td>
                                        <a href="{{ route('admin.addRideUser', $item->id) }}"
                                        class=" btn {{($item->user_id == null)? 'btn-info' : 'btn-success'}}">
                                        <i class="fa {{($item->user_id == null)? 'fa-plus' : 'fa-edit'}}"></i>
                                        Assign
                                        </a>
                                </td> -->
                                <td>                                   
                                         @if(auth()->user()->can('rides-edit'))

                                        <a href="{{ route('admin.rides.edit', $item) }}"
                                           class="btn btn-info">Edit</a>
                                           @endif
                                           @if(auth()->user()->can('rides-delete'))

                                           <a class="btn btn-danger" data-name="{{ $item->name }}"
                                           data-url="{{ route('admin.rides.destroy', $item) }}"
                                           onclick="delete_form(this)"> 
                                            Delete
                                        </a>   
                                             @endif

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


