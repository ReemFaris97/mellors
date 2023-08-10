@extends('admin.layout.app')

@section('title')
    Stoppages Report
@endsection

@section('content')

    <div class="card-box">
        <form class="formSection" action="{{url('/show-stoppages-report/')}}" method="GET">
            @csrf
        <div class="row">
    <div class='col-md-5'>
        <div class="form-group">
            <label for="last_name">Select Park</label>
            {!! Form::select('park_id',$parks,null, array('class' => 'form-control park','id'=>'park','placeholder'=>'Choose Park') ) !!}
        </div>
    </div>
    <div class='col-md-5'>
        <div class="form-group">
            <label for="last_name">Select Ride</label>
            {!! Form::select('ride_id', [],null, array('class' => 'form-control ride','id'=>'ride','placeholder'=>'Choose Ride')) !!}
        </div>
    </div>

    <div class='col-md-5'>
        <div class="form-group">
            <label for="middle_name">Time Slot Date From </label>
            {!! Form::date('from',null,['class'=>'form-control','id'=>'date']) !!}
        </div>
    </div> 
    <div class='col-md-5'>
        <div class="form-group">
            <label for="middle_name">Time Slot Date To </label>
            {!! Form::date('to',null,['class'=>'form-control','id'=>'date']) !!}
        </div>
    </div>
    <div class='col-md-2 mtButton'>
        <div class="input-group-btn">
            <button type="submit" class="btn btn-primary save_btn waves-effect">Show</button>
        </div>
    </div>
</div>
            {!!Form::close() !!}
    </div>
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
                                Branch Name
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1">
                                Park Name
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1">
                                Ride Name
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1">
                                Ride Number
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1">
                                Operator Number
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1">
                                Operator Name
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1">
                                Time Slot Date
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1">
                                Time
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1">
                                Ride Status
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1">
                                Stoppage Status
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1">
                                Stoppage Category
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1">
                                Stoppage Sub Category
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1">
                                Ride Notes
                            </th>

                            <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1">
                                Down Times
                            </th>

                        </tr>
                        </thead>

                        <tbody>
                      @if(isset($items))
                        @foreach ($items as $item)
                            <tr role="row" class="odd" id="row-{{ $item->id }}">
                                <td tabindex="0" class="sorting_1">{{ $loop->iteration }}</td>
                                <td>{{ $item->park->branches->name }}</td>
                                <td>{{ $item->park->name }}</td>
                                <td>{{ $item->ride->name }}</td>
                                <td>{{ $item->ride->id }}</td>
                                <td>{{ $item->user->user_number??"" }}</td>
                                <td>{{ $item->user->name }}</td>
                                <td>{{ $item->opened_date }}</td>
                                <td>{{ $item->time }}</td>
                                <td>
                                @if($item->ride_status=='stopped')
                                <span class=" btn-xs btn-danger">Stopped</span>
                                  @else
                                  <span class=" btn-xs btn-success">Active</span>
                                @endif
                                </td>
                                <td>
                                @if($item->stoppage_status=='pending')
                                <span class=" btn-xs btn-primary">Pending
                                  @elseif($item->stoppage_status=='working')
                                  <span class=" btn-xs btn-danger">Working On
                                  @else
                                  <span class=" btn-xs btn-success">Solved
                                @endif
                                </td>
                                <td>{{ $item->stopageCategory->name ?? "name" }}</td>
                                <td>{{ $item->stopageSubCategory->name ?? "name" }}</td>
                                <td>{{ $item->ride_notes }}</td>
                                <td>{{ $item->down_minutes?? "Stop All Day" }}</td>

                            </tr>

                        @endforeach
                        @endif

                        </tbody>
                    </table>


                </div>
            </div>

        </div>
    </div>


@endsection
@push('scripts')

<script type="text/javascript">
$("#park").change(function() {
    $.ajax({
        url: "{{ route('admin.getParkRides') }}?park_id=" + $(this).val(),
        method: 'GET',
        success: function(data) {
            $('#ride').html(data.html);
        }
    });
});
</script>
@endpush
@section('footer')
    @include('admin.datatable.scripts')
@endsection


