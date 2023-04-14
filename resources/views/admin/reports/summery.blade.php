@if(request()->is('search_duty_summary_reports*'))

<div class="card-box">

    <div id="datatable-buttons_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
        <div class="row">
            <div class="col-sm-12">
                <table id="datatable-buttons "
                    class="table table-striped table-bordered  tableDates dt-responsive nowrap dayMonth">
                    <thead>
                    <tr role="row">
                            <th colspan="5" class="sorting_asc" tabindex="0" aria-controls="datatable-buttons" rowspan="1"
                                aria-sort="ascending" style="text-align: center;">
                                @if(isset($parkTime))
                                {{$parkTime->parks->name}}
                                @endif  - Duty Report
                            </th>
                        </tr>
                        <tr role="row">
                            <th class="sorting_asc" tabindex="0" aria-controls="datatable-buttons" rowspan="1"
                                aria-sort="ascending">Day/Month/Year
                            </th>
                            <th class="sorting no" tabindex="0" aria-controls="datatable-buttons">
                                Opening Time:
                            </th>
                            <th class="sorting no" tabindex="0" aria-controls="datatable-buttons">
                                Closing Time :
                            </th>
                            <th class="sorting no" tabindex="0" aria-controls="datatable-buttons">
                            Number of Guest:
                            </th>	
                            <th class="sorting no" tabindex="0" aria-controls="datatable-buttons">
                                Weather: :
                            </th>

                        </tr>
                    </thead>
                    <tbody>
                        @if(isset($parkTime))
                        <tr>
                            <td tabindex="0" class="sorting_1">{{$parkTime->date}}
                                <!-- <span class="yelloBack">friday</span> --> </td>
                            <td class=" align-center">{{$parkTime->start}}</td>
                            <td>{{$parkTime->end}}</td>
                            <td>{{$parkTime->daily_entrance_count}}</td>
                            <td class="">  
                             @if(isset($info))
                             {{$info->weather[0]->main}}-{{$info->weather[0]->description}}-{{$info->main->temp}} ْ -Windspeed avg {{$info->wind->speed}}km/h
                             @endif
                            </td>
                        </tr>
                        @endif
                    </tbody>
                </table>

                <table id="datatable-buttons "
                    class="table table-striped table-bordered dt-responsive nowrap mt-5 Rides">
                    <thead>
                        <tr role="row">
                            <th class="sorting_asc" tabindex="0" aria-controls="datatable-buttons" rowspan="1"
                                colspan="4" aria-sort="ascending">Rides
                            </th>
                            <th style="display: none;" class="sorting no" tabindex="0"
                                aria-controls="datatable-buttons">

                            </th>
                            <th style="display: none;" class="sorting" tabindex="0" aria-controls="datatable-buttons">

                            </th>

                            <th style="display: none;" class="sorting" tabindex="0" aria-controls="datatable-buttons">

                            </th>
                        </tr>
                    </thead>
                    <tbody>
                    @if(isset($ridesData))

                        <tr>
                            <td tabindex="0" class="sorting_1">Were all rides available today </td>
                            <td class="{{($ridesData['How many unavailable?'] == '0') ? 'yes align-center' : 'no align-center'}}">
                            {{($ridesData['How many unavailable?'] == '0') ? 'yes' : 'no'}}
                            </td>
                            <td>How many unavailable </td>
                            <td class="{{($ridesData['How many unavailable?'] == '0') ? 'yes align-center' : 'no align-center'}}">
                            {{$ridesData['How many unavailable?']}}
                            </td>
                        </tr>
                        <tr>
                        <td tabindex="0" class="sorting_1">Were there any ride breakdowns </td>
                            <td class="{{($ridesData['How many rides have Breakdowns?'] == '0') ? 'yes align-center' : 'no align-center'}}">
                            {{($ridesData['How many rides have Breakdowns?'] == '0') ? 'no' : 'yes'}}
                            </td>
                            <td>How many breakdowns </td>
                            <td class="{{($ridesData['How many rides have Breakdowns?'] == '0') ? 'yes align-center' : 'no align-center'}}">
                            {{$ridesData['How many rides have Breakdowns?']}}
                            </td>
                        </tr>
                        <td tabindex="0" class="sorting_1">Any Evacuations </td>
                            <td class="{{($ridesData['How many Evacuations?'] == '0') ? 'yes align-center' : 'no align-center'}}">
                            {{($ridesData['How many Evacuations?'] == '0') ? 'no' : 'yes'}}
                            </td>
                            <td>How many evacuations </td>
                            <td class="{{($ridesData['How many Evacuations?'] == '0') ? 'yes align-center' : 'no align-center'}}">
                            {{$ridesData['How many Evacuations?']}}
                            </td>
                        </tr>
                        <tr>
                        <td tabindex="0" class="sorting_1">Were there any stoppages? </td>
                            <td class="{{($ridesData['How many stoppages?'] == '0') ? 'yes align-center' : 'no align-center'}}">
                            {{($ridesData['How many stoppages?'] == '0') ? 'no' : 'yes'}}
                            </td>
                            <td>How many of these stoppages were for Swiper issues? </td>
                            <td class="{{($ridesData['How many swipper Issues?'] == '0') ? 'no align-center' : 'no align-center'}}">
                            {{$ridesData['How many swipper Issues?']}}
                            </td>
                        </tr>

                    @endif

                    </tbody>
                </table>

                <table id="datatable-buttons "
                    class="table table-striped table-bordered dt-responsive nowrap SkillGames  mt-5">
                    <thead>
                        <tr role="row">
                            <th class="sorting_asc" tabindex="0" aria-controls="datatable-buttons" rowspan="1"
                                colspan="4" aria-sort="ascending">Skill Games
                            </th>
                            <th style="display: none;" class="sorting" tabindex="0" aria-controls="datatable-buttons">

                            </th>
                            <th style="display: none;" class="sorting" tabindex="0" aria-controls="datatable-buttons">

                            </th>

                            <th style="display: none;" class="sorting" tabindex="0" aria-controls="datatable-buttons">

                            </th>
                        </tr>
                    </thead>
                    <tbody>
                    @if(isset($skillGameData))
                        <tr>
                            <td tabindex="0" class="sorting_1">Any shortage in staff</td>
                            <td class="{{($skillGameData['Any staff shortages']== 'yes') ? 'no align-center' : 'yes align-center'}}">
                            {{$skillGameData['Any staff shortages']}}</td>
                            <td>How many staff unavailable </td>
                            <td class="{{($skillGameData['HB staff unavailable?'] == 'yes') ? 'no align-center' : 'yes align-center'}}">
                            {{$skillGameData['HB staff unavailable?']}}</td>
                        </tr>
                        <tr>
                            <td tabindex="0" class="sorting_1">Any card reader issues </td>
                            <td class="{{($skillGameData['Any Card reader issues?']== 'yes') ? 'no align-center' : 'yes align-center'}}">
                            {{$skillGameData['Any Card reader issues?']}}</td>
                            <td>Any Credit card machine issues </td>
                            <td class="{{($skillGameData['Any Credit card issues?']== 'yes') ? 'no align-center' : 'yes align-center'}}">
                            {{$skillGameData['Any Credit card issues?']}}</td>
                        </tr>
                        <tr>
                            <td tabindex="0" class="sorting_1">Any incidents with staff </td>
                            <td class="{{($skillGameData['Any incidents with staff?']== 'yes') ? 'no align-center' : 'yes align-center'}}">
                            {{$skillGameData['Any incidents with staff?']}}</td>
                            <td>Any theft? </td>
                            <td class="{{($skillGameData['Any theft?']== 'yes') ? 'no align-center' : 'yes align-center'}}">
                            {{$skillGameData['Any theft?']}}</td>  
                       </tr>
                       <tr>
                            <td tabindex="0" class="sorting_1">Any complaints received?</td>
                            <td class="{{($skillGameData['Any complaints received?']== 'yes') ? 'no align-center' : 'yes align-center'}}">
                            {{$skillGameData['Any complaints received?']}}</td> 
                            <td></td>
                            <td></td>
                       </tr>
                        @endif
                    </tbody>
                </table>

                <table id="datatable-buttons "
                    class="table table-striped table-bordered dt-responsive nowrap TechServices Health health1 mt-5">
                    <thead>
                        <tr role="row">
                            <th class="sorting_asc" tabindex="0" aria-controls="datatable-buttons" rowspan="1"
                                colspan="4" aria-sort="ascending">Health and Safety
                            </th>
                            <th style="display: none;" class="sorting" tabindex="0" aria-controls="datatable-buttons">

                            </th>
                            <th style="display: none;" class="sorting" tabindex="0" aria-controls="datatable-buttons">

                            </th>

                            <th style="display: none;" class="sorting" tabindex="0" aria-controls="datatable-buttons">

                            </th>
                        </tr>
                    </thead>
                    <tbody>
                    @if(isset($healthData))
                        <tr>
                            <td tabindex="0" class="sorting_1">Any incident reports created </td>
                            <td class="{{($healthData['incidents'] == 0) ? 'yes align-center' : 'no align-center'}}">
                            {{$healthData['incidents']}}</td>
                            <td>Any near misses / accidents reported </td>
                            <td class="{{($healthData['accidents'] == 0) ? 'yes align-center' : 'no align-center'}}">
                            {{$healthData['accidents']}}</td>
                        </tr>
                    @endif
                    </tbody>
                </table>

                <table id="datatable-buttons "
                    class="table table-striped table-bordered dt-responsive nowrap TechServices  mt-5">
                    <thead>
                        <tr role="row">
                            <th class="sorting_asc" tabindex="0" aria-controls="datatable-buttons" rowspan="1"
                                colspan="4" aria-sort="ascending">Tech Services
                            </th>
                            <th style="display: none;" class="sorting" tabindex="0" aria-controls="datatable-buttons">

                            </th>
                            <th style="display: none;" class="sorting" tabindex="0" aria-controls="datatable-buttons">

                            </th>

                            <th style="display: none;" class="sorting" tabindex="0" aria-controls="datatable-buttons">

                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(isset($techData))
                        <tr>
                            <td tabindex="0" class="sorting_1">How many rides delayed opening </td>
                            <td class="{{($techData['How many rides have delayed opening?'] == 0) ? 'yes align-center' : 'no align-center'}}">
                            {{$techData['How many rides have delayed opening?']}}</td>
                            <td>How many rides are down due to maintence </td>
                            <td class="{{($techData['rides down due to maintenance'] == 0) ? 'yes align-center' : 'no align-center'}}">
                                {{$techData['rides down due to maintenance']}}</td>
                        </tr>
                        <tr>
                            <td tabindex="0" class="sorting_1">How many rides down all day</td>
                            <td class="{{($techData['rides down all day'] == 0) ? 'yes align-center' : 'no align-center'}}">
                            {{$techData['rides down all day']}}</td>
                            <td>How many down waiting on parts </td>
                            <td class="{{($techData['rides awaiting parts'] == 0) ? 'yes align-center' : 'no align-center'}}">
                            {{$techData['rides awaiting parts']}}</td>

                        </tr>

                        <tr>
                            <td>How many rides waiting on approvals </td>
                            <td class="{{($techData['rides awaiting approvals'] == 0) ? 'yes align-center' : 'no align-center'}}">
                            {{$techData['rides awaiting approvals']}}</td>
                            <td tabindex="0" class="sorting_1"> </td>
                            <td></td>
                        </tr>

                        @endif
                    </tbody>
                </table>

                <table id="datatable-buttons "
                    class="table table-striped table-bordered dt-responsive nowrap Maintenance   mt-5">
                    <thead>
                        <tr role="row">
                            <th class="sorting_asc" tabindex="0" aria-controls="datatable-buttons" rowspan="1"
                                colspan="4" aria-sort="ascending">Maintenance
                            </th>
                            <th style="display: none;" class="sorting" tabindex="0" aria-controls="datatable-buttons">

                            </th>
                            <th style="display: none;" class="sorting" tabindex="0" aria-controls="datatable-buttons">

                            </th>

                            <th style="display: none;" class="sorting" tabindex="0" aria-controls="datatable-buttons">

                            </th>
                        </tr>
                    </thead>
                    <tbody>
                    @if(isset($maintenanceData))

                        <tr>
                            <td tabindex="0" class="sorting_1">Any concerns found during routine maintenace </td>
                            <td class="{{($maintenanceData['Any concerns found during routine maintenace'] == 0) ? 'yes align-center' : 'no align-center'}}">
                                {{$maintenanceData['Any concerns found during routine maintenace']}}</td>
                            <td>Any issues with Maintenance app </td>
                            <td class="{{($maintenanceData['Any issues with Maintenance App'] == 'yes') ? 'no align-center' : 'yes align-center'}}">
                            {{$maintenanceData['Any issues with Maintenance App']}}</td>
                        </tr>
                        <tr>
                            <td tabindex="0" class="sorting_1">Any evacuations during operation </td>
                            <td class="{{($maintenanceData['Any evacuations during operation'] == 'no') ? 'yes align-center' : 'no align-center'}}">
                            {{$maintenanceData['Any evacuations during operation']}}</td>
                            <td>Any new PM added to Maintenance app </td>
                            <td class="no align-center">0</td>
                        </tr>
                        @endif
                    </tbody>
                </table>

                <div class='mt-4'>
                    <h4 class='redFlags'>RED FLAGS</h4>
                    <table id="datatable-buttons "
                        class="table table-striped table-bordered dt-responsive nowrap redFlag tableRedFlag  mt-2">
                        <thead>
                            <tr role="row">
                                <th class="sorting_asc" tabindex="0" aria-controls="datatable-buttons" rowspan="1"
                                    colspan="4" aria-sort="ascending">RIDES
                                </th>
                                <th style="display: none;" class="sorting" tabindex="0"
                                    aria-controls="datatable-buttons">

                                </th>
                                <th style="display: none;" class="sorting" tabindex="0"
                                    aria-controls="datatable-buttons">

                                </th>

                                <th style="display: none;" class="sorting" tabindex="0"
                                    aria-controls="datatable-buttons">

                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(isset($ridesRedFlag))
                            @foreach($ridesRedFlag as $item)
                            <tr>
                                <td tabindex="0" class="sorting_1">{{$item->ride}}</td>
                                <td>{!! $item->issue !!}</td>
                            </tr>
                            @endforeach
                            @endif
                        </tbody>

                        <thead>
                            <tr role="row">
                                <th class="sorting_asc" tabindex="0" aria-controls="datatable-buttons" rowspan="1"
                                    colspan="4" aria-sort="ascending">Maintenance
                                </th>
                                <th style="display: none;" class="sorting" tabindex="0"
                                    aria-controls="datatable-buttons">

                                </th>
                                <th style="display: none;" class="sorting" tabindex="0"
                                    aria-controls="datatable-buttons">

                                </th>

                                <th style="display: none;" class="sorting" tabindex="0"
                                    aria-controls="datatable-buttons">

                                </th>
                            </tr>
                        </thead>
                        <tbody>
                        @if(isset($maintenanceRedFlag))
                            @foreach($maintenanceRedFlag as $item)
                            <tr>
                                <td tabindex="0" class="sorting_1">{{$item->ride}}</td>
                                <td>{!! $item->issue !!}</td>
                            </tr>
                            @endforeach
                            @endif
                        </tbody>
                        <thead>
                            <tr role="row">
                                <th class="sorting_asc" tabindex="0" aria-controls="datatable-buttons" rowspan="1"
                                    colspan="4" aria-sort="ascending">Health And Safety
                                </th>
                                <th style="display: none;" class="sorting" tabindex="0"
                                    aria-controls="datatable-buttons">

                                </th>
                                <th style="display: none;" class="sorting" tabindex="0"
                                    aria-controls="datatable-buttons">

                                </th>

                                <th style="display: none;" class="sorting" tabindex="0"
                                    aria-controls="datatable-buttons">

                                </th>
                            </tr>
                        </thead>
                        <tbody>
                        @if(isset($healthRedFlag))
                            @foreach($healthRedFlag as $item)
                            <tr>
                                <td tabindex="0" class="sorting_1">{{$item->ride}}</td>
                                <td>{!! $item->issue !!}</td>
                            </tr>
                            @endforeach
                            @endif
                        </tbody>

                        <thead>
                            <tr role="row">
                                <th class="sorting_asc" tabindex="0" aria-controls="datatable-buttons" rowspan="1"
                                    colspan="4" aria-sort="ascending">Skill Games
                                </th>
                                <th style="display: none;" class="sorting" tabindex="0"
                                    aria-controls="datatable-buttons">

                                </th>
                                <th style="display: none;" class="sorting" tabindex="0"
                                    aria-controls="datatable-buttons">

                                </th>

                                <th style="display: none;" class="sorting" tabindex="0"
                                    aria-controls="datatable-buttons">

                                </th>
                            </tr>
                        </thead>
                        <tbody>
                        @if(isset($skillRedFlag))
                            @foreach($skillRedFlag as $item)
                            <tr>
                                <td tabindex="0" class="sorting_1">{{$item->ride}}</td>
                                <td>{!! $item->issue !!}</td>
                            </tr>
                            @endforeach
                            @endif
                        </tbody>

                        <thead>
                            <tr role="row">
                                <th class="sorting_asc" tabindex="0" aria-controls="datatable-buttons" rowspan="1"
                                    colspan="4" aria-sort="ascending">Technical
                                </th>
                                <th style="display: none;" class="sorting" tabindex="0"
                                    aria-controls="datatable-buttons">

                                </th>
                                <th style="display: none;" class="sorting" tabindex="0"
                                    aria-controls="datatable-buttons">

                                </th>

                                <th style="display: none;" class="sorting" tabindex="0"
                                    aria-controls="datatable-buttons">

                                </th>
                            </tr>
                        </thead>
                        <tbody>
                        
                        @if(isset($techRedFlag))
                            @foreach($techRedFlag as $item)
                            <tr>
                                <td tabindex="0" class="sorting_1">{{$item->ride}}</td>
                                <td>{!! $item->issue !!}</td>
                            </tr>
                            @endforeach
                            @endif
                        </tbody>

                    </table>

                </div>
                <div class='mt-4'>
                    <h4 class='redFlags'>Duty Manager general comments on today's operations:</h4>
                    <textarea class="editTextArea" name="" id="" rows="10">
                    @if(isset($parkTime))
                       {!! $parkTime->general_comment !!}
                       @endif
                    </textarea>
                </div>
                
            </div>
        </div>

    </div>
</div>

@endif

@section(' footer') @include('admin.datatable.scripts') @endsection
@push('scripts')
<script type="text/javascript">
$(document).ready(function() {
    $('table').each(function() {
        $('td').each(function() {
            if ($(this).hasClass("yes")) {
                $(this).addClass("yesImportant");
                console.log("$(this)")

            } else if ($(this).hasClass("no")) {
                $(this).addClass("noImportant")
            }
        });


    });
});
</script>
@endpush