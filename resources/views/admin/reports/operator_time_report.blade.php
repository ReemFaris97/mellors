@extends('admin.layout.app')

@section('title')
Operator Time Report
@endsection

@section('content')

    <div class="card-box">
        <form class="formSection" action="{{url('/show-operator-time-report/')}}" method="GET">
            @csrf
        <div class="row">
    <div class='col-md-3'>
        <div class="form-group">
            <label for="last_name">Select Operator</label>
            {!! Form::select('user_id',$users,null, array('class' => 'form-control select2','id'=>'user','placeholder'=>'Choose Operator') ) !!}
        </div>
    </div>

    <div class='col-md-3'>
        <div class="form-group">
            <label for="middle_name">Time Slot Date From </label>
            {!! Form::date('from',null,['class'=>'form-control ','id'=>'date']) !!}
        </div>
    </div> 
    <div class='col-md-3'>
        <div class="form-group">
            <label for="middle_name">Time Slot Date To </label>
            {!! Form::date('to',null,['class'=>'form-control','id'=>'date']) !!}
        </div>
    </div>
    <div class='col-md-2 mtButton'>
        <div class="input-group-btn">
            <button type="submit" class="btn btn-primary save_btn waves-effect">Show</button>
        </div>
    </div>
</div>
            {!!Form::close() !!}
    </div>
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
                               Operator Name
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1">
                                Ride Name
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1">
                                Work Hours
                            </th>
                            
                        </tr>
                        </thead>

                        <tbody>
                      @if(isset($items))
                        @foreach ($items as $item)
                            <tr role="row" class="odd" id="row-{{ $item->id }}">
                                <td tabindex="0" class="sorting_1">{{ $loop->iteration }}</td>
                                <td>{{ $currentUser->name}}</td>
                                <td>{{ $item->ride->name }}</td>
                                <td>{{ $item->total_hours}}</td>
                            </tr>

                        @endforeach
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


