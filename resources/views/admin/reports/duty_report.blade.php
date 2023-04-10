@extends('admin.layout.app')
@section('title')
Duty Report
@endsection
@section('content')
<div class="card-box ">
    <ul class="nav nav-tabs tabsLinkDuty">
        <li class="{{ (request()->is('search_ride_ops_reports*')) ? 'active' : '' }}"><a data-toggle="tab"
                href="#Ride">Ride Ops</a></li>
        <li class="{{ (request()->is('search_health_and_safety*')) ? 'active' : '' }}"><a data-toggle="tab"
                href="#Health">Health & safety </a></li>
        <li class="{{ (request()->is('search_maintenance_reports*')) ? 'active' : '' }}"><a data-toggle="tab"
                href="#Maintenance"> Maintenance</a></li>
        <li class="{{ (request()->is('search_tech_reports*')) ? 'active' : '' }}"><a data-toggle="tab"
                href="#Teachnical"> Teachnical Services</a></li>
        <li class="{{ (request()->is('search_skill_game_reports*')) ? 'active' : '' }}"><a data-toggle="tab"
                href="#Skill"> Skill Games</a></li>
        <li class="{{ (request()->is('search_duty_summary_reports*')) ? 'active' : '' }}"><a data-toggle="tab"
                href="#Duty"> Duty Summary</a></li>
    </ul>

    <div class="tab-content tabsContentDuty">
        <div id="Ride" class="tab-pane fade in active">
            <form class="formSection" action="{{url('/search_ride_ops_reports')}}" method="GET">
                @csrf
                @include('admin.reports.form')
            </form>
            @include('admin.reports.show')
        </div>

        <div id="Health" class="tab-pane fade">
            <form class="formSection" action="{{url('/search_health_and_safety')}}" method="GET">
                @csrf
                @include('admin.reports.form')
                {!!Form::close() !!}
                @include('admin.reports.show')
        </div>

        <div id="Maintenance" class="tab-pane fade">
            <form class="formSection" action="{{url('/search_maintenance_reports')}}" method="GET">
                @csrf
                @include('admin.reports.form')
                {!!Form::close() !!}
                @include('admin.reports.show')
        </div>

        <div id="Teachnical" class="tab-pane fade">
            <form class="formSection" action="{{url('/search_tech_reports')}}" method="GET">
                @csrf
                @include('admin.reports.form')
                {!!Form::close() !!}
                @include('admin.reports.show')
        </div>

        <div id="Skill" class="tab-pane fade">
            <form class="formSection" action="{{url('/search_skill_game_reports')}}" method="GET">
                @csrf
                @include('admin.reports.form')
                {!!Form::close() !!}
                @include('admin.reports.show')
        </div>

        <div id="Duty" class="tab-pane fade">
            <form class="formSection" action="{{url('/search_duty_summary_reports')}}" method="GET">
                @csrf
                @include('admin.reports.form')
                {!!Form::close() !!}
                @include('admin.reports.summery')
        </div>
    </div>
</div>

@endsection

@section('footer')
@include('admin.datatable.scripts')
@endsection