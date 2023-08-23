@extends('admin.layout.app')

@section('title')
ATTRACTION AUDIT CHECK LISTS
@endsection

@section('content')
    <div class="card-box">
        <a href="{{ url('add_general_questions/' . $ride_id . '/' . $park_time_id) }}">
            <button type="button" class="btn btn-info">Create New Attraction Audit Check Form</button>
        </a>
        <br><br>
        <div id="datatable-buttons_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
            <div class="row">
                <div class="col-sm-12">
                    <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap">
                        <thead>
                            <tr role="row">
                                <th class="sorting_asc" tabindex="0" aria-controls="datatable-buttons" rowspan="1"
                                    colspan="1" aria-sort="ascending">ID
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1"
                                    colspan="1">
                                    List
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1"
                                    colspan="1">
                                    Created At
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1"
                                    colspan="1">
                                    Process
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1"
                                    colspan="1">
                                    Status
                                </th>
                            </tr>
                        </thead>

                        <tbody>

                            @foreach ($items as $item)
                                <tr role="row" class="odd" id="row-{{ $item->id }}">
                                    <td tabindex="0" class="sorting_1">{{ $item->id }}</td>
                                    <td>ATTRACTION AUDIT CHECK LIST {{ $loop->iteration }}</td>
                                    <td>{{ $item->date }}</td>
                                    <td>
                                        @if (auth()->user()->can('preopening_lists-edit'))
                                            <a href="{{ route('admin.edit_questions', $item->id) }}">
                                                <button type="button" id="add" class="add btn btn-success">
                                                    <i class="fa fa-edit"></i>Edit List
                                                </button>
                                            </a>
                                            <a href="{{ route('admin.show_questions_list', $item->id) }}">
                                                <button type="button" id="add" class="add btn btn-primary">
                                                    <i class="fa fa-info"></i>  Show List
                                                </button>
                                            </a>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($item->approve == 0)
                                            <a href="{{ url('questions/' . $item->id . '/approve') }}"
                                                class="btn btn-xs btn-danger"><i class="fa fa-check"></i> Approve</a>
                                        @else
                                            <span>Verified</span>
                                        @endif

                                    </td>
                                </tr>
                            @endforeach

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
