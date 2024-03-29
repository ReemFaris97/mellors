@extends('admin.layout.app')

@section('title')
  Show RSR Report
@endsection

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card-box">
                <div class="report-head">
                    <div class="report-body">
                        <h3 class="report-title">mellors entertainment saudi</h3>
                        <a href="#" class="report-link">www.riyadh.ksa</a>
                    </div>
                    <div class="report-logo">
                        <img src="{{asset('/_admin/assets/images/logo1.png')}}" alt="Mellors-img" title="Mellors" class="image"> 
                    </div>
                </div>
                <table id="datatable-buttons" style="border-color: #0b0b0b" class="table table-striped table-bordered dt-responsive nowrap">
                    <thead>
                    <tr role="row">
                        <th  class="sorting_asc" style="text-align: center; border-color: #0b0b0b;" tabindex="0"  aria-controls="datatable-buttons" rowspan="1"
                            colspan="1" aria-sort="ascending">RIDE STATUS REPORT
                        </th>
                    </tr>
                   <tbody>
                    <tr>
                        <th  style="border-color: #0b0b0b" class="sorting_asc" tabindex="0" aria-controls="datatable-buttons" rowspan="1"
                             colspan="1" aria-sort="ascending">Park Name :  {{ $rsrReport->parks->name }}
                        </th>
                    </tr>
                    <tr>
                        <th  style="border-color: #0b0b0b" class="sorting_asc" tabindex="0" aria-controls="datatable-buttons" rowspan="1"
                            colspan="1" aria-sort="ascending">Ride Name :  {{ $rsrReport->rides->name }}
                        </th>
                    </tr>

                    <tr>
                        <th  style="border-color: #0b0b0b" class="sorting_asc" tabindex="0" aria-controls="datatable-buttons" rowspan="1"
                            colspan="1" aria-sort="ascending">Ride Performance Details :
                        </th>
                    </tr>
                    <tr><td  style="border-color: #0b0b0b">{!! $rsrReport->ride_performance_details !!}</td></tr>

                    <tr>
                        <th  style="border-color: #0b0b0b" class="sorting_asc" tabindex="0" aria-controls="datatable-buttons" rowspan="1"
                            colspan="1" aria-sort="ascending"> Ride Inspection/Observation :
                        </th>
                    </tr>
                    <tr><td  style="border-color: #0b0b0b">{!!   $rsrReport->ride_inspection !!}</td></tr>

                    <tr>
                        <th  style="border-color: #0b0b0b" class="sorting_asc" tabindex="0" aria-controls="datatable-buttons" rowspan="1"
                            colspan="1" aria-sort="ascending">Corrective Actions Taken :
                        </th>
                    </tr>
                    <tr><td  style="border-color: #0b0b0b">{!!   $rsrReport->corrective_actions_taken!!}</td></tr>
                    <tr>
                        <th  style="border-color: #0b0b0b" class="sorting_asc" tabindex="0" aria-controls="datatable-buttons" rowspan="1"
                            colspan="1" aria-sort="ascending">Conclusion / Recommendation :
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

                    <td  style="border-color: #0b0b0b">RSR Report not Verified yet</td>
                    @else
                    <td  style="border-color: #0b0b0b">{{ auth()->user()->name}}</td>
                    @endif
                </tr>
                <tr>
                    <td  style="border-color: #0b0b0b">Date</td>
                    <td  style="border-color: #0b0b0b">{{ $rsrReport->date }}</td>
                </tr>
                <tr>
                   
                   
                </tr>
                </tbody>
                </table>
                @if(isset($images))
                <table  style="border-color: #0b0b0b" class="table table-striped table-bordered dt-responsive nowrap">
                    <thead>
                        <tr>
                        <th  class="sorting_asc" style="text-align: center; border-color: #0b0b0b;" tabindex="0"  aria-controls="datatable-buttons" rowspan="1"
                                    colspan="1" aria-sort="ascending">Image
                        </th>
                        <th  class="sorting_asc" style="text-align: center; border-color: #0b0b0b;" tabindex="0"  aria-controls="datatable-buttons" rowspan="1"
                                    colspan="1" aria-sort="ascending">Comment
                        </th>
                    </tr>
                </thead>
                <tbody>

                        @foreach($images as $item)
                        <tr>

                        <td style="border-color: #0b0b0b">
                         
                        <img class="img-preview" src="{{ Storage::disk('s3')->temporaryUrl('images/'.baseName($item->image),now()->addMinutes(30)) }}"
                            style="height: 300px; width: 300px">
                        </td>
                        <td style="border-color: #0b0b0b">
                        {{ $item->comment }}</td>
                        </tr>
                            @endforeach
                    </tbody>
                </table>
                    @endif
                    <div class="text-muted font-14 mb-3 text-left">
                        <button onclick="window.print()" class=" btn btn-info"><i class="fa fa-print"></i>  Print</button>
                    </div>
            </div>

        </div><!-- end col -->
    </div>

    <!-- end row -->
@endsection

