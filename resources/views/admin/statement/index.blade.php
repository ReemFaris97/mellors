@extends('admin.layout.app')

@section('title')
Witness Statement
@endsection

@section('content')
    <div class="card-box">

        <a class="input-group-btn" href="{{ route('admin.incident.create') }}">
            <button type="button" class="btn waves-effect waves-light btn-primary">Add Witness Statement</button>
        </a>
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
                                    Date
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1"
                                    colspan="1">
                                    Person Phone
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1"
                                    colspan="1">
                                    Person Name
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1"
                                    colspan="1">
                                    Process
                                </th>
                            </tr>
                        </thead>

                        <tbody>

                            @foreach ($items as $item)
                                <tr role="row" class="odd" id="row-{{ $item->id }}">
                                    <td tabindex="0" class="sorting_1">{{ $item->id }}</td>
                                    <td>{{ $item->value['date'] }}</td>
                                    <td>{{ $item->value['witness_phone'] }}</td>
                                    <td>{{ $item->value['witness_name'] }}</td>

                                    {!! Form::open([
                                        'route' => ['admin.statement.destroy', $item->id],
                                        'id' => 'delete-form' . $item->id,
                                        'method' => 'Delete',
                                    ]) !!}
                                    {!! Form::close() !!}
                                    <td>
                                        <a href="{{ route('admin.statement.edit', $item) }}" class="btn btn-info">Edit</a>

                                        <!-- <a href="{{ route('admin.statement.edit', $item) }}"
                                                               class="btn btn-info">Edit</a> -->
                                        <a class="btn btn-danger" data-name=""
                                            data-url="{{ route('admin.statement.destroy', $item) }}"
                                            onclick="delete_form(this)">
                                            Delete
                                        </a>
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
