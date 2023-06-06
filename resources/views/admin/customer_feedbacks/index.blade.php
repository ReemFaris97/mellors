@extends('admin.layout.app')

@section('title')
    Customer Feedbacks
@endsection

@section('content')

    <div class="card-box">
    @if(auth()->user()->can('searchCustomerFeedBack'))
        <form class="formSection" action="{{url('/search_customer_feedbacks')}}" method="GET">

        @csrf

    <div class="row">
    <div class='col-md-5'>
        <div class="form-group">
            <label for="last_name">Select Park</label>
            {!! Form::select('park_id', $parks,null, array('class' => 'form-control','id'=>'park_id','placeholder'=>'Choose Park')) !!}
        </div>
    </div>
    <div class='col-md-5'>
        <div class="form-group">
            <label for="last_name">Select Zone</label>
            {!! Form::select('zone_id',[],null, array('class' => 'form-control park','id'=>'zone','placeholder'=>'Choose Zone') ) !!}
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
    <div class='col-md-2 mtButton'>
        <div class="input-group-btn">
            <button type="submit" class="btn btn-primary save_btn waves-effect">Show</button>
        </div>
    </div>
    </div>
</div>
        {!!Form::close() !!}
        @endif
      @if(isset($customer_feedbacks))

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
                                Type
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1">
                                Comment
                            </th>

                            <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1">
                                Process
                            </th>
                        </tr>
                        </thead>

                        <tbody>

                        @foreach ($customer_feedbacks as $item)
                            <tr role="row" class="odd" id="row-{{ $item->id }}">
                                <td tabindex="0" class="sorting_1">{{ $item->id }}</td>
                                <td>{{ $item->rides->park->name }}</td>
                                <td>{{ $item->rides->zone->name }}</td>
                                <td>{{ $item->rides->name }}</td>
                                <td>{{ $item->type }}</td>
                                <td>{!! $item->comment !!}</td>
                                {!!Form::open( ['route' => ['admin.customer_feedbacks.destroy',$item->id] ,'id'=>'delete-form'.$item->id, 'method' => 'Delete']) !!}
                                {!!Form::close() !!}
                                <td>   @if(auth()->user()->can('customer_feedbacks-list'))

                                    <a href="{{ route('admin.customer_feedbacks.show', $item) }}"
                                       class="btn btn-primary">Show</a>
                                       @endif

                                    @if(auth()->user()->can('customer_feedbacks-delete'))
                                        <a class="btn btn-danger" data-name="{{ $item->name }}"
                                           data-url="{{ route('admin.customer_feedbacks.destroy', $item) }}"
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


    @endif
@endsection
@push('scripts')

<script type="text/javascript">
$("#park_id").change(function() {
    $.ajax({
        url: "{{ route('admin.getParkZones') }}?park_id=" + $(this).val(),
        method: 'GET',
        success: function(data) {
            $('#zone').html(data.html);
        }
    });
});
</script>
@endpush

@section('footer')
    @include('admin.datatable.scripts')
@endsection

