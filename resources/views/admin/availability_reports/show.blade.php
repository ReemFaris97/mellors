@extends('admin.layout.app')

@section('title')
Ride Availability Report 
@endsection

@section('content')
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
                    <h3 class="table-title">Daily Ride Availability Report</h3>
                    <div class="report-head">
                    <div class="report-body">
                    <h4 class="report-title">Report compiled by: {{$item->created_by->name}} </h4>
                    <h4 class="report-title">Report verified by: {{$item->verified_by->name??'Not verified Yet'}} </h4>
                    </div>
                    <div class="report-logo">
                    <h4 class="report-title">{{$item->date}} </h4>
                    <h4 class="report-title">Time Submitted : {{$item->second_status === null ? $item->created_at->format('H:i') : $item->updated_at->format('H:i')}} </h4>
                    </div>
                </div>

                </div>
                <div class="col-xs-12">
                    <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap">
                        <thead>
                        <tr role="row">
                            <th class="sorting_asc" tabindex="0" aria-controls="datatable-buttons" rowspan="1"
                                colspan="1" aria-sort="ascending">No.
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1">
                                Ride
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1">
                                Park
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1">
                            STATUS @ {{$item->created_at->format('H:i')}}
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1">
                            STATUS @  {{$item->second_status === null ? '' : $item->updated_at->format('H:i')}}
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1">
                            No Of Gondolas
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1">
                            No Of Seats
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1">
                            Comment
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                    @if(isset($items))
                        @foreach ($items as $item)
                            <tr role="row" class="odd" id="row-{{ $item->id }}">
                                <td tabindex="0" class="sorting_1">{{ $item->id }}</td>
                                <td>{{ $item->rides->name }}</td>
                                <td>{{ $item->parks->name }}</td>
                                <td>{{ $item->first_status }}</td>
                                <td>{{ $item->second_status }}</td>
                                <td>{{ $item->no_of_gondolas }}</td>
                                <td>{{ $item->no_of_seats }}</td>
                                <td>{!!  $item->comment !!} </td>
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



