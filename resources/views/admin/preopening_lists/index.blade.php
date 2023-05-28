@extends('admin.layout.app')

@section('title')
Preopening Lists
@endsection

@section('content')

    <div class="card-box">
    <a href="{{url('add_preopening_list_to_ride/'.$ride_id.'/'.$park_time_id)}}">
            <button type="button" class="btn btn-info">Create New inspection List</button>
        </a>
        <br><br>
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
                                Inspection List 
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1">
                                Created At
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
                                <td>List {{ $loop->iteration }}</td>
                                <td>{{ $item->created_at }}</td>
                                {!!Form::open( ['route' => ['admin.preopening_lists.destroy',$item->id] ,'id'=>'delete-form'.$item->id, 'method' => 'Delete']) !!}
                                {!!Form::close() !!}
                                <td>
                                    @if(auth()->user()->can('preopening_lists-edit'))
                                    <a href="{{url('edit_preopening_list/'.$item->ride_id.'/'.$park_time_id.'/'.$item->created_at)}}">
                                        <button type="button" id="add" class="add btn btn-success">
                                        <i class="fa fa-edit"></i>Edit List
                                        </button>
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




