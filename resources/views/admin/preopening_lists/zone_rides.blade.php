@extends('admin.layout.app')

@section('title')
Rides
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
                               All Zone Rides
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1">
                                Add Preopening List
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1">
                                Process
                            </th>
                        </tr>
                        </thead>

                        <tbody>

                        @foreach ($rides as $item)
                            <tr role="row" class="odd" id="row-{{ $item->id }}">
                                <td tabindex="0" class="sorting_1">{{ $item->id }}</td>
                                <td>{{ $item->name }}</td>
                                {!!Form::open( ['route' => ['admin.zones.destroy',$item->id] ,'id'=>'delete-form'.$item->id, 'method' => 'Delete']) !!}
                                {!!Form::close() !!}
                                <td>
                                    <a href="{{url('/add_preopening_list_to_ride/'.$item->id)}}" class="btn btn-info">Add Preopening List</a>
                                </td>
                                <td>
                                    {{--@if(auth()->user()->can('zones-edit'))--}}
                                        {{--<a href="{{ route('admin.zones.edit', $item) }}"--}}
                                           {{--class="btn btn-info">Edit</a>--}}
                                    {{--@endif--}}
                                        <a class="btn btn-danger" data-name="{{ $item->name }}"
                                           data-url="{{ route('admin.zones.destroy', $item) }}"
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
