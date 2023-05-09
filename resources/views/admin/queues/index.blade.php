@extends('admin.layout.app')

@section('title')
Show Queues On Selected Ride
@endsection

@section('content')

    <div class="card-box">
        <a href="{{route('admin.queues.create')}}">
            <button type="button" class="btn btn-primary save_btn">Create New Queue</button>
        </a>
        <br><br>
        <form class="formSection" action="{{url('/search_queues')}}" method="GET">

            @csrf

     <div class="row">
    <div class='col-md-5'>
        <div class="form-group">
            <label for="last_name">Select Ride</label>
            {!! Form::select('ride_id', \App\Models\Ride::pluck('name','id')->all(),null, array('class' => 'form-control')) !!}
        </div>
    </div>
    <div class='col-md-5'>
        <div class="form-group">
            <label for="middle_name">Date </label>
            {!! Form::date('date',null,['class'=>'form-control','id'=>'date']) !!}
        </div>
    </div>
    <div class='col-md-2 mtButton'>
        <div class="input-group-btn">
            <button type="submit" class="btn btn-primary save_btn waves-effect">Show</button>
        </div>
    </div>
</div>
            {!!Form::close() !!}

      {{--@if(isset($queues))--}}

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
                                Queue Minites
                            </th>
                             <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1">
                                 Current Wait Time
                            </th> 
                            <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1">
                            Max Queue Capacity
                            </th> 
                            <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1">
                            Current Queue Occupancy
                            </th> 
                            <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1">
                                Opened Date
                            </th>

                            <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1">
                                Process
                            </th>
                        </tr>
                        </thead>

                        <tbody>

                        @foreach ($items as $item)
                            <tr role="row" class="odd" id="row-{{ $item->id }}">
                                <td tabindex="0" class="sorting_1">{{$loop->iteration}}</td>
                                <td>{{ $item->ride->name }}</td>
                                <td>{{ $item->user->name }}</td>
                                <td>{{ $item->ride->park->name ?? "" }}</td>
                                <td>{{ $item->start_time }}</td>
                                <td>{{ $item->queue_minutes }}</td>
                                <td>{{ $item->current_wait_time??"" }}</td>
                                <td>{{ $item->max_queue_capacity??""  }}</td>
                                <td>{{ $item->current_queue_occupancy??""  }}</td>
                                 <td>{{ $item->opened_date }}</td>

                                {!!Form::open( ['route' => ['admin.queues.destroy',$item->id] ,'id'=>'delete-form'.$item->id, 'method' => 'Delete']) !!}
                                {!!Form::close() !!}
                                <td>
                                    <a class="btn btn-danger" data-name="{{ $item->name }}"
                                       data-url="{{ route('admin.queues.destroy', $item) }}"
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
          {{--@endif--}}
    </div>


@endsection


@section('footer')
    @include('admin.datatable.scripts')
@endsection

