@extends('admin.layout.app')

@section('title')
    Parks open and close times
@endsection

@section('content')

    <div class="card-box">
        <a href="{{url('game-all-times')}}">
            <button type="button" class="btn btn-info">Show Rides with different open and close times </button>
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
                            <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1">
                                Parks
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1">
                                Open Date
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1">
                                Open Time
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1">
                                Close Date
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1">
                                Close Time
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1">
                                Daily Entrance Count
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
                                <td>{{ $item->parks->name }}</td>
                                <td>{{ $item->date }}</td>
                                <td>{{ $item->start }}</td>
                                <td>{{ $item->close_date }}</td>
                                <td>{{ $item->end }}</td>
                                <td>
                                    <button type="button" class="btn btn-info waves-effect m-r-20" data-toggle="modal"
                                            data-target="#modal-{{ $item->id }}">Add Daily Entrance Count
                                    </button>
                                    <div class="modal fade" id="modal-{{ $item->id }}" tabindex="-1" aria-hidden="true" role="dialog">
                                        <div class="modal-dialog modal-lg" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title" id="defaultModalLabel">
                                                        Add Daily Entrance Count</h4>
                                                </div>
                                                <div class="modal-body">

                                                    {!!Form::model($item , ['route' => ['admin.park_times.daily_entrance_count' , $item->id] ,
                                                     'id' => 'ClientStore', 'method' => 'PATCH','enctype'=>"multipart/form-data"]) !!}


                                                    {{--{!! Form::open([route('admin.park_times.daily_entrance_count') , 'class' => 'form phone_validate',--}}
                                                       {{--'id' => 'ClientStore', 'method' => 'post', 'files' => true]) !!}--}}
                                                    {{--<div class="form-group">--}}
                                                        <label class="form-label"> </label>
                                                        <div class="form-line">
                                                            {!! Form::number('daily_entrance_count', null, ['class' => 'form-control']) !!}
                                                            {!! Form::hidden('park_id', $item->id, ['class' => 'form-control']) !!}
                                                        </div>
                                                    </div>
                                                     <div class="modal-footer">
                                                        <button class="btn btn-primary waves-effect saveProject" type="submit">Save</button>
                                                    </div>

                                                    {!! Form::close() !!}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                {!!Form::open( ['route' => ['admin.park_times.destroy',$item->id] ,'id'=>'delete-form'.$item->id, 'method' => 'Delete']) !!}
                                {!!Form::close() !!}
                                <td>
                                        <a href="{{ route('admin.park_times.edit', $item) }}"
                                           class="btn btn-info">Edit</a>
                                        <a class="btn btn-danger" data-name="{{ $item->name }}"
                                           data-url="{{ route('admin.park_times.destroy', $item) }}"
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
@push('scripts')
    <script type="text/javascript">
        $("#ClientStore").popover({
        title: '<h4>Add Daily Entrance Count</h4>',
            container: 'body',
            placement: 'bottom',
            html: true,
            content: function() {
                return $('#popover-form').html();
            }
        });
    </script>
    @endpush

@section('footer')
    @include('admin.datatable.scripts')
@endsection


