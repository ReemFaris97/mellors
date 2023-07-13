@extends('admin.layout.app')

@section('title')
   All Rides Stoppages
@endsection

@section('content')

    <div class="card-box">
    @if (request()->is('show_stoppages/*/*')) 
    <a href="{{url('add_stoppage/'.$ride_id.'/'.$park_time_id)}}">
            <button type="button" class="btn btn-info">Create New Stoppage</button>
    </a>
   @endif
        <br><br>
        <form class="formSection" action="{{url('/search_stoppages')}}" method="GET">
            @csrf
        <div class="row">
    <div class='col-md-5'>
        <div class="form-group">
            <label for="middle_name">Time Slot Date </label>
            {!! Form::date('date',null,['class'=>'form-control','id'=>'date']) !!}
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
                                Ride Name
                            </th>

                            <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1">
                                Ride Number
                            </th>
                        
                            <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1">
                                Operator Number
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1">
                                Operator Name
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1">
                            Time Slot Date
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1">
                                Time
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1">
                                Ride_Status
                            </th>
                         <!--    <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1">
                                Change Stoppage Status
                            </th> -->
                            <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1">
                                Stoppage Status
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1">
                                Ride Stoppage Category
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1">
                                Ride Notes
                            </th>

                            <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1">
                                Down Times
                            </th>

                            <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1">
                                Process
                            </th>
                        </tr>
                        </thead>

                        <tbody>

                        @foreach ($items as $item)
                            <tr role="row" class="odd" id="row-{{ $item->id }}">
                                <td tabindex="0" class="sorting_1">{{ $loop->iteration }}</td>
                                <td>{{ $item->ride->name }}</td>
                                <td>{{ $item->ride->id }}</td>
                                <td>{{ $item->user->user_number??"" }}</td>
                                <td>{{ $item->user->name }}</td>
                                <td>{{ $item->opened_date }}</td>
                                <td>{{ $item->time }}</td>
                                <td>
                                @if($item->ride_status=='stopped')
                                <span class=" btn-xs btn-danger">Stopped</span>
                                  @else
                                  <span class=" btn-xs btn-success">Active</span>
                                @endif
                                </td>

                                <td>
                                @if($item->stoppage_status=='pending')
                                <span class=" btn-xs btn-primary">Pending
                                  @elseif($item->stoppage_status=='working')
                                  <span class=" btn-xs btn-danger">Working On
                                  @else
                                  <span class=" btn-xs btn-success">Solved
                                @endif
                                </td>
                                <td>{{ $item->stopageSubCategory->name ?? "name" }}</td>
                                <td>{{ $item->ride_notes }}</td>
                                <td>{{ $item->down_minutes?? "Stop All Day" }}</td>
                                {!!Form::open( ['route' => ['admin.rides-stoppages.destroy',$item->id] ,'id'=>'delete-form'.$item->id, 'method' => 'Delete']) !!}
                                {!!Form::close() !!}
                                <td>
                                 @if(auth()->user()->can('rsr_reports-creat'))

                                    <a href="{{url('add_rsr_stoppage_report/'.$item->id)}}"
                                       class="btn btn-info">Add RSR report</a>
                                 @endif
                                 @if(auth()->user()->can('rides-stoppages-edit'))
                                 @if($item->ride_status=='stopped' && $item->type=='all_day' )

                                   <button type="button" class="btn btn-warning  " data-toggle="modal"
                                        data-target="#modal-{{ $item->id }}"><i class="fa fa-edit"></i> Extend
                                    </button>
                                    <div class="modal fade" id="modal-{{ $item->id }}" tabindex="-1" aria-hidden="true"
                                        role="dialog">
                                        <div class="modal-dialog modal-lg" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title" id="defaultModalLabel">
                                                        Extend</h4>
                                                </div>
                                                <div class="modal-body">

                                                    {!!Form::model($item , ['route' =>
                                                    ['admin.rides-stoppages.updateStoppageStatus' ,
                                                    $item->id],'id' => 'ClientStore', 'method' => 'PATCH',
                                                    'enctype'=>"multipart/form-data"]) !!}
                                                    <label class="form-label">Stoppage Reasons Main Category</label>
                                                        <div class="form-line">
                                                        {!! Form::select('stopage_category_id',@$stopage_category?$stopage_category:[],null, array('class' => ' form-control
                                                                mai_category','placeholder'=>'Stoppage main Category')) !!}

                                                            @if ($errors->has('stopage_category_id'))
                                                            <span class="help-block">
                                                                <strong>{{ $errors->first('stopage_category_id') }}</strong>
                                                            </span>
                                                            @endif
                                                        </div>
                                                        <label class="form-label">Stoppage Sub Category</label>
                                                        <div class="form-line">
                                                        {!! Form::select("stopage_sub_category_id",
                                                                    isset($item)?[$item->stopage_sub_category_id =>$item->stopageSubCategory->name]:[],
                                                                    isset($item)?$item->stopage_sub_category_id:null,
                                                                    ['class'=>'form-control js-example-basic-single ms  subCategory','id'=>'subCategory','placeholder'=>'Choose Main Category first'])!!}

           
                                                            @if ($errors->has('stopage_sub_category_id'))
                                                            <span class="help-block">
                                                                <strong>{{ $errors->first('stopage_sub_category_id') }}</strong>
                                                            </span>
                                                            @endif
                                                        </div>
                                                    <label class="form-label"> Stoppage Status </label>
                                                    <div class="form-line">
                                                    {!! Form::select('stoppage_status', ["working"=>'Working On',"done"=>'Solved'],null,
                                                                array('class' =>
                                                                'form-control ','placeholder'=>'Stoppage Status'))
                                                    !!}

                                                        @if ($errors->has('stoppage_status'))
                                                        <span class="help-block">
                                                            <strong>{{ $errors->first('stoppage_status') }}</strong>
                                                        </span>
                                                        @endif
                                                        <br><br>
                                                        <label class="form-label"> Stoppage Description </label>
                                                        <div class="form-line">
                                                            {!! Form::textArea('description', null, ['class' =>
                                                            'form-control summernote']) !!}

                                                            @if ($errors->has('description'))
                                                            <span class="help-block">
                                                                <strong>{{ $errors->first('description') }}</strong>
                                                            </span>
                                                            @endif
                                                            {!! Form::hidden('stoppage_id', $item->id, ['class' =>
                                                            'form-control']) !!}
                                                            {!! Form::hidden('parkTimeId', $item->park_time_id, ['class' =>
                                                            'form-control']) !!}
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button class="btn btn-primary waves-effect saveProject"
                                                            type="submit">Save
                                                        </button>
                                                    </div>

                                                    {!! Form::close() !!}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endif



                                    <a href="{{ route('admin.rides-stoppages.edit', $item) }}"
                                       class="btn btn-info">Edit</a>
                                 @endif
                                 @if(auth()->user()->can('rides-stoppages-delete'))

                                        <a class="btn btn-danger" data-name="{{ $item->name }}"
                                           data-url="{{ route('admin.rides-stoppages.destroy', $item) }}"
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
@push('scripts')
<script type="text/javascript">
$("#ClientStore").popover({
    title: '<h4>Update Stoppage Status</h4>',
    container: 'body',
    placement: 'bottom',
    html: true,
    content: function() {
        return $('#popover-form').html();
    }
});
</script>
<script type="text/javascript">
$('.mai_category').change(function() {
    var val = $(this).val();
    $.ajax({
        type: "post",
        url: "{{ route('admin.getSubStoppageCategories') }}",
        data: {
            'stopage_category_id': val,
            '_token': "{{ @csrf_token() }}"
        },
        success: function(data) {
            var options = '<option disabled>Choose Main Category</option>';
            $.each(data.subCategory, function(key, value) {
                options += '<option value="' + value.id + '">' + value.name +
                    '</option>';

            });
            $("#subCategory").empty().append(options);
        }
    });
});
</script>

@endpush

@section('footer')
    @include('admin.datatable.scripts')
@endsection


