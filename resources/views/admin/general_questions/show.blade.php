@extends('admin.layout.app')

@section('title')
    Attraction Audit Check List
@endsection

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <input type="button" value="Print Report" id="printDiv" class="btn btn-primary printBtn"></input>
            <a href="{{ url('show_general_questions/' . $list->ride_id . '/' . $list->park_time_id) }}">
                <button type="button" id="add" class="add btn btn-primary">
                    <i class="fa fa-arrow-left"></i> Back
                </button>
            </a>
        </div>


        <div class="col-xs-12 printable_div " id="myDivToPrint">
            <div class="report-head">
                <div class="report-body">
                    <h3 class="report-title">Attraction Audit Check List</h3>
                </div>
                <div class="report-logo">
                    <img src="{{ asset('/_admin/assets/images/logo1.png') }}" alt="Mellors-img" title="Mellors"
                        class="image">
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 ">
                    <div class="row">
                        <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap">
                            <thead>
                                <tr role="row">
                                    <th class="type-header">Attraction: </th>
                                    <th>{{ $list->ride->name }}</th>
                                    <th class="type-header">Facility:</th>
                                    <th>{{ $list->park->name }}</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>

                    </div>

                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 ">
                    <div class="row">
                        <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap">
                            <thead>
                                @php
                                    use Carbon\Carbon;
                                    $approved = '';
                                    if ($list->approve == 1) {
                                        $approved = Carbon::parse($list->approved_at);
                                    }

                                    $created = Carbon::parse($list->created_at);
                                @endphp
                                <tr role="row">
                                    <th class="type-header">Created Date:</th>
                                    <th>{{ $list->date }}</th>
                                    <th class="type-header">Created Time:</th>
                                    <th>{{ $created?->format('H:i') }}</th>
                                </tr>
                                <tr role="row">
                                    <th class="type-header">Approved Date:</th>
                                    <th>{{ $list->approve == 1 ? $approved?->format('Y-m-d') : 'Not Reviewed Yet' }}</th>
                                    <th class="type-header">Approved Time:</th>
                                    <th>{{ $list->approve == 1 ? $approved?->format('H:i') : 'Not Reviewed Yet' }}</th>

                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td colspan="6">
                                        <p>It is a mandatory requirement that Attraction Management Inspections must be
                                            completed according to the schedule provided or as the business requires.
                                            Inspection to be completed by a trained individual and in person.
                                        </p>
                                        <p>
                                            Any problems identified whilst completing an inspection must also be documented
                                            and should be reported to the Management and addressed immediately.
                                        </p>
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                    </div>

                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 ">
                    @if (isset($items) && count($items) > 0)
                        <div class="row">
                            <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap">
                                <thead>
                                    <tr role="row" class="type-header">
                                        <th style="text-align: center;">Sections</th>
                                        <th>Any Issues?</th>
                                        <th>Comments</th>
                                        <th>Corrective Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $groupedItems = $items->groupBy('question.type');
                                    @endphp

                                    @foreach ($groupedItems as $questionType => $group)
                                        <tr>
                                            <td colspan="4" class="type-header">
                                                <strong>Section{{ $loop->iteration }} - {{ $questionType }}</strong>
                                            </td>
                                        </tr>
                                        @foreach ($group as $value)
                                            <tr>
                                                <td>{{ $value->question->name ?? '' }}</td>
                                                <td>{{ $value->status }} </td>
                                                <td>{{ $value->note }} </td>
                                                <td> {{ $value->corrective_action }}</td>
                                            </tr>
                                        @endforeach
                                    @endforeach
                                </tbody>
                            </table>

                        </div>

                        <table style="border-color: #0b0b0b"
                            class="table table-striped table-bordered dt-responsive nowrap">
                            <tbody>
                                <tr>
                                    <td style="border-color: #0b0b0b">Audited by:</td>
                                    <td style="border-color: #0b0b0b">{{ $list->created_by->name }}</td>
                                </tr>
                                <tr>
                                    <td style="border-color: #0b0b0b">Reviewed by</td>
                                    @if ($list->approve == 0)
                                        <td style="border-color: #0b0b0b"> Not Reviewed yet</td>
                                    @else
                                        <td style="border-color: #0b0b0b">{{ $list->approve_by?->name }}</td>
                                    @endif
                                </tr>
                            </tbody>
                        </table>
                    @else
                        <label>No questions</label>
                    @endif
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
