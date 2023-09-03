@extends('admin.layout.app')

@section('title')
Attraction Audit Check Report
@endsection

@section('content')

    <div class="card-box">
    <form class="formSection" action="{{url('/show-audit-report/')}}" method="GET">
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
    @if(isset($items))

        <br><br>
        <div id="datatable-buttons_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
            <div class="row">
                                 
                    <div class="col-xs-12">
                    <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap">
                        <thead>
                            <tr role="row">
                                <th class="sorting_asc" tabindex="0" aria-controls="datatable-buttons" rowspan="1"
                                    colspan="1" aria-sort="ascending">ID
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1"
                                    colspan="1">
                                    List
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1"
                                    colspan="1">
                                    Created At
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1"
                                    colspan="1">
                                    Show List 
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1"
                                    colspan="1">
                                    Status
                                </th>
                            </tr>
                        </thead>

                        <tbody>

                            @foreach ($items as $item)
                                <tr role="row" class="odd" id="row-{{ $item->id }}">
                                    <td tabindex="0" class="sorting_1">{{ $item->id }}</td>
                                    <td>ATTRACTION AUDIT CHECK LIST {{ $loop->iteration }}</td>
                                    <td>{{ $item->date }}</td>
                                    <td>
                                        @if (auth()->user()->can('preopening_lists-edit'))
                                            <a href="{{ route('admin.show_questions_list', $item->id) }}">
                                                <button type="button" id="add" class="add btn btn-primary">
                                                    <i class="fa fa-info"></i>  Show List
                                                </button>
                                            </a>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($item->approve == 0)
                                            <a href="{{ url('questions/' . $item->id . '/approve') }}"
                                                class="btn btn-xs btn-danger"><i class="fa fa-check"></i> Approve</a>
                                        @else
                                            <span>Verified</span>
                                        @endif

                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>

                    </div>
                </div>
            </div>
        @endif
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




