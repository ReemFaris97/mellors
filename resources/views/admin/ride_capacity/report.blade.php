@extends('admin.layout.app')

@section('title')
    Ride Availability Report
@endsection

@section('content')

    <div class="card-box">
        <form class="formSection" action="{{ url('/ride_capacity_report/') }}" method="GET">

            <div class="row">
                <div class='col-md-5'>
                    <div class="form-group">
                        <label for="last_name">Select Park</label>
                        {!! Form::select('park_id', $parks, null, [
                            'class' => 'form-control park',
                            'id' => 'park',
                            'placeholder' => 'Choose Park',
                        ]) !!}
                    </div>
                </div>
                <div class='col-md-5'>
                    <div class="form-group">
                        <label for="last_name">Select Ride</label>
                        {!! Form::select('ride_id', [], null, [
                            'class' => 'form-control ride',
                            'id' => 'ride',
                            'placeholder' => 'Choose Ride',
                        ]) !!}
                    </div>
                </div>

                <div class='col-md-5'>
                    <div class="form-group">
                        <label for="middle_name">Time Slot Date From </label>
                        {!! Form::date('from', null, ['class' => 'form-control', 'id' => 'date']) !!}
                    </div>
                </div>
                <div class='col-md-5'>
                    <div class="form-group">
                        <label for="middle_name">Time Slot Date To </label>
                        {!! Form::date('to', null, ['class' => 'form-control', 'id' => 'date']) !!}
                    </div>
                </div>
                <div class='col-md-2 mtButton'>
                    <div class="input-group-btn">
                        <button type="submit" class="btn btn-primary save_btn waves-effect">Show</button>
                    </div>
                </div>
            </div>
            {!! Form::close() !!}
    </div>
    <br><br>
    <div id="datatable-buttons_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
        <div class="row">
            <div class="col-xs-12">
                <input type="button" value="Print Report" id="printDiv" class="btn btn-primary printBtn"></input>
            </div>
            <div class="col-xs-12 printable_div" id="myDivToPrint">
                <div class="col-xs-12 printOnly">
                    <div class="logo">
                        <img src="{{ asset('/_admin/assets/images/logo1.png') }}" alt="Mellors-img" title="Mellors"
                            class="image">
                    </div>
                    <h3 class="table-title">Ride Availability Report</h3>
                </div>
                <div class="col-xs-12">
                    <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap">
                        <thead>
                            <tr role="row">
                                <th class="sorting_asc" tabindex="0" aria-controls="datatable-buttons" rowspan="1"
                                    colspan="1" aria-sort="ascending">ID
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1"
                                    colspan="1">
                                    Ride
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1"
                                    colspan="1">
                                    Availabilty Capacity
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1"
                                    colspan="1">
                                    Preopening checkList Capacity
                                </th>

                                <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1"
                                    colspan="1">
                                    Final Capacity
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1"
                                    colspan="1">
                                    Date
                                </th>
                            </tr>
                        </thead>

                        <tbody>
                            @if (isset($items))
                                @foreach ($items as $item)
                                    <tr role="row" class="odd" id="row-{{ $item->id }}">
                                        <td tabindex="0" class="sorting_1">{{ $item->id }}</td>
                                        <td>{{ $item->ride->name ?? '' }}</td>
                                        <td>{{ $item->ride_availablity_capacity ?? 'Not yet' }}</td>

                                        <td>
                                            {{ $item->preopening_capacity ?? 'Not yet' }}
                                        </td>
                                        <td>
                                            {{ $item->final_capacity ?? 'Not yet' }}
                                        </td>
                                         <td>{{ $item->date }}</td>
                                    </tr>
                                @endforeach
                            @endif

                        </tbody>
                    </table>


                </div>
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
    <script language="javascript">
        $('#printDiv').click(function() {
            $('#myDivToPrint').show();
            window.print();
            return false;
        });
    </script>
@endpush
@section('footer')
    @include('admin.datatable.scripts')
@endsection
