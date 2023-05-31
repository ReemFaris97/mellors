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
       <!--  <div id="datatable-buttons_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
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
                                Inspection element 
                            </th>
                            
                            <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1">
                                Status
                            </th>
                            <th>
                                comment
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1">
                                Created At
                            </th>
                        </tr>
                        </thead>

                        <tbody> -->
            
                        <table id="preopening-lists" class="table">
    <thead>
        <tr>
        <th>Created At</th>
        <th>park</th>
        <th>Ride</th>
        <th>Inspection element </th>
        <th>Status</th>
        <th>comment</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($lists as $created_at => $list)
            @foreach ($list as $item)
                <tr>
                    @if ($loop->first)
                        <td rowspan="{{ $list->count() }}">{{ $created_at }}</td>
                    @endif
                    <td>{{ $item->rides->park->name }}</td>
                    <td>{{ $item->rides->name }}</td>
                    <td>{{ $item->inspection_list->name }}</td>
                    <td>{{ $item->status }}</td>
                    <td>{{ $item->comment }}</td>
                </tr>
            @endforeach
        @endforeach
    </tbody>
</table>
<a href="{{ route('export.table') }}" class="btn btn-primary">Export Table</a>

                       
    </div>


@endsection

@section('footer')
    @include('admin.datatable.scripts')
@endsection




