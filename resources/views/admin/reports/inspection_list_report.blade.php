@extends('admin.layout.app')

@section('title')
Inspection Lists Report
@endsection

@section('content')

    <div class="card-box">
    <form class="formSection" action="{{url('/show-inspection-list-report/')}}" method="GET">
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
                                Park
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1">
                                Zone
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1">
                                Ride 
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1">
                                Time Slot Date 
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1">
                                Inspection Element 
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1">
                              Status              
                             </th>
                            <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1">
                                Comment
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1">
                                Created At
                            </th>
                           
                        </tr>
                        </thead>

                        <tbody>
                            @if(isset($items))

                        @foreach ($items as $item)
                            <tr role="row" class="odd" id="row-{{ $item->id }}">
                                <td tabindex="0" class="sorting_1">{{ $loop->iteration }}</td>
                                <td>{{$item->park->name}}</td>
                                <td>{{$item->zone->name}}</td>
                                <td>{{ $item->rides->name }}</td>
                                <td>{{ $item->opened_date }}</td>
                                <td>{{ $item->inspection_list->name }}</td>
                                <td>{{ $item->status }}</td>
                                <td>{{ $item->comment }}</td>
                                <td> {{ $item->created_at }} </td>
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




