@extends('admin.layout.app')

@section('title')
    All Users
@endsection
@section('content')
    <div class="card-box">
        <p class="text-muted font-14 mb-3">
            <a href="{{ route('admin.users.create') }}" class="btn btn-info">Add New</a>
        </p>

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
                                    Name
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1"
                                    colspan="1">
                                    Accessibilities
                                </th>
                                {{-- <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1">
                                User Zone
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1">
                                User Rides
                            </th> --}}
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
                                    <td>{{ $item->name }}</td>
                                    <td>
                                        @if (in_array($item->id, $user_parks_exist))
                                            <a href="{{ route('admin.userRoles', $item->id) }}" class=" btn btn-success">
                                                <i class="fa fa-edit"></i>Edit Accessibility
                                            @else
                                                <a href="{{ route('admin.userRoles', $item->id) }}" class=" btn btn-info">
                                                    <i class="fa fa-plus"></i>Add Accessibility
                                                </a>
                                        @endif
                                    </td>
                                    {{-- <td>
                                       @if (in_array($item->id, $user_parks_exist))
                                        <a href="{{ route('admin.user_parks.edit', $item) }}"
                                            class=" btn btn-success">
                                            <i class="fa fa-edit"></i>Edit
                                        @else
                                        <a href="{{ route('admin.addUserPark', $item->id) }}"
                                            class=" btn btn-info">
                                            <i class="fa fa-plus"></i>Add
                                            </a>
                                        @endif
                                </td>
                                <td>
                                        @if (in_array($item->id, $user_zones_exist))
                                        <a href="{{ route('admin.user_zones.edit', $item) }}"
                                            class=" btn btn-success">
                                            <i class="fa fa-edit"></i>Edit
                                        @else
                                        <a href="{{ route('admin.addUserZone', $item->id) }}"
                                            class=" btn btn-info">
                                            <i class="fa fa-plus"></i>Add
                                            </a>
                                         @endif

                                </td>
                                <td>
                                        @if (in_array($item->id, $user_rides_exist))
                                        <a href="{{ route('admin.ride_users.edit', $item) }}"
                                            class=" btn btn-success">
                                            <i class="fa fa-edit"></i>Edit
                                        @else
                                        <a href="{{ route('admin.addRideUser', $item->id) }}"
                                            class=" btn btn-info">
                                            <i class="fa fa-plus"></i>Add
                                            </a>
                                         @endif

                                </td> --}}
                                    <td>
                                        @if (auth()->user()->can('users-edit'))
                                            <a href="{{ route('admin.users.edit', $item) }}" class="btn btn-info">Edit</a>
                                        @endif

                                        @if (auth()->user()->can('users-delete'))
                                            <a class="btn btn-danger" data-name="{{ $item->name }}"
                                                data-url="{{ route('admin.users.destroy', $item) }}"
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
