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
                            Technical report
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
                سسسسسسسسسسسسسسسسسسسسسس
                @if(isset($tech))
   
                     <tr role="row" class="odd" id="row-{{ 1}}">
                        <td tabindex="0" class="sorting_1">{{ 1 }}</td>
                        <td>{{$tech['c']}}</td>
                        <td class="  align-center">
                        </td>
                        <td></td>
                     </tr>
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

                @endif

                </tbody>
            </table>
        </div>
    </div>

</div>
@endif
