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
                        <td>@if($item->answer == "yes")
                            <label style="background-color: aquamarine;">Yes</label>
                            @elseif($item->answer == "no")
                            <label style="background-color: red; font-weight: bold;">No</label>
                            @else
                            {{ $item->answer }}
                            @endif
                        </td>
                        <td>{{ $item->comment }}</td>

                    </tr>

                    @endforeach
                    <tr role="row" class="odd">
                        <td colspan="4" tabindex=" 0" class="sorting_1 redflagTd">
                            <h3>red flags</h3>
                            <ul>
                                <li>
                                    reflag 1
                                </li>
                                <li>
                                    reflag 1
                                </li>
                                <li>
                                    reflag 1
                                </li>
                            </ul>
                        </td>
                        <td style="display: none;"></td>
                        <td style="display: none;"></td>
                        <td style="display: none;"></td>

                    </tr>
                    <tr role="row" class="odd">
                        <td colspan="1" tabindex=" 0" class="sorting_1 redflagTd">

                        </td>
                        <td colspan="3"></td>
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