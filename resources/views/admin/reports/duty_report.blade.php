@extends('admin.layout.app')

@section('title')
Duty Report
@endsection

@section('content')

<div class="card-box">
    <ul class="nav nav-tabs tabsLinkDuty">
        <li class="{{ (request()->is('ride-ops-reports')) ? 'active' : '' }}"><a data-toggle="tab" href="#Ride">Ride Ops</a></li>
        <li class="{{ (request()->is('health_and_safety_reports')) ? 'active' : '' }}"><a data-toggle="tab" href="#Health">Health & safety </a></li>
        <li class="{{ (request()->is('maintenance_reports')) ? 'active' : '' }}"><a data-toggle="tab" href="#Maintenance"> Maintenance</a></li>
        <li class="{{ (request()->is('tech-reports')) ? 'active' : '' }}"><a data-toggle="tab" href="#Teachnical"> Teachnical Services</a></li>
        <li class="{{ (request()->is('skill_game_reports')) ? 'active' : '' }}"><a data-toggle="tab" href="#Skill"> Skill Games</a></li>
        <li class="{{ (request()->is('summery')) ? 'active' : '' }}"><a data-toggle="tab" href="#Duty"> Duty Summary</a></li>
    </ul>

    <div class="tab-content tabsContentDuty">
        <div id="Ride" class="tab-pane fade in active">
            <form action="{{url('/search_ride_ops_reports')}}" method="GET">
            @csrf
            @include('admin.reports.form')
            {!!Form::close() !!}
            <div id="datatable-buttons_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                    <div class="row">
                        <div class="col-sm-12">
                            <table id="datatable-buttons"
                                class="table table-striped table-bordered dt-responsive nowrap">
                                <thead>
                                    <tr role="row">
                                        <th class="sorting_asc" tabindex="0" aria-controls="datatable-buttons"
                                            rowspan="1" colspan="1" aria-sort="ascending">ID
                                        </th>
                                        <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1"
                                            colspan="1">
                                            Ride Ops report
                                        </th>
                                        <th class="sorting" tabin dex="0" aria-controls="datatable-buttons" rowspan="1"
                                            colspan="1">
                                            Answer
                                        </th>
                                        <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1"
                                            colspan="1">
                                            Comment
                                        </th>
                                    </tr>
                                </thead>
            @include('admin.reports.show')
        </div>

        <div id="Health" class="tab-pane fade">
        <form action="{{url('/search_health_and_safety')}}" method="GET">
            @csrf
            @include('admin.reports.form')
            {!!Form::close() !!}
            <div id="datatable-buttons_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                    <div class="row">
                        <div class="col-sm-12">
                            <table id="datatable-buttons"
                                class="table table-striped table-bordered dt-responsive nowrap">
                                <thead>
                                    <tr role="row">
                                        <th class="sorting_asc" tabindex="0" aria-controls="datatable-buttons"
                                            rowspan="1" colspan="1" aria-sort="ascending">ID
                                        </th>
                                        <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1"
                                            colspan="1">
                                            Health & Safety report
                                        </th>
                                        <th class="sorting" tabin dex="0" aria-controls="datatable-buttons" rowspan="1"
                                            colspan="1">
                                            Answer
                                        </th>
                                        <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1"
                                            colspan="1">
                                            Comment
                                        </th>
                                    </tr>
                                </thead>
            @include('admin.reports.show')
        </div>

        <div id="Maintenance" class="tab-pane fade">
        <form action="{{url('/search_maintenance_reports')}}" method="GET">
            @csrf
            @include('admin.reports.form')
            {!!Form::close() !!}
            <div id="datatable-buttons_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                    <div class="row">
                        <div class="col-sm-12">
                            <table id="datatable-buttons"
                                class="table table-striped table-bordered dt-responsive nowrap">
                                <thead>
                                    <tr role="row">
                                        <th class="sorting_asc" tabindex="0" aria-controls="datatable-buttons"
                                            rowspan="1" colspan="1" aria-sort="ascending">ID
                                        </th>
                                        <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1"
                                            colspan="1">
                                            Maintenance report
                                        </th>
                                        <th class="sorting" tabin dex="0" aria-controls="datatable-buttons" rowspan="1"
                                            colspan="1">
                                            Answer
                                        </th>
                                        <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1"
                                            colspan="1">
                                            Comment
                                        </th>
                                    </tr>
                                </thead>
            @include('admin.reports.show')
        </div>

        <div id="Teachnical" class="tab-pane fade">
        <form action="{{url('/search_tech_reports')}}" method="GET">
            @csrf
            @include('admin.reports.form')
            {!!Form::close() !!}
            <div id="datatable-buttons_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                    <div class="row">
                        <div class="col-sm-12">
                            <table id="datatable-buttons"
                                class="table table-striped table-bordered dt-responsive nowrap">
                                <thead>
                                    <tr role="row">
                                        <th class="sorting_asc" tabindex="0" aria-controls="datatable-buttons"
                                            rowspan="1" colspan="1" aria-sort="ascending">ID
                                        </th>
                                        <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1"
                                            colspan="1">
                                            Technical report
                                        </th>
                                        <th class="sorting" tabin dex="0" aria-controls="datatable-buttons" rowspan="1"
                                            colspan="1">
                                            Answer
                                        </th>
                                        <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1"
                                            colspan="1">
                                            Comment
                                        </th>
                                    </tr>
                                </thead>
            @include('admin.reports.show')
        </div>

        <div id="Skill" class="tab-pane fade">
        <form action="{{url('/search_skill_game_reports')}}" method="GET">
            @csrf
            @include('admin.reports.form')
            {!!Form::close() !!}
            <div id="datatable-buttons_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                    <div class="row">
                        <div class="col-sm-12">
                            <table id="datatable-buttons"
                                class="table table-striped table-bordered dt-responsive nowrap">
                                <thead>
                                    <tr role="row">
                                        <th class="sorting_asc" tabindex="0" aria-controls="datatable-buttons"
                                            rowspan="1" colspan="1" aria-sort="ascending">ID
                                        </th>
                                        <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1"
                                            colspan="1">
                                           Skill Games report
                                        </th>
                                        <th class="sorting" tabin dex="0" aria-controls="datatable-buttons" rowspan="1"
                                            colspan="1">
                                            Answer
                                        </th>
                                        <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1"
                                            colspan="1">
                                            Comment
                                        </th>
                                    </tr>
                                </thead>
            @include('admin.reports.show')
        </div>

        <div id="Duty" class="tab-pane fade">
            <h3>Menu 6</h3>
            <p>Some content in menu 6.</p>
        </div>
    </div>
</div>

@endsection

@section('footer')
@include('admin.datatable.scripts')
@endsection
