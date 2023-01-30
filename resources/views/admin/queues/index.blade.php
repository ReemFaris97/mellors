@extends('admin.layout.app')

@section('title')
Show Queues On Selected Ride
@endsection

@section('content')

    <div class="card-box">
        <form action="{{url('/search_queues')}}" method="GET">

            @csrf
            <div class="form-group">
                <label for="middle_name">Date </label>
                {!! Form::date('date',null,['class'=>'form-control','id'=>'date']) !!}
            </div>
            <div class="form-group">
                <label for="last_name">Select Ride</label>
                {!! Form::select('game_id', \App\Models\Game::pluck('name','id')->all(),null, array('class' => 'form-control')) !!}
            </div>
            <div class="col-xs-12">
                <div class="input-group-btn">
                    <button type="submit" class="btn btn-outline-info">Show</button>
                </div>
            </div>
            {!!Form::close() !!}

      @if(isset($queues))

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
                                Ride
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1">
                                Date
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1">
                                Queue minutes
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1">
                               End Time
                            </th>


                        </tr>
                        </thead>
                        <tbody>

                        @foreach ($queues as $item)
                            <tr role="row" class="odd" id="row-{{ $item->id }}">
                                <td tabindex="0" class="sorting_1">{{ $item->id }}</td>
                                <td>{{ $item->games->name }}</td>
                                <td>{{ $item->date }}</td>
                                <td>{{ $item->queue_minutes }}</td>
                                <td>{{ $item->end }}</td>

                            </tr>

                        @endforeach

                        </tbody>
                    </table>
                    </table>


                </div>
            </div>

        </div>
          @endif
    </div>


@endsection


@section('footer')
    @include('admin.datatable.scripts')
@endsection

