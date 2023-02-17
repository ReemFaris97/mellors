@extends('admin.layout.app')

@section('title')
  Show RSR Report
@endsection

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card-box">
                <h4 class="header-title m-t-0 m-b-30"> Show RSR Report</h4>

                <table id="datatable-buttons" style="border-color: #0b0b0b" class="table table-striped table-bordered dt-responsive nowrap">

                    <thead>
                    <tr role="row">
                        <th  class="sorting_asc" style="text-align: center; border-color: #0b0b0b;" tabindex="0"  aria-controls="datatable-buttons" rowspan="1"
                            colspan="1" aria-sort="ascending">RIDE STATUS REPORT
                        </th>
                   <tbody>
                    <tr>
                        <th  style="border-color: #0b0b0b" class="sorting_asc" tabindex="0" aria-controls="datatable-buttons" rowspan="1"
                            colspan="1" aria-sort="ascending">Ride Name:
                        </th>
                    </tr>
                    <tr><td  style="border-color: #0b0b0b">{{ $rsrReport->rides->name }}</td></tr>

                    <tr>
                        <th  style="border-color: #0b0b0b" class="sorting_asc" tabindex="0" aria-controls="datatable-buttons" rowspan="1"
                            colspan="1" aria-sort="ascending">Ride Performance Details:
                        </th>
                    </tr>
                    <tr><td  style="border-color: #0b0b0b">{!! $rsrReport->ride_performance_details !!}</td></tr>

                    <tr>
                        <th  style="border-color: #0b0b0b" class="sorting_asc" tabindex="0" aria-controls="datatable-buttons" rowspan="1"
                            colspan="1" aria-sort="ascending"> Ride Inspection/Observation:
                        </th>
                    </tr>
                    <tr><td  style="border-color: #0b0b0b">{!!   $rsrReport->ride_inspection !!}</td></tr>

                    <tr>
                        <th  style="border-color: #0b0b0b" class="sorting_asc" tabindex="0" aria-controls="datatable-buttons" rowspan="1"
                            colspan="1" aria-sort="ascending">Corrective Actions Taken:
                        </th>
                    </tr>
                    <tr><td  style="border-color: #0b0b0b">{!!   $rsrReport->corrective_actions_taken!!}</td></tr>
                    <tr>
                        <th  style="border-color: #0b0b0b" class="sorting_asc" tabindex="0" aria-controls="datatable-buttons" rowspan="1"
                            colspan="1" aria-sort="ascending">Conclusion/Recommendation:
                        </th>
                    </tr>
                    <tr><td  style="border-color: #0b0b0b">{!! $rsrReport->conclusion !!}</td></tr>
                   </tbody>

                </table>
                <table  style="border-color: #0b0b0b" class="table table-striped table-bordered dt-responsive nowrap">
                <tbody>
                <tr>
                    <td  style="border-color: #0b0b0b">Reported by</td>
                    <td  style="border-color: #0b0b0b">{{ $rsrReport->created_by->name }}</td>
                </tr>
                <tr>
                    <td  style="border-color: #0b0b0b">Report Verified by</td>
                    @if($rsrReport->status=='pending')

                    <td  style="border-color: #0b0b0b">RSR report not Verified yet</td>
                    @else
                    <td  style="border-color: #0b0b0b">{{ auth()->user()->name}}</td>
                    @endif
                </tr>
                <tr>
                    <td  style="border-color: #0b0b0b">Date</td>
                    <td  style="border-color: #0b0b0b">{{ $rsrReport->date }}</td>
                </tr>
                <tr>
                    @if($rsrReport->status=='pending')
                    <td>
                        <a href="{{url('rsr_reports/'.$rsrReport->id.'/approve')}}"
                           class="btn btn-xs btn-success"><i class="fa fa-check"></i> Approve</a>
                    </td>
                    @endif
                    <td>
                        <a href="{{ route('admin.rsr_reports.edit', $rsrReport) }}"
                           class="btn btn-xs btn-success">Edit</a>
                    </td>
                </tr>
                </tbody>
                </table>
                <table  style="border-color: #0b0b0b" class="table table-striped table-bordered dt-responsive nowrap">
                    <tbody>
                    <tr>
                        <td  style="border-color: #0b0b0b">Images</td>
                        <td  style="border-color: #0b0b0b"></td>
                    </tr>
                    </tbody>
                </table>

            </div>
        </div><!-- end col -->
    </div>
    <!-- end row -->
@endsection

