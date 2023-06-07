@extends('admin.layout.app')

@section('title')
Parks
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
                                Parks
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1">
                                Branch
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1">
                                Availability Report
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
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->branches->name }}</td>
                                <td>
                         @if(auth()->user()->can('parks-edit'))
                         
        
                                @if(in_array($item->id, $items_check))

                                <a href="{{ route('admin.availability_reports.edit', $item->id) }}"
                                         class="btn btn-success"><i class="fa fa-edit"></i> Add second Status</a>
                                         @else
                                        <a href="{{ route('admin.addAvailabilityReport', $item->id) }}"
                                         class="btn btn-info">Add First Status</a>

                                @endif
                      @endif
                                    
                                </td>


                                {!!Form::open( ['route' => ['admin.parks.destroy',$item->id] ,'id'=>'delete-form'.$item->id, 'method' => 'Delete']) !!}
                                {!!Form::close() !!}
                                <td>
                                    @if(auth()->user()->can('parks-edit'))
                                        <a href="{{ route('admin.parks.edit', $item) }}"
                                           class="btn btn-info">Edit</a>
                                    @endif
                                        @if(auth()->user()->can('parks-delete'))

                                        <a class="btn btn-danger" data-name="{{ $item->name }}"
                                           data-url="{{ route('admin.parks.destroy', $item) }}"
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


