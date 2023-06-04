@if(request()->is('search_duty_summary_reports*'))
@include('admin.reports.summery')
@else

<div id="datatable-buttons_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
    <div class="row">
        <div class="col-sm-12">
            <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap">
                <thead>
                    <tr role="row">
                        <th class="sorting_asc" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1"
                            aria-sort="ascending">ID
                        </th>
                        <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1">
                            @if(request()->is('search_ride_ops_reports*'))
                            Ride Ops report
                            @elseif(request()->is('search_health_and_safety*'))
                            Health & Safety report
                            @elseif(request()->is('search_maintenance_reports*'))
                            Maintenance report
                            @elseif(request()->is('search_tech_reports*'))
                            Technical report
                            @elseif(request()->is('search_skill_game_reports*'))
                            Skill Games report
                            @endif

                        </th>
                        <th class="sorting" tabin dex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1">
                            Answer
                        </th>
                        <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1">
                            Comment
                        </th>
                    </tr>
                </thead>

                <tbody>
                    @if(isset($tech))
                    <tr role="row" class="odd" id="row-{{1}}">
                        <td tabindex="0" class="sorting_1">{{1 }}</td>
                        <td>{{$tech['a']->question ?? '  ' ?? '' }}</td>
                        <td class="{{($tech['a']->answer ?? '  '  == 'yes') ? 'yes' : 'no'}} align-center" >
                            {{ $tech['a']->answer ?? '  '  ?? '' }}
                        </td>
                        <td>{!!$tech['a']->comment ?? '  '   ?? '' !!}</td>
                    </tr>
                    <tr role="row" class="odd" id="row-{{2}}">
                        <td tabindex="0" class="sorting_1">{{2}}</td>
                        <td>{{$tech['b']->question ?? '  ' }}</td>
                        <td class=" align-center" >
                            {{ $tech['b']->answer ?? '  '  }}
                        </td>
                        <td>{!!$tech['b']->comment ?? '  '  !!}</td>
                    </tr>
                    <tr role="row" class="odd" id="row-{{3}}">
                        <td tabindex="0" class="sorting_1">{{3 }}</td>
                        <td>{{$tech['c']->question ?? '  ' }}</td>
                        <td class="{{($tech['c']->answer ?? '  '  == '0') ? 'yes' : 'no'}} align-center" >
                            {{ $tech['c']->answer ?? '  '  }}
                        </td>
                        <td>{!!$tech['c']->comment ?? '  '  !!}</td>
                    </tr>
                    <tr role="row" class="odd" id="row-{{4}}">
                        <td tabindex="0" class="sorting_1">{{4}}</td>
                        <td>{{$tech['d']->question ?? '  ' }}</td>
                        <td class=" align-center" >
                            {{ $tech['d']->answer ?? '  '  }}
                        </td>
                        <td>{!!$tech['d']->comment ?? '  '  !!}</td>
                    </tr>
                    <tr role="row" class="odd" id="row-{{5}}">
                        <td tabindex="0" class="sorting_1">{{5}}</td>
                        <td>{{$tech['e']->question ?? '  ' }}</td>
                        <td class=" align-center" >
                            {{ $tech['e']->answer ?? '  '  }}
                        </td>
                        <td>{!!$tech['e']->comment ?? '  '  !!}</td>
                    </tr>
                    <tr role="row" class="odd" id="row-{{6}}">
                        <td tabindex="0" class="sorting_1">{{6}}</td>
                        <td>{{$tech['f']->question ?? '  ' }}</td>
                        <td class=" align-center" >
                            {{ $tech['f']->answer ?? '  '  }}
                        </td>
                        <td>{!!$tech['f']->comment ?? '  '  !!}</td>
                    </tr>
                    <tr role="row" class="odd" id="row-{{7}}">
                        <td tabindex="0" class="sorting_1">{{7}}</td>
                        <td>{{$tech['g']->question ?? '  ' }}</td>
                        <td class=" align-center" >
                            {{ $tech['g']->answer ?? '  '  }}
                        </td>
                        <td>{!!$tech['g']->comment ?? '  '  !!}</td>
                    </tr>

                    <tr role="row" class="odd" id="row-{{8}}">
                        <td tabindex="0" class="sorting_1">{{8}}</td>
                        <td>Completed By</td>
                        <td class=" align-center" >
                        {{$tech['a']->user->name ?? '  ' }}
                        </td>
                        <td></td>
                    </tr>
                    @endif
                    @if(isset($skillgame))
                    <tr role="row" class="odd" id="row-{{1}}">
                        <td tabindex="0" class="sorting_1">{{1 }}</td>
                        <td>{{$skillgame['a']->question ?? '  ' }}</td>
                        <td class="{{($skillgame['a']->answer ?? '  '  == 'no') ? 'yes' : 'no'}} align-center" >
                            {{ $skillgame['a']->answer ?? '  '  }}
                        </td>
                        <td>{!!$skillgame['a']->comment ?? '  '  !!}</td>
                    </tr>
                    <tr role="row" class="odd" id="row-{{2}}">
                        <td tabindex="0" class="sorting_1">{{2}}</td>
                        <td>{{$skillgame['b']->question ?? '  ' }}</td>
                        <td class=" align-center" >
                            {{ $skillgame['b']->answer ?? '  '  }}
                        </td>
                        <td>{!!$skillgame['b']->comment ?? '  '  !!}</td>
                    </tr>
                    <tr role="row" class="odd" id="row-{{3}}">
                        <td tabindex="0" class="sorting_1">{{3 }}</td>
                        <td>{{$skillgame['c']->question ?? '  ' }}</td>
                        <td class="{{($skillgame['c']->answer ?? '  '  == 'no') ? 'yes' : 'no'}} align-center" >
                            {{ $skillgame['c']->answer ?? '  '  }}
                        </td>
                        <td>{!!$skillgame['c']->comment ?? '  '  !!}</td>
                    </tr>
                    <tr role="row" class="odd" id="row-{{4}}">
                        <td tabindex="0" class="sorting_1">{{4}}</td>
                        <td>{{$skillgame['d']->question ?? '  ' }}</td>
                        <td class="{{($skillgame['d']->answer ?? '  '  == 'no') ? 'yes' : 'no'}} align-center" >
                            {{ $skillgame['d']->answer ?? '  '  }}
                        </td>
                        <td>{!!$skillgame['d']->comment ?? '  '  !!}</td>
                    </tr>
                    <tr role="row" class="odd" id="row-{{5}}">
                        <td tabindex="0" class="sorting_1">{{5}}</td>
                        <td>{{$skillgame['e']->question ?? '  ' }}</td>
                        <td class="{{($skillgame['e']->answer ?? '  '  == 'no') ? 'yes' : 'no'}} align-center" >
                            {{ $skillgame['e']->answer ?? '  '  }}
                        </td>
                        <td>{!!$skillgame['e']->comment ?? '  '  !!}</td>
                    </tr>
                    <tr role="row" class="odd" id="row-{{6}}">
                        <td tabindex="0" class="sorting_1">{{6}}</td>
                        <td>{{$skillgame['f']->question ?? '  ' }}</td>
                        <td class="{{($skillgame['f']->answer ?? '  '  == 'no') ? 'yes' : 'no'}} align-center" >
                            {{ $skillgame['f']->answer ?? '  '  }}
                        </td>
                        <td>{!!$skillgame['f']->comment ?? '  '  !!}</td>
                    </tr>
                    <tr role="row" class="odd" id="row-{{7}}">
                        <td tabindex="0" class="sorting_1">{{7}}</td>
                        <td>{{$skillgame['g']->question ?? '  ' }}</td>
                        <td class=" align-center" >
                            {{ $skillgame['g']->answer ?? '  '  }}
                        </td>
                        <td>{!!$skillgame['g']->comment ?? '  '  !!}</td>
                    </tr>
                    <tr role="row" class="odd" id="row-{{8}}">
                        <td tabindex="0" class="sorting_1">{{8}}</td>
                        <td>{{$skillgame['h']->question ?? '  ' }}</td>
                        <td class="{{($skillgame['h']->answer ?? '  '  == 'no') ? 'yes' : 'no'}} align-center" >
                            {{ $skillgame['h']->answer ?? '  '  }}
                        </td>
                        <td>{!!$skillgame['h']->comment ?? '  '  !!}</td>
                    </tr>
                    <tr role="row" class="odd" id="row-{{9}}">
                        <td tabindex="0" class="sorting_1">{{9}}</td>
                        <td>{{$skillgame['i']->question ?? '  ' }}</td>
                        <td class=" align-center" >
                            {{ $skillgame['i']->answer ?? '  '  }}
                        </td>
                        <td>{!!$skillgame['i']->comment ?? '  '  !!}</td>
                    </tr>
                    <tr role="row" class="odd" id="row-{{10}}">
                        <td tabindex="0" class="sorting_1">{{10}}</td>
                        <td>{{$skillgame['j']->question ?? '  ' }}</td>
                        <td class="{{($skillgame['j']->answer ?? '  '  == 'no') ? 'yes' : 'no'}} align-center" >
                            {{ $skillgame['j']->answer ?? '  '  }}
                        </td>
                        <td>{!!$skillgame['j']->comment ?? '  '  !!}</td>
                    </tr>
                    <tr role="row" class="odd" id="row-{{11}}">
                        <td tabindex="0" class="sorting_1">{{11}}</td>
                        <td>{{$skillgame['k']->question ?? '  ' }}</td>
                        <td class=" align-center" >
                            {{ $skillgame['k']->answer ?? '  '  }}
                        </td>
                        <td>{!!$skillgame['k']->comment ?? '  '  !!}</td>
                    </tr>
                    <tr role="row" class="odd" id="row-{{12}}">
                        <td tabindex="0" class="sorting_1">{{12}}</td>
                        <td>{{$skillgame['l']->question ?? '  ' }}</td>
                        <td class="{{($skillgame['l']->answer ?? '  '  == 'no') ? 'yes' : 'no'}} align-center" >
                            {{ $skillgame['l']->answer ?? '  '  }}
                        </td>
                        <td>{!!$skillgame['l']->comment ?? '  '  !!}</td>
                    </tr>
                    <tr role="row" class="odd" id="row-{{13}}">
                        <td tabindex="0" class="sorting_1">{{13}}</td>
                        <td>{{$skillgame['m']->question ?? '  ' }}</td>
                        <td class="{{($skillgame['m']->answer ?? '  '  == 'no') ? 'yes' : 'no'}} align-center" >
                            {{ $skillgame['m']->answer ?? '  '  }}
                        </td>
                        <td>{!!$skillgame['m']->comment ?? '  '  !!}</td>
                    </tr>
                    <tr role="row" class="odd" id="row-{{14}}">
                        <td tabindex="0" class="sorting_1">{{14}}</td>
                        <td>Completed By</td>
                        <td class=" align-center" >
                        {{$skillgame['a']->user->name ?? '  ' }}
                        </td>
                        <td></td>
                    </tr>
                   @endif

                   @if(isset($rideops))
                    <tr role="row" class="odd" id="row-{{1}}">
                        <td tabindex="0" class="sorting_1">{{1 }}</td>
                        <td>{{$rideops['a']->question ?? ''}}</td>
                        <td class="{{($rideops['a']->answer ?? '  '  == 'no') ? 'no' : 'yes'}} align-center" >
                            {{ $rideops['a']->answer ?? '  '  ?? '' }}
                        </td>
                        <td>{!!$rideops['a']->comment ?? '  '  ?? '' !!}</td>
                    </tr>
                    <tr role="row" class="odd" id="row-{{2}}">
                        <td tabindex="0" class="sorting_1">{{2}}</td>
                        <td>{{$rideops['b']->question ?? ''}}</td>
                        <td class=" align-center" >
                            {{ $rideops['b']->answer ?? '  '  ?? '' }}
                        </td>
                        <td>{!!$rideops['b']->comment ?? '  '   ?? '' !!}</td>
                    </tr>
                    <tr role="row" class="odd" id="row-{{3}}">
                        <td tabindex="0" class="sorting_1">{{3 }}</td>
                        <td>{{$rideops['c']->question ?? '' }}</td>
                        <td class="{{($rideops['c']->answer ?? '  '  == 'no') ? 'yes' : 'no'}} align-center" >
                            {{ $rideops['c']->answer ?? '  '   ?? ''}}
                        </td>
                        <td>{!!$rideops['c']->comment ?? '  '   ?? '' !!}</td>
                    </tr>
                    <tr role="row" class="odd" id="row-{{4}}">
                        <td tabindex="0" class="sorting_1">{{4}}</td>
                        <td>{{$rideops['d']->question ?? '' }}</td>
                        <td class="{{($rideops['d']->answer ?? '  '  == 'no') ? 'yes' : 'no'}} align-center" >
                            {{ $rideops['d']->answer ?? '  '   ?? ''}}
                        </td>
                        <td>{!!$rideops['d']->comment ?? '  '   ?? ''!!}</td>
                    </tr>
                    <tr role="row" class="odd" id="row-{{5}}">
                        <td tabindex="0" class="sorting_1">{{5}}</td>
                        <td>{{$rideops['e']->question ?? ''}}</td>
                        <td class="{{($rideops['e']->answer ?? '  '  == 'no') ? 'yes' : 'no'}} align-center" >
                            {{ $rideops['e']->answer ?? '  '   ?? ''}}
                        </td>
                        <td>{!!$rideops['e']->comment ?? '  '  ?? '' !!}</td>
                    </tr>
                    <tr role="row" class="odd" id="row-{{6}}">
                        <td tabindex="0" class="sorting_1">{{6}}</td>
                        <td>{{$rideops['f']->question?? '' }}</td>
                        <td class="{{($rideops['f']->answer ?? '  '  == 'no') ? 'yes' : 'no'}} align-center" >
                            {{ $rideops['f']->answer ?? '  '   ?? '' }}
                        </td>
                        <td>{!!$rideops['f']->comment ?? '  '   ?? '' !!}</td>
                    </tr>
                    <tr role="row" class="odd" id="row-{{7}}">
                        <td tabindex="0" class="sorting_1">{{7}}</td>
                        <td>{{$rideops['g']->question ?? ''}}</td>
                        <td class=" align-center" >
                            {{ $rideops['g']->answer ?? '  '   ?? '' }}
                        </td>
                        <td>{!!$rideops['g']->comment ?? '  '   ?? '' !!}</td>
                    </tr>
                    <tr role="row" class="odd" id="row-{{8}}">
                        <td tabindex="0" class="sorting_1">{{8}}</td>
                        <td>{{$rideops['h']->question?? '  ' }}</td>
                        <td class="align-center" >
                            {{ $rideops['h']->answer ?? '  '  }}
                        </td>
                        <td>{!!$rideops['h']->comment ?? '  '  !!}</td>
                    </tr>
                    <tr role="row" class="odd" id="row-{{9}}">
                        <td tabindex="0" class="sorting_1">{{9}}</td>
                        <td>{{$rideops['i']->question ?? '  ' }}</td>
                        <td class=" align-center" >
                            {{ $rideops['i']->answer ?? '  '  }}
                        </td>
                        <td>{!!$rideops['i']->comment ?? '  '  !!}</td>
                    </tr>
                    <tr role="row" class="odd" id="row-{{10}}">
                        <td tabindex="0" class="sorting_1">{{10}}</td>
                        <td>{{$rideops['j']->question ?? '  ' }}</td>
                        <td class=" align-center" >
                            {{ $rideops['j']->answer ?? '  '  }}
                        </td>
                        <td>{!!$rideops['j']->comment ?? '  '  !!}</td>
                    </tr>
                    <tr role="row" class="odd" id="row-{{11}}">
                        <td tabindex="0" class="sorting_1">{{11}}</td>
                        <td>{{$rideops['k']->question ?? '  ' }}</td>
                        <td class=" align-center" >
                            {{ $rideops['k']->answer ?? '  '  }}
                        </td>
                        <td>{!!$rideops['k']->comment ?? '  '  !!}</td>
                    </tr>
                    <tr role="row" class="odd" id="row-{{12}}">
                        <td tabindex="0" class="sorting_1">{{12}}</td>
                        <td>{{$rideops['l']->question ?? '  ' }}</td>
                        <td class=" align-center" >
                            {{ $rideops['l']->answer ?? '  '  }}
                        </td>
                        <td>{!!$rideops['l']->comment ?? '  '  !!}</td>
                    </tr>
                    
                    <tr role="row" class="odd" id="row-{{13}}">
                        <td tabindex="0" class="sorting_1">{{13}}</td>
                        <td>Completed By</td>
                        <td class=" align-center" >
                        {{$rideops['a']->user->name ?? '  ' }}
                        </td>
                        <td></td>
                    </tr>
                   @endif
                
                   @if(isset($maintenance))
                   
                   <tr role="row" class="odd" id="row-{{1}}">
                        <td tabindex="0" class="sorting_1">{{1 }}</td>
                        <td>{{$maintenance['a']->question ?? '  ' }}</td>
                        <td class="{{($maintenance['a']->answer ?? '  '  == 'yes') ? 'yes' : 'no'}} align-center" >
                            {{ $maintenance['a']->answer ?? '  '  }}
                        </td>
                        <td>{!!$maintenance['a']->comment ?? '  '  !!}</td>
                    </tr>
                    <tr role="row" class="odd" id="row-{{2}}">
                        <td tabindex="0" class="sorting_1">{{2}}</td>
                        <td>{{$maintenance['b']->question ?? '  ' }}</td>
                        <td class="{{($maintenance['b']->answer ?? '  '  == 'yes') ? 'no' : 'yes'}} align-center" >
                            {{ $maintenance['b']->answer ?? '  '  }}
                        </td>
                        <td>{!!$maintenance['b']->comment ?? '  '  !!}</td>
                    </tr>
                    <tr role="row" class="odd" id="row-{{3}}">
                        <td tabindex="0" class="sorting_1">{{3 }}</td>
                        <td>{{$maintenance['c']->question ?? '  ' }}</td>
                        <td class="{{($maintenance['c']->answer ?? '  '  == 'yes') ? 'no' : 'yes'}} align-center" >
                            {{ $maintenance['c']->answer ?? '  '  }}
                        </td>
                        <td>{!!$maintenance['c']->comment ?? '  '  !!}</td>
                    </tr>
                    <tr role="row" class="odd" id="row-{{4}}">
                        <td tabindex="0" class="sorting_1">{{4}}</td>
                        <td>{{$maintenance['d']->question ?? '  ' }}</td>
                        <td class="{{($maintenance['d']->answer ?? '  '  == 'yes') ? 'no' : 'yes'}} align-center" >
                            {{ $maintenance['d']->answer ?? '  '  }}
                        </td>
                        <td>{!!$maintenance['d']->comment ?? '  '  !!}</td>
                    </tr>
                    <tr role="row" class="odd" id="row-{{5}}">
                        <td tabindex="0" class="sorting_1">{{5}}</td>
                        <td>{{$maintenance['e']->question ?? '  ' }}</td>
                        <td class="{{($maintenance['e']->answer ?? '  '  == 'yes') ? 'no' : 'yes'}} align-center" >
                            {{ $maintenance['e']->answer ?? '  '  }}
                        </td>
                        <td>{!!$maintenance['e']->comment ?? '  '  !!}</td>
                    </tr>
                    <tr role="row" class="odd" id="row-{{6}}">
                        <td tabindex="0" class="sorting_1">{{6}}</td>
                        <td>{{$maintenance['f']->question ?? '  ' }}</td>
                        <td class="{{($maintenance['f']->answer ?? '  '  == 'yes') ? 'no' : 'yes'}} align-center" >
                            {{ $maintenance['f']->answer ?? '  '  }}
                        </td>
                        <td>{!!$maintenance['f']->comment ?? '  '  !!}</td>
                    </tr>

                   @endif
                   @if(isset($health))
                    <tr role="row" class="odd" id="row-{{1}}">
                        <td tabindex="0" class="sorting_1">{{1 }}</td>
                        <td>{{$health['a']->question ?? '  ' }}</td>
                        <td class="align-center" >
                            {{ $health['a']->answer ?? '  '  }}
                        </td>
                        <td>{!!$health['a']->comment ?? '  '  !!}</td>
                    </tr>
                    <tr role="row" class="odd" id="row-{{2}}">
                        <td tabindex="0" class="sorting_1">{{2}}</td>
                        <td>{{$health['b']->question ?? '  ' }}</td>
                        <td class=" align-center" >
                            {{ $health['b']->answer ?? '  '  }}
                        </td>
                        <td>{!!$health['b']->comment ?? '  '  !!}</td>
                    </tr>
                    <tr role="row" class="odd" id="row-{{3}}">
                        <td tabindex="0" class="sorting_1">{{3 }}</td>
                        <td>{{$health['c']->question ?? '  ' }}</td>
                        <td class=" align-center" >
                            {{ $health['c']->answer ?? '  '  }}
                        </td>
                        <td>{!!$health['c']->comment ?? '  '  !!}</td>
                    </tr>
                    <tr role="row" class="odd" id="row-{{4}}">
                        <td tabindex="0" class="sorting_1">{{4}}</td>
                        <td>{{$health['d']->question ?? '  ' }}</td>
                        <td class="{{($health['d']->answer ?? '  '  == 'no') ? 'yes' : 'no'}} align-center" >
                            {{ $health['d']->answer ?? '  '  }}
                        </td>
                        <td>{!!$health['d']->comment ?? '  '  !!}</td>
                    </tr>
                    <tr role="row" class="odd" id="row-{{5}}">
                        <td tabindex="0" class="sorting_1">{{5}}</td>
                        <td>{{$health['e']->question ?? '  ' }}</td>
                        <td class="{{($health['e']->answer ?? '  '  == 'no') ? 'yes' : 'no'}} align-center" >
                            {{ $health['e']->answer ?? '  '  }}
                        </td>
                        <td>{!!$health['e']->comment ?? '  '  !!}</td>
                    </tr>
                    <tr role="row" class="odd" id="row-{{6}}">
                        <td tabindex="0" class="sorting_1">{{6}}</td>
                        <td>{{$health['f']->question ?? '  ' }}</td>
                        <td class="{{($health['f']->answer ?? '  '  == 'no') ? 'yes' : 'no'}} align-center" >
                            {{ $health['f']->answer ?? '  '  }}
                        </td>
                        <td>{!!$health['f']->comment ?? '  '  !!}</td>
                    </tr>
                    <tr role="row" class="odd" id="row-{{7}}">
                        <td tabindex="0" class="sorting_1">{{7}}</td>
                        <td>{{$health['g']->question ?? '  ' }}</td>
                        <td class="{{($health['g']->answer ?? '  '  == 'no') ? 'yes' : 'no'}} align-center" >
                            {{ $health['g']->answer ?? '  '  }}
                        </td>
                        <td>{!!$health['g']->comment ?? '  '  !!}</td>
                    </tr>
                    <tr role="row" class="odd" id="row-{{8}}">
                        <td tabindex="0" class="sorting_1">{{8}}</td>
                        <td>{{$health['h']->question ?? '  ' }}</td>
                        <td class="{{($health['h']->answer ?? '  '  == 'no') ? 'yes' : 'no'}} align-center" >
                            {{ $health['h']->answer ?? '  '  }}
                        </td>
                        <td>{!!$health['h']->comment ?? '  '  !!}</td>
                    </tr>
                    <tr role="row" class="odd" id="row-{{9}}">
                        <td tabindex="0" class="sorting_1">{{9}}</td>
                        <td>{{$health['i']->question ?? '  ' }}</td>
                        <td class="{{($health['i']->answer ?? '  '  == 'no') ? 'yes' : 'no'}} align-center" >
                            {{ $health['i']->answer ?? '  '  }}
                        </td>
                        <td>{!!$health['i']->comment ?? '  '  !!}</td>
                    </tr>
                    <tr role="row" class="odd" id="row-{{10}}">
                        <td tabindex="0" class="sorting_1">{{10}}</td>
                        <td>{{$health['j']->question ?? '  ' }}</td>
                        <td class="{{($health['j']->answer ?? '  '  == 'no') ? 'no' : 'yes'}} align-center" >
                            {{ $health['j']->answer ?? '  '  }}
                        </td>
                        <td>{!!$health['j']->comment ?? '  '  !!}</td>
                    </tr>
                    <tr role="row" class="odd" id="row-{{11}}">
                        <td tabindex="0" class="sorting_1">{{11}}</td>
                        <td>{{$health['k']->question ?? '  ' }}</td>
                        <td class="{{($health['k']->answer ?? '  '  == 'no') ? 'yes' : 'no'}} align-center" >
                            {{ $health['k']->answer ?? '  '  }}
                        </td>
                        <td>{!!$health['k']->comment ?? '  '  !!}</td>
                    </tr>
                    <tr role="row" class="odd" id="row-{{12}}">
                        <td tabindex="0" class="sorting_1">{{12}}</td>
                        <td>{{$health['l']->question ?? '  ' }}</td>
                        <td class="{{($health['l']->answer ?? '  '  == 'no') ? 'yes' : 'no'}} align-center" >
                            {{ $health['l']->answer ?? '  '  }}
                        </td>
                        <td>{!!$health['l']->comment ?? '  '  !!}</td>
                    </tr>
                    <tr role="row" class="odd" id="row-{{13}}">
                        <td tabindex="0" class="sorting_1">{{13}}</td>
                        <td>{{$health['m']->question ?? '  ' }}</td>
                        <td class="{{($health['m']->answer ?? '  '  == 'no') ? 'yes' : 'no'}} align-center" >
                            {{ $health['m']->answer ?? '  '  }}
                        </td>
                        <td>{!!$health['m']->comment ?? '  '  !!}</td>
                    </tr>
                    <tr role="row" class="odd" id="row-{{14}}">
                        <td tabindex="0" class="sorting_1">{{14}}</td>
                        <td>{{$health['n']->question ?? '  ' }}</td>
                        <td class=" align-center" >
                            {{ $health['n']->answer ?? '  '  }}
                        </td>
                        <td>{!!$health['n']->comment ?? '  '  !!}</td>
                    </tr>
                    <tr role="row" class="odd" id="row-{{15}}">
                        <td tabindex="0" class="sorting_1">{{15}}</td>
                        <td>{{$health['o']->question ?? '  ' }}</td>
                        <td class=" align-center" >
                            {{ $health['o']->answer ?? '  '  }}
                        </td>
                        <td>{!!$health['o']->comment ?? '  '  !!}</td>
                    </tr>
                    <tr role="row" class="odd" id="row-{{16}}">
                        <td tabindex="0" class="sorting_1">{{16}}</td>
                        <td>{{$health['p']->question ?? '  ' }}</td>
                        <td class="{{($health['m']->answer ?? '  '  == 'yes') ? 'yes' : 'no'}} align-center" >
                            {{ $health['p']->answer ?? '  '  }}
                        </td>
                        <td>{!!$health['p']->comment ?? '  '  !!}</td>
                    </tr>
                  
                    <tr role="row" class="odd" id="row-{{17}}">
                        <td tabindex="0" class="sorting_1">{{17}}</td>
                        <td>{{$health['q']->question ?? '  ' }}</td>
                        <td class="{{($health['q']->answer ?? '  '  == 'yes') ? 'yes' : 'no'}} align-center" >
                            {{ $health['q']->answer ?? '  '  }}
                        </td>
                        <td>{!!$health['q']->comment ?? '  '  !!}</td>
                    </tr>
                    <tr role="row" class="odd" id="row-{{18}}">
                        <td tabindex="0" class="sorting_1">{{18}}</td>
                        <td>{{$health['r']->question ?? '  ' }}</td>
                        <td class="{{($health['r']->answer ?? '  '  == 'yes') ? 'yes' : 'no'}} align-center" >
                            {{ $health['r']->answer ?? '  '  }}
                        </td>
                        <td>{!!$health['r']->comment ?? '  '  !!}</td>
                    </tr>
                    <tr role="row" class="odd" id="row-{{19}}">
                        <td tabindex="0" class="sorting_1">{{19}}</td>
                        <td>{{$health['s']->question ?? '  ' }}</td>
                        <td class="align-center" >
                            {{ $health['s']->answer ?? '  '  }}
                        </td>
                        <td>{!!$health['s']->comment ?? '  '  !!}</td>
                    </tr>
                    <tr role="row" class="odd" id="row-{{20}}">
                        <td tabindex="0" class="sorting_1">{{20}}</td>
                        <td>{{$health['t']->question ?? '  ' }}</td>
                        <td class="{{($health['t']->answer ?? '  '  == 'yes') ? 'yes' : 'no'}} align-center" >
                            {{ $health['t']->answer ?? '  '  }}
                        </td>
                        <td>{!!$health['t']->comment ?? '  '  !!}</td>
                    </tr>
                    <tr role="row" class="odd" id="row-{{21}}">
                        <td tabindex="0" class="sorting_1">{{21}}</td>
                        <td>{{$health['u']->question ?? '  ' }}</td>
                        <td class="{{($health['u']->answer ?? '  '  == 'yes') ? 'yes' : 'no'}} align-center" >
                            {{ $health['u']->answer ?? '  '  }}
                        </td>
                        <td>{!!$health['u']->comment ?? '  '  !!}</td>
                    </tr>
                    <tr role="row" class="odd" id="row-{{22}}">
                        <td tabindex="0" class="sorting_1">{{22}}</td>
                        <td>{{$health['v']->question ?? '  ' }}</td>
                        <td class=" align-center" >
                            {{ $health['v']->answer ?? '  '  }}
                        </td>
                        <td>{!!$health['v']->comment ?? '  '  !!}</td>
                    </tr>
                    <tr role="row" class="odd" id="row-{{23}}">
                        <td tabindex="0" class="sorting_1">{{23}}</td>
                        <td>{{$health['w']->question ?? '  ' }}</td>
                        <td class="{{($health['w']->answer ?? '  '  == 'no') ? 'yes' : 'no'}} align-center" >
                            {{ $health['w']->answer ?? '  '  }}
                        </td>
                        <td>{!!$health['w']->comment ?? '  '  !!}</td>
                    </tr>
               
                    <tr role="row" class="odd" id="row-{{24}}">
                        <td tabindex="0" class="sorting_1">{{24}}</td>
                        <td>Completed By</td>
                        <td class=" align-center" >
                        {{$health['a']->user->name ?? '  ' }}
                        </td>
                        <td></td>
                    </tr>
                   @endif
                   @if(isset($redFlags))

                    <tr role="row" class="odd">
                        <td colspan="4" tabindex=" 0" class="sorting_1 redflagTd">
                            <h3>Red Flags</h3>
                            <ul>
                                @foreach($redFlags as $item)
                                <li>
                                    {{$item->ride}} :{!! $item->issue !!}
                                </li>
                                @endforeach
                            </ul>
                        </td>
                        <td style="display: none;"></td>
                        <td style="display: none;"></td>
                        <td style="display: none;"></td>

                    </tr>
                    @endif
                   
                </tbody>
            </table>
        </div>
    </div>

