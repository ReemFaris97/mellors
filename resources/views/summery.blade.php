@extends('admin.layout.app')

@section('title')
Customer Feedbacks
@endsection

@section('content')

<div class="card-box">



    <div id="datatable-buttons_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
        <div class="row">
            <div class="col-sm-12">
                <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap">
                    <thead>
                        <tr role="row">
                            <th class="sorting_asc" tabindex="0" aria-controls="datatable-buttons" rowspan="1"
                                colspan="1" aria-sort="ascending">ID
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1">
                                Ride
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1">
                                Type
                            </th>

                            <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1">
                                Process
                            </th>
                        </tr>
                    </thead>

                    <tbody>


                        <tr role="row" class="odd" id="">
                            <td tabindex="0" class="sorting_1"></td>
                            <td></td>
                            <td></td>

                            <td>
                                <a href="" class="btn btn-primary">Show</a>

                                <a class="btn btn-danger" data-name="" onclick="">
                                    Delete
                                </a>


                            </td>

                        </tr>



                    </tbody>
                </table>


            </div>
        </div>

    </div>
</div>


@endsection


@section('footer')
@include('admin.datatable.scripts')
@endsection