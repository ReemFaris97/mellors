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
                             Preopening List
                            </th>
                          
                        </tr>
                        </thead>

                        <tbody>

                        @foreach ($rides as $item)
                            <tr role="row" class="odd" id="row-{{ $item->id }}">
                            <input type="hidden" name="ride_id" id="ride-id" class="ride-id" value="{{ $item->id }}">

                                <td tabindex="0" class="sorting_1">{{ $item->id }}</td>
                                <td>{{ $item->name }}</td>
                                {!!Form::open( ['route' => ['admin.zones.destroy',$item->id] ,'id'=>'delete-form'.$item->id, 'method' => 'Delete']) !!}
                                {!!Form::close() !!}
                                <td>               
                                @if(auth()->user()->can('preopening_lists-create'))
                                        @if(in_array($item->id, $data_exist))
                                         <a href="{{url('edit_preopening_list/'.$item->id)}}">
                                            <button type="button" id="edit" class="edit btn btn-success">
                                            <i class="fa fa-edit"></i> Edit Preopening List
                                            </button>
                                        </a>
                                        @else
                                        <a href="{{url('add_preopening_list_to_ride/'.$item->id)}}">
                                        <button type="button" id="add" class="add btn btn-info">
                                        <i class="fa fa-plus"></i> Add Preopening List
                                        </button>
                                        </a>
                                        @endif
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