</div>
@if(isset($maintenanceRideStatus))

<div id="datatable-buttons_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
    <div class="row">
        <div class="col-sm-12">
            <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap">
                <thead>
                    <tr role="row">
                        <th class="sorting_asc" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1"
                            aria-sort="ascending">ID
                        </th>
                        <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1">
                        Ride
                    </th>
                        <th class="sorting" tabin dex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1">
                            Status
                        </th>
                        <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1">
                            Comment
                        </th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($maintenanceRideStatus as $item)
                    <tr role="row" class="odd" id="row-{{1}}">
                        <td tabindex="0" class="sorting_1">{{1 }}</td>
                        <td>{{$item->ride->name }}</td>
                        <td class="{{($item->status == 'open') ? 'yes' : 'no'}} align-center" >
                            {{ $item->status }}
                        </td>
                        <td>{!!$item->comment ?? '  '  !!}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endif

@if(isset($techRideDown))

<div id="datatable-buttons_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
    <div class="row">
        <div class="col-sm-12">
            <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap">
                <thead>
                    <tr role="row">
                        <th class="sorting_asc" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1"
                            aria-sort="ascending">ID
                        </th>
                        <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1">
                        Ride
                        </th>
                        <th class="sorting" tabin dex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1">
                            Date Expected Open
                        </th>
                        <th class="sorting" tabin dex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1">
                            Lead Name
                        </th>
                        <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1">
                            Comment 
                        </th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($techRideDown as $item)
                    <tr role="row" class="odd" id="row-{{1}}">
                        <td tabindex="0" class="sorting_1">{{1 }}</td>
                        <td>{{$item->ride->name }}</td>
                        <td>{{ $item->date_expected_open }}</td>
                        <td>{{ $item->lead_name }}</td>
                        <td>{!!$item->comment ?? '  '  !!}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endif

@endif