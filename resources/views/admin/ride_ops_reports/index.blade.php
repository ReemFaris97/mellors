@extends('admin.layout.app')

@section('title')
Health And Safety Reports
@endsection

@section('content')



<div class="card-box">
    <ul class="nav nav-tabs tabsLinkDuty">
        <li class="active"><a data-toggle="tab" href="#Health">Health & safety</a></li>
        <li><a data-toggle="tab" href="#Ride"> Ride Ops</a></li>
        <li><a data-toggle="tab" href="#Maintenance"> Maintenance</a></li>
        <li><a data-toggle="tab" href="#Teachnical"> Teachnical Services</a></li>
        <li><a data-toggle="tab" href="#Skill"> Skill Games</a></li>
        <li><a data-toggle="tab" href="#Duty"> Duty Summary</a></li>
    </ul>

    <div class="tab-content tabsContentDuty">
        <div id="Health" class="tab-pane fade in active">
            <h3>HOME</h3>
            <p>Some content.</p>
        </div>
        <div id="Ride" class="tab-pane fade">
            <h3>Menu 2</h3>
            <p>Some content in menu 2.</p>
        </div>
        <div id="Maintenance" class="tab-pane fade">
            <h3>Menu 3</h3>
            <p>Some content in menu 2.</p>
        </div>
        <div id="Teachnical" class="tab-pane fade">
            <h3>Menu 4</h3>
            <p>Some content in menu 4.</p>
        </div>
        <div id="Skill" class="tab-pane fade">
            <h3>Menu 5</h3>
            <p>Some content in menu 5.</p>
        </div>
        <div id="Duty" class="tab-pane fade">
            <h3>Menu 6</h3>
            <p>Some content in menu 6.</p>
        </div>
    </div>



    @endsection

    @section('footer')
    @include('admin.datatable.scripts')
    @endsection