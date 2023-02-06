{{--@include('admin.common.errors')--}}
<div class="row">
    <div class="form-group">
        <label class="col-lg-12">Ride :</label></label>
        <div class="col-lg-6">
            {!! Form::select('ride_id', $rides,null, array('class' => 'form-control col-lg-6')) !!}
        </div>
    </div>

    <div class="form-group stoppageCategory ">
        <label class="col-lg-12">Operator :</label></label>
        <div class="col-lg-6">
            {!! Form::select('user_id', $users,null, array('class' => 'form-control col-lg-6','placeholder'=>'Operators')) !!}
        </div>
    </div>
    <div class="form-group stoppageSubCategory ">
        <label class="col-lg-12">Stoppage Sub Category :</label></label>
        <div class="col-lg-6">
            {!! Form::select('stopage_sub_category_id', $stopage_sub_category,null, array('class' => 'form-control col-lg-6','placeholder'=>'Stoppage sub Category')) !!}
        </div>
    </div>

    <div class="form-group stoppageReason">
        <label class="col-lg-12">Ride Notes :</label></label>
        <div class="col-lg-6">
            {!! Form::textarea("ride_notes",null,['class'=>'form-control','placeholder'=>'Ride Notes'])!!}
        </div>
    </div>

{{--    <div class="form-group">--}}
{{--        <label class="col-lg-12">Number of seats :</label>--}}
{{--        <div class="col-lg-6">--}}
{{--            {!! Form::number("number_of_seats",null,['class'=>'form-control'])!!}--}}
{{--        </div>--}}
{{--    </div>--}}
{{--    <div class="form-group">--}}
{{--        <label class="col-lg-12">operator number :</label>--}}
{{--        <div class="col-lg-6">--}}
{{--            {!! Form::number("operator_number",null,['class'=>'form-control'])!!}--}}
{{--        </div>--}}
{{--    </div>--}}
{{--    <div class="form-group">--}}
{{--        <label class="col-lg-12">Operator Name :</label>--}}
{{--        <div class="col-lg-6">--}}
{{--            {!! Form::text("operator_name",null,['class'=>'form-control','placeholder'=>'Operator Name'])!!}--}}
{{--        </div>--}}
{{--    </div>--}}
    <div class="form-group">
        <label class="col-lg-12">Down Time :</label>
        <div class="col-lg-6">
            {!! Form::number("down_minutes",null,['class'=>'form-control','placeholder'=>'Down Time'])!!}
        </div>
    </div>
    <div class="form-group">
        <label class="col-lg-12"> Date :</label>
        <div class="col-lg-6">
            {!! Form::date("date",null,['class'=>'form-control','placeholder'=>'opened_date'])!!}
        </div>
    </div>
    <div class="form-group">
        <label class="col-lg-12"> Date :</label>
        <div class="col-lg-6">
            {!! Form::time("date_time",null,['class'=>'form-control','placeholder'=>'date_time'])!!}
        </div>
    </div>
    <div class="form-group">
        <label class="col-lg-12">Opened Date :</label>
        <div class="col-lg-6">
            {!! Form::date("opened_date",null,['class'=>'form-control','placeholder'=>'opened_date'])!!}
        </div>
    </div>

    <div class="col-xs-12 aligne-center contentbtn">
        <button class="btn btn-primary waves-effect" type="submit">Save</button>
    </div>
</div>

{{--'ride_id',--}}
{{--'number_of_seats',--}}
{{--'operator_number',--}}
{{--'operator_name',--}}
{{--'ride_status',--}}
{{--'stopage_sub_category_id',--}}
{{--'ride_notes',--}}
{{--'date',--}}
{{--'time',--}}
{{--'opened_date',--}}
{{--'date_time',--}}
{{--'down_minutes'--}}
{{--<div class="row">--}}


{{--<div class="col-xs-12 aligne-center contentbtn">--}}
{{--<button class="btn btn-primary waves-effect" type="submit">Save</button>--}}
{{--</div>--}}
{{--</div>--}}

{{--@push('scripts')--}}

{{--<script>--}}
{{--$('.rideType').change(function (){--}}
{{--let type =$(this).val();--}}
{{--if (this.value == 0)--}}
{{--$('.stoppageCategory').removeClass('hidden');--}}
{{--$('.stoppageSubCategory').removeClass('hidden');--}}
{{--$('.stoppageReason').removeClass('hidden');--}}
{{--});--}}
{{--</script>--}}
{{--@endpush--}}

