@extends('admin.layout.app')

@section('title')
Rides Inspection List
@endsection

@section('content')

<div class="card-box">
<h3>Add Elements To Rides Inspection lists </h3>
<br>
    <div id="datatable-buttons_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer dt">
        <div class="row">
            <div class="col-sm-12">
                <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap">
                    <thead>
                        <tr role="row">
                            <th class="sorting_asc" tabindex="0" aria-controls="datatable-buttons" rowspan="1"
                                colspan="1" aria-sort="ascending">ID
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1">
                                Ride
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1">
                                Inspection List 
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1">
                                Preopening Check List
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1">
                                Preclosing Check List
                            </th>
                        </tr>
                    </thead>

                    <tbody>

                        @foreach ($rides as $item)
                        <tr role="row" class="odd" id="row-{{ $item->id }}">
                        <input type="hidden" name="ride_id" id="ride-id" class="ride-id" value="{{ $item->id }}">

                            <td tabindex="0" class="sorting_1">{{ $item->id }}</td>
                            <td>{{ $item->name }}</td>
                            <td>
                                @if(auth()->user()->can('preopening_lists-edit'))
                                @if(in_array($item->id, $data_exist))

                                <a href="{{url('edit_ride_inspection_lists/'.$item->id)}}">
                                        <button type="button" class="edit btn btn-success">
                                        <i class="fa fa-edit"></i> Edit
                                        </button>
                                    </a>
                                   
                                    @else
                                    <a href="{{url('add_ride_inspection_lists/'.$item->id)}}">
                                    <button type="button" class="add btn btn-info">
                                    <i class="fa fa-plus"></i> Add
                                    </button>
                                    </a>
                                    @endif
                                @endif
                            </td>
                            <td>
                                @if(auth()->user()->can('preopening_lists-edit'))
                                @if(in_array($item->id, $preopening_data_exist))

                                <a href="{{url('edit_ride_preopen_list/'.$item->id)}}">
                                        <button type="button" class="edit btn btn-success">
                                        <i class="fa fa-edit"></i> Edit
                                        </button>
                                    </a>
                                   
                                    @else
                                    <a href="{{url('add_ride_preopen_list/'.$item->id)}}">
                                    <button type="button" class="add btn btn-info">
                                    <i class="fa fa-plus"></i> Add
                                    </button>
                                    </a>
                                    @endif
                                @endif
                            </td>
                            <td>
                                @if(auth()->user()->can('preopening_lists-edit'))
                                @if(in_array($item->id, $data_exist))

                                <a href="{{url('edit_ride_preclose_list/'.$item->id)}}">
                                        <button type="button" class="edit btn btn-success">
                                        <i class="fa fa-edit"></i> Edit
                                        </button>
                                    </a>
                                   
                                    @else
                                    <a href="{{url('add_ride_preclose_list/'.$item->id)}}">
                                    <button type="button" class="add btn btn-info">
                                    <i class="fa fa-plus"></i> Add
                                    </button>
                                    </a>
                                    @endif
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
