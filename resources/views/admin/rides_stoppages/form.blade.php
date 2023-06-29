
@if (count($errors) > 0)
<div class="alert alert-danger">
  <ul>
    @foreach ($errors->all() as $error)
    <li>{{ $error }}</li>
    @endforeach
  </ul>
</div>
@endif
<div class="row">
   
    <!--     <div class="col-lg-6 form-group stoppageCategory ">
        <label class="block">Ride Status :</label>
        <div class="">
            {!! Form::select('ride_status', ["stopped"=>'stopped',"active"=>'active'],null, array('class' =>
            'form-control ','placeholder'=>'Ride Status')) !!}
    </div>
@error('name')
    <div class="invalid-feedback" style="color: #ef1010">
{{ $message }}
    </div>
@enderror
    </div>
 -->


    <div class="form-group stoppageSubCategory ">
        <label class="col-lg-12">Stoppage Reasons Main Category :</label>
        <div class="">
            {!! Form::select('stopage_category_id',@$stopage_category?$stopage_category:[],null, array('class' => 'select2 form-control
            mai_category','placeholder'=>'Stoppage main Category')) !!}
        </div>
    </div>
    <div class="col-lg-12 form-group stoppageSubCategory ">
        <label class="block">Stoppage Sub Category :</label>

        <div class="">

        {!! Form::select("stopage_sub_category_id",
            isset($item)?[$item->stopage_sub_category_id =>$item->stopageSubCategory->name]:[],
            isset($item)?$item->stopage_sub_category_id:null,
            ['class'=>'form-control js-example-basic-single ms select2 subCategory','id'=>'subCategory','placeholder'=>'Choose Main Category first'])!!}

           
            @error('stopage_sub_category_id')
            <div class="invalid-feedback" style="color: #ef1010">
                {{ $message }}
            </div>
            @enderror

        </div>
    </div>
    <div class="col-lg-12 form-group ">
        <label class="col-lg-12">Stoppage Type :</label>
        <div class="">
            {!! Form::select('type', ['all_day'=>'All day','time_slot'=>'Time slot'],null, array('class' =>
            'form-control stoppageType','id'=>'type','placeholder'=>'Stoppage type')) !!}
        </div>
        @error('type')
        <div class="invalid-feedback" style="color: #ef1010">
            {{ $message }}
        </div>
        @enderror
    </div>

    <!--     @if(auth()->user()->hasRole('Technical')|| auth()->user()->hasRole('Super Admin'))
        -->
    <div class="col-lg-12 form-group  stoppageCategory ">
        <label class="block">Stoppage Status :</label>
        <div class="">
            {!! Form::select('stoppage_status', ["pending"=>'Pending',"working"=>'Working On',"done"=>'Solved'],null,
            array('class' =>
            'form-control ','placeholder'=>'Stoppage Status')) !!}
        </div>
        @error('stoppage_status')
        <div class="invalid-feedback" style="color: #ef1010">
            {{ $message }}
        </div>
        @enderror
    </div>
    <!--
    @endif
    -->
 <!--    <div class="form-group downTime hidden">
        <label class="col-lg-12">Down Time :</label>
        <div class="col-lg-12">
            {!! Form::number('down_minutes',null,['class'=>'form-control','placeholder'=>'Down Time'])!!}
        </div>
        @error('down_minutes')
        <div class="invalid-feedback" style="color: #ef1010">
            {{--            {{ $message }}--}}
        </div>
        @enderror
    </div> -->
    <div class="form-group">
        <div class="col-lg-12">
            {!! Form::label('Stoppage Start Date') !!}
        </div>
        <div class="col-lg-12">
            {!! Form::date('date',null,['class'=>'form-control']) !!}
            @if ($errors->has('date'))
            <span class="help-block">
                <span class="help-block">
                    <strong>{{ $errors->first('date') }}</strong>
                </span>
                @endif
        </div>
    </div>
</div>
<div class="timeSlot hidden">
    <div class="form-group">
        <div class="col-lg-12">
            {!! Form::label('Stoppage Start Time') !!}
        </div>
        <div class="col-lg-12">
            {!! Form::time('time_slot_start',null,['class'=>'form-control']) !!}
            @if ($errors->has('time_slot_start'))
            <span class="help-block">
                <strong>{{ $errors->first('time_slot_start') }}</strong>
            </span>
            @endif
        </div>
    </div>
</div>
<div class="timeSlot hidden">
    <div class="form-group">
        <div class="col-lg-12">
            {!! Form::label('Stoppage End Time') !!}
        </div>
        <div class="col-lg-12">
            {!! Form::time('time_slot_end',null,['class'=>'form-control']) !!}
            @if ($errors->has('time_slot_end'))
            <span class="help-block">
                <strong>{{ $errors->first('time_slot_end') }}</strong>
            </span>
            @endif
        </div>
    </div>
</div>
<!--  
<div class="form-group">
<div class="col-lg-12">
{!! Form::label('Close Date') !!}
</div>
<div class="col-lg-6">
{!! Form::date('time_slot_end',null,['class'=>'form-control']) !!}
@if ($errors->has('close_date'))
    <span class="help-block">
    <span class="help-block">
    <strong>{{ $errors->first('close_date') }}</strong>
    </span>
@endif
</div>
</div>
</div> -->
@if(auth()->user()->hasRole('Technical') || auth()->user()->hasRole('Super Admin'))
<br><br><br>
<div class="form-group stoppageReason">
    <label class="col-lg-12">Stoppage description :</label>
    <div class="col-lg-12">
        {!! Form::textarea("description",null,['class'=>'form-control','placeholder'=>'Stoppage description'])!!}
    </div>
</div>
@endif
<br><br><br>

<div class="col-lg-12 form-group stoppageReason">
    <label class="">Ride Notes :</label>
    <div class="">
        {!! Form::textarea("ride_notes",null,['class'=>'form-control','placeholder'=>'Ride Notes'])!!}
    </div>
    @error('name')
    <div class="invalid-feedback" style="color: #ef1010">
        {{ $message }}
    </div>
    @enderror
</div>


<div class="form-group">
    @if (isset($album))
    <label class="form-label">Images :</label>
    <div class="row">
        @foreach ($album as $item)
        <div class="col-lg-12">
            <div class="flex-img">
                <input type="text" value="{{$item->comment}}" class="form-control">
                <a >
                <img class="img-preview" src="{{ Storage::disk('s3')->temporaryUrl('images/'.baseName($item->image),now()->addMinutes(30)) }}"
                style="height: 40px; width: 40px"></a> 
             </div>
        </div>
        @endforeach
    </div>
    @endif
</div>

<div class="form-group">
    <label for="name"> Upload Images </label>

    @include('admin.rides_stoppages.images_upload')
</div>
<input type="hidden" name="park_time_id" value="{{$park_time_id}}" >

<div class="editbtnInCenter aligne-center contentbtn">
    <button class="btn btn-primary waves-effect" type="submit">Save</button>
</div>



@push('scripts')
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

$('.stoppageType').change(function() {
    var val = $(this).val();
    console.log(val);
    if (val == "time_slot") {
        $('.downTime').removeClass('hidden');
        $('.timeSlot').removeClass('hidden');
    }
    if (val == "all_day") {
        $('.downTime').addClass('hidden');
        $('.timeSlot').addClass('hidden');
    }
});
</script>
<script>
    $(document).ready(function(){
    var val=$('#type').val();
    console.log(val);

    if (val == "time_slot") {
        $('.downTime').removeClass('hidden');
        $('.timeSlot').removeClass('hidden');
    }
    if (val == "all_day") {
        $('.downTime').addClass('hidden');
        $('.timeSlot').addClass('hidden');
    }
  });
</script>
@endpush