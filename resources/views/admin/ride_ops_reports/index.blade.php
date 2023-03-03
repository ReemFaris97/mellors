@extends('admin.layout.app')

@section('title')
    Skill games Reports
@endsection

@section('content')

    <div class="card-box">
        <a href="{{ route('admin.skill_game_reports.create')}}">
            <button type="button" class="btn btn-info">Add New Skill games Report </button>
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
                                Skill games Daily report
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1">
                                Answer
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1">
                                Comment
                            </th>

                            {{--<th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1">--}}
                                {{--Process--}}
                            {{--</th>--}}
                        </tr>
                        </thead>

                        <tbody>

                        @foreach ($items as $item)
                            <tr role="row" class="odd" id="row-{{ $item->id }}">
                                <td tabindex="0" class="sorting_1">{{ $item->id }}</td>
                                <td>{{ $item->question }}</td>
                                <td>{{ $item->answer }}</td>
                                <td>{!! $item->comment !!}</td>
                                {{--{!!Form::open( ['route' => ['admin.preopening_lists.destroy',$item->id] ,'id'=>'delete-form'.$item->id, 'method' => 'Delete']) !!}--}}
                                {{--{!!Form::close() !!}--}}
                                {{--<td>--}}
                                    {{--@if(auth()->user()->can('preopening_lists-edit'))--}}
                                        {{--<a href="{{ route('admin.preopening_lists.edit', $item) }}"--}}
                                           {{--class="btn btn-info">Edit</a>--}}
                                    {{--@endif--}}
                                        {{--@if(auth()->user()->can('preopening_lists-delete'))--}}

                                        {{--<a class="btn btn-danger" data-name="{{ $item->name }}"--}}
                                           {{--data-url="{{ route('admin.preopening_lists.destroy', $item) }}"--}}
                                           {{--onclick="delete_form(this)">--}}
                                            {{--Delete--}}
                                        {{--</a>--}}
                                        {{--@endif--}}

                                {{--</td>--}}

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




