@extends('admin.layout.app')

@section('title')
 Availability Reports 
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
                                Park
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
                        @if(isset($items))

                        @foreach ($items as $item)
                            <tr role="row" class="odd" id="row-{{ $item->id }}">
                                <td tabindex="0" class="sorting_1">{{ $item->id}}</td>
                                <td>{{ $item->parks->name??'' }}</td>                               
                                 <td>
                                 @if($item->status=='pending')
                                 <a href="{{ url('availability_report/' . $item->park_id . '/' . $item->date . '/approve') }}"
                                  class="btn btn-xs btn-danger"><i class="fa fa-check"></i> Approve</a>
                                  @endif
                                  @if($item->status=='approved')
                                <span>Verified</span>
                                    @endif
                                </td>
                                <td>{{ $item->created_by->name ??''}}</td>
                                <td>{{ $item->date }}</td>
                                <td>
                                    @if(auth()->user()->can('rsr_reports-list'))
                                        <a href="{{ route('admin.availability_reports.show', $item->park_id) }}"
                                           class="btn btn-primary">Show</a>
                                    @endif

                                    @if(auth()->user()->can('rsr_reports-edit'))
                                    <a href="{{ route('admin.availability_reports.edit', $item->park_id) }}"
                                    class="btn btn-success">Edit</a>
                                    @endif

                                </td>

                            </tr>

                        @endforeach
@endif
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

