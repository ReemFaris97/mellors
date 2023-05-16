@extends('admin.layout.app')

@section('title')
    Health And Safety Reports
@endsection

@section('content')

    <div class="card-box">

                      @if(isset($items))
                        @foreach ($items as $item)
                            <tr role="row" class="odd" id="row-{{ $item->id }}">
                                <td tabindex="0" class="sorting_1">{{ $loop->iteration }}</td>
                                <td>{{ $item->question }}</td>
                                <td>{{$item->answer }}                            
                                <td>{!! $item->comment !!}</td>
                                {!!Form::open( ['route' => ['admin.health_and_safety_reports.destroy',$item->id] ,'id'=>'delete-form'.$item->id, 'method' => 'Delete']) !!}
                                {!!Form::close() !!}
                                <td>
                                    @if(auth()->user()->can('health_and_safety_reports-edit'))
                                        <a href="{{ route('admin.health_and_safety_reports.edit', $item) }}"
                                           class="btn btn-info">Edit</a>
                                    @endif
                                        @if(auth()->user()->can('health_and_safety_reports-delete'))

                                        <a class="btn btn-danger" data-name="{{ $item->name }}"
                                           data-url="{{ route('admin.health_and_safety_reports.destroy', $item) }}"
                                           onclick="delete_form(this)">
                                            Delete
                                        </a>
                                        @endif

                                </td>

                            </tr>
                        @endforeach

                        @endif

                        </tbody>
                    @if(isset($redFlags))

                    <div class='mt-4'>
                    <h4 class='redFlags'>Edit RED FLAGS</h4>
                    <table id="datatable-buttons "
                        class="table table-striped table-bordered dt-responsive nowrap redFlag tableRedFlag  mt-2">
                        <thead>
                            <tr role="row">
                                <th class="sorting_asc" tabindex="0" aria-controls="datatable-buttons" rowspan="1"
                                    colspan="4" aria-sort="ascending">RIDES
                                </th>
                                <th style="display: none;" class="sorting" tabindex="0"
                                    aria-controls="datatable-buttons">

                                </th>
                                <th style="display: none;" class="sorting" tabindex="0"
                                    aria-controls="datatable-buttons">

                                </th>

                                <th style="display: none;" class="sorting" tabindex="0"
                                    aria-controls="datatable-buttons">

                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($redFlags as $item)
                            <tr>
                                <td tabindex="0" class="sorting_1">22</td>
                                <td>33</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    </div>
                      @else

                    </table>

                </div>
            </div>

        </div>
    </div>
@endsection
@section('footer')
    @include('admin.datatable.scripts')
@endsection




