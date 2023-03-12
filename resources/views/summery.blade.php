@extends('admin.layout.app')

@section('title')
Customer Feedbacks
@endsection

@section('content')

<div class="card-box">



    <div id="datatable-buttons_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer ">
        <div class="row">
            <div class="col-sm-12">
                <table id="datatable-buttons "
                    class="table table-striped table-bordered  tableDates dt-responsive nowrap dayMonth">
                    <thead>
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
                                Duty Manager: :
                            </th>
                            <th class="sorting no" tabindex="0" aria-controls="datatable-buttons">
                                Weather: :
                            </th>

                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td tabindex="0" class="sorting_1">22/1/2023 <span class="yelloBack">friday</span> </td>
                            <td class=" align-center">8 am</td>
                            <td>5 pm </td>
                            <td class=" align-center">Asmaa</td>
                            <td class="">Lorem, ipsum dolor sit amet consectetur adipisicing elit.
                                Suscipit, possimus.</td>
                        </tr>
                        <tr>
                            <td tabindex="0" class="sorting_1">23/1/2023 <span class="yelloBack ">sunday</span> </td>
                            <td class=" align-center">8 am</td>
                            <td>5 pm </td>
                            <td class=" align-center">amir</td>
                            <td class="">Lorem, ipsum dolor sit amet consectetur adipisicing elit.
                                Suscipit, possimus.</td>
                        </tr>







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
                        <tr>
                            <td tabindex="0" class="sorting_1">Were all rides available today </td>
                            <td class="yes align-center">yes</td>
                            <td>How many unavailable </td>
                            <td class="no align-center">0</td>
                        </tr>
                        <tr>
                            <td tabindex="0" class="sorting_1">Were there any ride breakdowns </td>
                            <td class="yes align-center">yes</td>
                            <td>How many breakdowns </td>
                            <td class="no align-center">0</td>
                        </tr>
                        <tr>
                            <td tabindex="0" class="sorting_1">Any Evacuations </td>
                            <td class="yes align-center">yes</td>
                            <td>How many evacuations </td>
                            <td class="no align-center">0</td>
                        </tr>
                        <tr>
                            <td tabindex="0" class="sorting_1">Were there any stoppages? </td>
                            <td class="yes align-center">3</td>
                            <td>How many of these stoppages were for Swiper issues? </td>
                            <td>2</td>
                        </tr>






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
                        <tr>
                            <td tabindex="0" class="sorting_1">Any shortage in staff</td>
                            <td class="yes align-center">yes</td>
                            <td>How many staff unavailable </td>
                            <td class="no align-center">0</td>
                        </tr>
                        <tr>
                            <td tabindex="0" class="sorting_1">Any card reader issues </td>
                            <td class="yes align-center">yes</td>
                            <td>Any Credit card machine issues </td>
                            <td class="no align-center">0</td>
                        </tr>
                        <tr>
                            <td tabindex="0" class="sorting_1">Any incidents with staff </td>
                            <td class="yes align-center">yes</td>
                            <td>Any theft </td>
                            <td class="no align-center">0</td>
                        </tr>
                        <tr>
                            <td tabindex="0" class="sorting_1">Any complaints received </td>
                            <td class="no align-center">3</td>
                            <td> </td>
                            <td></td>
                        </tr>
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
                        <tr>
                            <td tabindex="0" class="sorting_1">Any incident reports created </td>
                            <td class="yes align-center">yes</td>
                            <td>Any near misses / accidents reported </td>
                            <td class="yes align-center">0</td>
                        </tr>

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
                        <tr>
                            <td tabindex="0" class="sorting_1">How many rides delayed opening </td>
                            <td class="yes align-center">yes</td>
                            <td>How many rides are down due to maintence </td>
                            <td class="no align-center">0</td>
                        </tr>
                        <tr>
                            <td tabindex="0" class="sorting_1">How many rides down all day</td>
                            <td class="yes align-center">yes</td>
                            <td>How many down waiting on parts </td>
                            <td class="no align-center">0</td>
                        </tr>

                        <tr>
                            <td tabindex="0" class="sorting_1"> </td>
                            <td class="yes align-center">3</td>
                            <td>How many rides waiting on approvals </td>
                            <td class="yes align-center">2</td>
                        </tr>

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
                        <tr>
                            <td tabindex="0" class="sorting_1">Any concerns found during routine maintenace </td>
                            <td class="yes align-center">yes</td>
                            <td>Any issues with Maintenance app </td>
                            <td class="no align-center">0</td>
                        </tr>
                        <tr>
                            <td tabindex="0" class="sorting_1">Any evacuations during operation </td>
                            <td class="yes align-center">yes</td>
                            <td>Any new PM added to Maintenance app </td>
                            <td class="no align-center">0</td>
                        </tr>
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
                            <tr>
                                <td tabindex="0" class="sorting_1">Any concerns found during routine maintenace </td>
                                <td style="display: none;"></td>
                                <td style="display: none;"> </td>
                                <td style="display: none;"></td>
                            </tr>

                        </tbody>
                    </table>

                </div>
                <div class='mt-4'>
                    <h4 class='redFlags'>Duty Manager general comments on today's operations:</h4>
                    <textarea class="editTextArea" name="" id="" rows="10"></textarea>
                </div>
                <div class='mt-4'>
                    <span class="bold">Report completed by </span> <span class="yelloBack"> asmaa</span>
                </div>
            </div>
        </div>

    </div>
</div>


@endsection


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