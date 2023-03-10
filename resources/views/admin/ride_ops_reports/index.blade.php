@extends('admin.layout.app')

@section('title')
Ride Ops Reports
@endsection

@section('content')



<div class="card-box">
    <ul class="nav nav-tabs tabsLinkDuty">
        <li class="active"><a data-toggle="tab" href="#Ride"> Ride Ops</a></li>
        <li><a data-toggle="tab" href="#Health">Health & safety</a></li>
        <li><a data-toggle="tab" href="#Maintenance"> Maintenance</a></li>
        <li><a data-toggle="tab" href="#Teachnical"> Teachnical Services</a></li>
        <li><a data-toggle="tab" href="#Skill"> Skill Games</a></li>
        <li><a data-toggle="tab" href="#Duty"> Duty Summary</a></li>
    </ul>

    <div class="tab-content tabsContentDuty">
        <div id="Ride" class="tab-pane fade in active">
            <form action="{{url('/search_ride_ops_reports')}}" method="GET">

                @csrf

                <div class="form-group">
                    <label for="last_name">Select Park</label>
                    {!! Form::select('park_id',$parks,null, array('class' => 'form-control')) !!}
                </div>
                <div class="form-group">
                    <label for="middle_name">Date </label>
                    {!! Form::date('date',null,['class'=>'form-control','id'=>'date']) !!}
                </div>
                <div class="col-xs-12">
                    <div class="input-group-btn">
                        <button type="submit" class="btn btn-primary save_btn waves-effect">Show</button>
                    </div>
                </div>
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

                                        {{--<th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1">--}}
                                        {{--Process--}}
                                        {{--</th>--}}
                                    </tr>
                                </thead>

                                <tbody>
                                    @if(isset($items))

                                    @foreach ($items as $item)
                                    <tr role="row" class="odd" id="row-{{ $item->id }}">
                                        <td tabindex="0" class="sorting_1">{{ $item->id }}</td>
                                        <td>{{ $item->question }}</td>
                                        <td>@if($item->answer == "yes")
                                            <label style="background-color: aquamarine;">Yes</label>
                                            @elseif($item->answer == "no")
                                            <label style="background-color: red; font-weight: bold;">No</label>
                                            @else
                                            {{ $item->answer }}
                                            @endif
                                        </td>
                                        @forelse($items as $item)
                                        <td>{{$item->user->name}}
                                            @break
                                        </td>
                                        @empty
                                        <td>Not found</td>
                                        @endforelse
                                    </tr>

                                    @endforeach
                                <tfoot>
                                    <tr role="row" class="odd" id="row-{{ 1 }}">
                                        <td tabindex="0" class="sorting_1">{{ 1}}</td>
                                        <td> Completed By
                                        </td>
                                        @forelse($items as $item)
                                        <td>{{$item->user->name}}
                                            @break
                                        </td>
                                        @empty
                                        <td>Not found</td>
                                        @endforelse
                                    </tr>
                                </tfoot>
                                @endif
                                </tbody>
                            </table>


                        </div>
                    </div>

                </div>

        </div>
        <div id="Health" class="tab-pane fade">
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

</div>

@endsection

@section('footer')
@include('admin.datatable.scripts')
@endsection