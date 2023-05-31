@extends('admin.layout.app')

@section('title')
   All Ride Cycles
@endsection

@section('content')

    <div class="card-box">
    <a href="{{url('add_cycle/'.$ride_id.'/'.$park_time_id)}}">
            <button type="button" class="btn btn-info">Create New Cycle</button>
        </a>

        <br><br>
        <form class="formSection" action="{{url('/search_ride_cycle')}}" method="GET">

            @csrf

     <div class="row">
    <div class='col-md-5'>
        <div class="form-group">
            <label for="middle_name">Time Slot Date </label>
            {!! Form::date('date',null,['class'=>'form-control','id'=>'date']) !!}
            <input type="hidden" name="ride_id" value="{{$ride_id}}">
            <input type="hidden" name="park_time_id" value="{{$park_time_id}}">


        </div>
    </div>
    <div class='col-md-2 mtButton'>
        <div class="input-group-btn">
            <button type="submit" class="btn btn-primary save_btn waves-effect">Show</button>
        </div>
    </div>
</div>
            {!!Form::close() !!}

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
                               Operator Name
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1">
                               Park Name
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1">
                                Start Time
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1">
                                Riders Count
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1">
                                Number Of Vip
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1">
                                Number oF Disabled
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1">
                                Number oF Fast Track
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1">
                            Time Slot Date
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1">
                                Cycle Duration /Seconds
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1">
                                sales
                            </th>

                            <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1">
                                Process
                            </th>
                        </tr>
                        </thead>

                        <tbody>

                        @foreach ($items as $item)
                            <tr role="row" class="odd" id="row-{{ $item->id }}">
                                <td tabindex="0" class="sorting_1">{{$loop->iteration }}</td>
                                <td>{{ $item->ride->name }}</td>
                                <td>{{ $item->user->name }}</td>
                                <td>{{ $item->ride->park->name ?? "" }}</td>
                                <td>{{ $item->start_time }}</td>
                                <td>{{ $item->riders_count }}</td>
                                <td>{{ $item->number_of_vip ??'0'}}</td>
                                <td>{{ $item->number_of_disabled ??'0'}}</td>
                                <td>{{ $item->number_of_ft??'0' }}</td>
                                <td>{{ $item->opened_date }}</td>
                                <td>{{ $item->duration_seconds }}</td>
                                <td>{{ $item->sales }}</td>
                                {!!Form::open( ['route' => ['admin.rides-cycles.destroy',$item->id] ,'id'=>'delete-form'.$item->id, 'method' => 'Delete']) !!}
                                {!!Form::close() !!}
                                <td>
                                        <a class="btn btn-danger" data-name="{{ $item->name }}"
                                           data-url="{{ route('admin.rides-cycles.destroy', $item) }}"
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


