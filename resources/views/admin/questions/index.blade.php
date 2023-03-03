@extends('admin.layout.app')

@section('title')
    Question
@endsection

@section('content')

    <div class="card-box">
        <a href="{{ route('admin.questions.create')}}">
            <button type="button" class="btn btn-info">Add New Question</button>
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
                                Question
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1">
                                Type
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
                                <td>{{ $item->question }}</td>
                                <td>{{ $item->type }}</td>
                                {{--<td>{{ $item->type=='technical'?'Technical':'skill_games'?'Skill Games':'health_and_safety'?'Health & Safety':'maintenance'?'Maintenance' :'Ride ops'}}</td>--}}
                                {!!Form::open( ['route' => ['admin.questions.destroy',$item->id] ,'id'=>'delete-form'.$item->id, 'method' => 'Delete']) !!}
                                {!!Form::close() !!}
                                <td>
                                    @if(auth()->user()->can('questions-edit'))
                                        <a href="{{ route('admin.questions.edit', $item) }}"
                                           class="btn btn-info">Edit</a>
                                    @endif
                                        @if(auth()->user()->can('questions-delete'))

                                        <a class="btn btn-danger" data-name="{{ $item->name }}"
                                           data-url="{{ route('admin.questions.destroy', $item) }}"
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


