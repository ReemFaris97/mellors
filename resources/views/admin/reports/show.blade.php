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
                    @if(isset($items))

                    @foreach ($items as $item)
                    <tr role="row" class="odd" id="row-{{ $item->id }}">
                        <td tabindex="0" class="sorting_1">{{ $item->id }}</td>
                        <td>{{ $item->question }}</td>
                        <td class="{{$item->color}}  align-center">
                        {{ $item->answer }}
                       </td>
                        <td>{!! $item->comment !!}</td>
                    </tr>
                    @endforeach
                    <tr role="row" class="odd">
                        <td colspan="4" tabindex=" 0" class="sorting_1 redflagTd">
                            <h3>Red Flags</h3>
                            <ul>
                                @if(isset($redFlags))
                                @foreach($redFlags as $item)
                                <li>
                                {{$item->ride}} :{!! $item->issue !!}
                                </li>
                                @endforeach
                                @endif
                            </ul>
                        </td>
                        <td style="display: none;"></td>
                        <td style="display: none;"></td>
                        <td style="display: none;"></td>

                    </tr>
                    
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
@endif