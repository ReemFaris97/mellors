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
                                Status
                            </th>

                            <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1">
                                Reported_by
                            </th> <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1">
                                Date
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1">
                                Process
                            </th>
                        </tr>
                        </thead>

                        <tbody>

                        @foreach ($items as $item)
                            <tr role="row" class="odd" id="row-{{ $item->id }}">
                                <td tabindex="0" class="sorting_1">{{ $item->id }}</td>
                                <td>{{ $item->rides->name }}</td>
                                <td>{{ $item->type=='with_stoppages'?'With Stoppages':'Without Stoppages' }}</td>
                                <td>{{ $item->status=='approved'?'Approved':'Pending' }}</td>
                                <td>{{ $item->created_by->name }}</td>
                                <td>{{ $item->date }}</td>
                                {!!Form::open( ['route' => ['admin.rsr_reports.destroy',$item->id] ,'id'=>'delete-form'.$item->id, 'method' => 'Delete']) !!}
                                {!!Form::close() !!}
                                <td>
                                    @if(auth()->user()->can('rsr_reports-edit'))
                                        <a href="{{ route('admin.rsr_reports.show', $item) }}"
                                           class="btn btn-primary">Show</a>
                                    @endif

                                    @if(auth()->user()->can('rsr_reports-delete'))
                                        <a class="btn btn-danger" data-name="{{ $item->name }}"
                                           data-url="{{ route('admin.rsr_reports.destroy', $item) }}"
                                           onclick="delete_form(this)">
                                            Delete
                                        </a>
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

