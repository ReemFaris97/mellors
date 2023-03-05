@extends('admin.layout.app')

@section('title')
    Health And Safety Reports
@endsection

@section('content')

    <div class="card-box">
    <form action="{{url('/search_maintenance_reports')}}" method="GET">

@csrf

<div class="form-group">
    <label for="last_name">Select Park</label>
    {!! Form::select('park_id',$parks,null, array('class' => 'form-control')) !!}
</div>
<div class="form-group">
    <label for="middle_name">Date </label>
    {!! Form::date('date',null,['class'=>'form-control','id'=>'date']) !!}
</div>
<div class="col-xs-12">
    <div class="input-group-btn">
        <button type="submit" class="btn btn-primary save_btn waves-effect">Show</button>
    </div>
</div>
{!!Form::close() !!}

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
                                Maintenance Daily report
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1">
                           Answer
                                   </th>
                            <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1">
                                Comment
                            </th>

                        </tr>
                        </thead>

                        <tbody>
                        @if(isset($items))

                        @foreach ($items as $item)
                            <tr role="row" class="odd" id="row-{{ $item->id }}">
                                <td tabindex="0" class="sorting_1">{{ $item->id }}</td>
                                <td>{{ $item->question }}</td>
                                <td>@if($item->answer == "yes")
                                <label style="background-color: aquamarine;">Yes</label>
                                    @elseif($item->answer == "no")
                                    <label style="background-color: red; font-weight: bold;">No</label>
                                    @else
                                    {{ $item->answer }}
                                    @endif
                                </td>                                
                                <td>{!! $item->comment !!}</td>
                             
                            </tr>

                        @endforeach
                        <tfoot>
                        <tr role="row" class="odd" id="row-{{ $items[0]->id }}">
                        <td tabindex="0" class="sorting_1">{{ $items[0]->id }}</td>
                                <td>    Completed By
                                </td>
                                @forelse($items as $item)
                                <td>{{$item->user->name}}
                                    @break
                                </td>
                                @empty
                                <td>Not found</td>
                                @endforelse
                                                        </tr>
                            
                            
                        </tfoot>
                        @endif
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




