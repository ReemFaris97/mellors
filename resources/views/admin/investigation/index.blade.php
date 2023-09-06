@extends('admin.layout.app')

@section('title')
Incident Investigation QMS-F-14
@endsection

@section('content')
    <div class="card-box">

        <a class="input-group-btn" href="{{ route('admin.investigation.create') }}">
            <button type="button" class="btn waves-effect waves-light btn-primary">Add Incident Investigation Form QMS-F-14</button>
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
                                    Name of Person Involved
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1"
                                    colspan="1">
                                    Location
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1"
                                colspan="1">
                                Witness Statement
                            </th>
                            @if(auth()->user()->hasRole('Health & Safety Manager') || auth()->user()->hasRole('Super Admin')||
                            auth()->user()->hasRole('Park Admin') || auth()->user()->hasRole('Branch Admin'))

                                <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1"
                                colspan="1">
                                Status
                            </th>
                            @endif
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
                                    <td>{{ $item->value['incident_date'] }}</td>
                                    <td>{{ $item->value['person_name'] }}</td>
                                    <td>{{ $item->park->name }} / {{ $item->ride->name ?? $item->text }} </td>
                                    <td>
                                        <a href="{{ url('show_statment/' . $item->id) }}"
                                           class="btn btn-primary"><i class="fa fa-plus"></i>  Witness Statment </a>
                                      </td>
                                    @if(auth()->user()->hasRole('Health & Safety Manager') || auth()->user()->hasRole('Super Admin')||
                                     auth()->user()->hasRole('Park Admin') || auth()->user()->hasRole('Branch Admin'))

                                    <td>
                                        @if($item->status=='pending')
                                        <a href="{{url('investigation/'.$item->id.'/approve')}}"
                                        class="btn btn-xs btn-danger"><i class="fa fa-check"></i> Approve</a>
                                        @endif
                                        @if($item->status=='approved')
                                       <span>Verified</span>
                                          @endif
                                    </td>
                                    @endif
                                    {!! Form::open([
                                        'route' => ['admin.investigation.destroy', $item->id],
                                        'id' => 'delete-form' . $item->id,
                                        'method' => 'Delete',
                                    ]) !!}
                                    {!! Form::close() !!}
                                    <td>
                                        <!-- <a href="{{ route('admin.investigation.edit', $item) }}"
                                                               class="btn btn-info">Edit</a> -->
                                        <a class="btn btn-danger" data-name=""
                                            data-url="{{ route('admin.investigation.destroy', $item) }}"
                                            onclick="delete_form(this)">
                                            Delete
                                        </a>
                                        <a href="{{ route('admin.investigation.edit', $item) }}" class="btn btn-info">Edit</a>
                                        <a href="{{ route('admin.investigation.show', $item->id) }}" class="btn btn-info">show</a>
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
