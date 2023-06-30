@extends('admin.layout.app')
@section('title')
Duty Report
@endsection
@section('content')
<div class="card-box">
    <form id="myForm" class="formSection" action="{{ url('/search_ride_ops_reports') }}" method="GET">
        @csrf
        <div class="row">
            <div class='col-md-5'>
                <div class="form-group">
                    <label for="last_name">Select Park</label>
                    {!! Form::select('park_id', $parks, isset($park_id) ? $park_id : null, array('class' => 'form-control select2','id'=>'park_id')) !!}
                </div>
            </div>
            <div class='col-md-5'>
                <div class="form-group">
                    <label for="middle_name">Date</label>
                    <input type="date" name="date" class="form-control" id="date" value="{{ isset($date) ? $date : '' }}">
                </div>
            </div>
           
        </div>
    </form>

    <ul class="nav nav-tabs tabsLinkDuty">
        <li class="{{ (request()->is('search_ride_ops_reports*')) ? 'active' : '' }}"><a data-toggle="tab" href="#Ride">Ride Ops</a></li>
        <li class="{{ (request()->is('search_health_and_safety*')) ? 'active' : '' }}"><a data-toggle="tab" href="#Health">Health & safety</a></li>
        <li class="{{ (request()->is('search_maintenance_reports*')) ? 'active' : '' }}"><a data-toggle="tab" href="#Maintenance">Maintenance</a></li>
        <li class="{{ (request()->is('search_tech_reports*')) ? 'active' : '' }}"><a data-toggle="tab" href="#Teachnical">Technical Services</a></li>
        <li class="{{ (request()->is('search_skill_game_reports*')) ? 'active' : '' }}"><a data-toggle="tab" href="#Skill">Skill Games</a></li>
        <li class="{{ (request()->is('search_duty_summary_reports*')) ? 'active' : '' }}"><a data-toggle="tab" href="#Duty">Duty Summary</a></li>
    </ul>

    <div class="tab-content tabsContentDuty">
        <div id="Ride" class="tab-pane fade in active">
            @include('admin.reports.show')
        </div>

        <div id="Health" class="tab-pane fade">
            @include('admin.reports.show')
        </div>

        <div id="Maintenance" class="tab-pane fade">
            @include('admin.reports.show')
        </div>

        <div id="Teachnical" class="tab-pane fade">
            @include('admin.reports.show')
        </div>

        <div id="Skill" class="tab-pane fade">
            @include('admin.reports.show')
        </div>

        <div id="Duty" class="tab-pane fade">
            @include('admin.reports.summery')
        </div>
    </div>
</div>

@endsection

@push('scripts')
<script>
    $(document).ready(function() {
        var formData = {}; // Object to store form data

        // When a tab is clicked
        $('.nav-tabs a').on('click', function() {
            var tabId = $(this).attr('href'); // Get the href value of the clicked tab
            var formAction = ''; // Variable to store the updated form action

            // Update the form action based on the selected tab
            if (tabId === '#Health') {
                formAction = "{{ url('/search_health_and_safety') }}";
            } else if (tabId === '#Maintenance') {
                formAction = "{{ url('/search_maintenance_reports') }}";
            } else if (tabId === '#Teachnical') {
                formAction = "{{ url('/search_tech_reports') }}";
            } else if (tabId === '#Skill') {
                formAction = "{{ url('/search_skill_game_reports') }}";
            } else if (tabId === '#Duty') {
                formAction = "{{ url('/search_duty_summary_reports') }}";
            } else {
                formAction = "{{ url('/search_ride_ops_reports') }}"; // Default form action
            }

            // Set the updated form action
            $('#myForm').attr('action', formAction);

            // Submit the form
            $('#myForm').submit();
        });

    });
</script>

@endpush
@section('footer')
@include('admin.datatable.scripts')
@endsection