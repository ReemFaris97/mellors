{{--@include('admin.common.errors')--}}
<div class="row">

    <div class="form-group">
        <label for="name"> Upload Stoppages Report With File  </label>
        {!! Form::file("file",['class'=>'form-control'])!!}

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

    {{--<div class="form-group">--}}
        {{--<label class="col-lg-12">Ride :</label></label>--}}
        {{--<div class="col-lg-6">--}}
            {{--{!! Form::select('ride_id', $rides,null, array('class' => 'form-control col-lg-6')) !!}--}}
        {{--</div>--}}
    {{--</div>--}}

    {{--<div class="form-group">--}}
        {{--<label class="col-lg-12">Number of seats :</label>--}}
        {{--<div class="col-lg-6">--}}
            {{--{!! Form::number("number_of_seats",null,['class'=>'form-control'])!!}--}}
        {{--</div>--}}
    {{--</div>--}}
    {{--<div class="form-group">--}}
        {{--<label class="col-lg-12">Number of seats :</label>--}}
        {{--<div class="col-lg-6">--}}
            {{--{!! Form::number("number_of_seats",null,['class'=>'form-control'])!!}--}}
        {{--</div>--}}
    {{--</div>--}}
    {{--<div class="form-group">--}}
        {{--<label class="col-lg-12">Number of seats :</label>--}}
        {{--<div class="col-lg-6">--}}
            {{--{!! Form::number("number_of_seats",null,['class'=>'form-control'])!!}--}}
        {{--</div>--}}
    {{--</div>--}}

    {{--<div class="form-group stoppageCategory hidden">--}}
        {{--<label class="col-lg-12">Stoppage Category :</label></label>--}}
        {{--<div class="col-lg-6">--}}
            {{--{!! Form::select('', $stopage_category,null, array('class' => 'form-control col-lg-6','placeholder'=>'Stoppage category')) !!}--}}
        {{--</div>--}}
    {{--</div>--}}
    {{--<div class="form-group stoppageSubCategory hidden">--}}
        {{--<label class="col-lg-12">Stoppage Sub Category :</label></label>--}}
        {{--<div class="col-lg-6">--}}
            {{--{!! Form::select('stopage_sub_category_id', $stopage_sub_category,null, array('class' => 'form-control col-lg-6','placeholder'=>'Stoppage sub Category')) !!}--}}
        {{--</div>--}}
    {{--</div>--}}
    {{--<div class="form-group stoppageReason hidden">--}}
        {{--<label class="col-lg-12">Stoppage Reason :</label></label>--}}
        {{--<div class="col-lg-6">--}}
            {{--{!! Form::textarea("stoppage_reason",null,['class'=>'form-control','placeholder'=>'Stoppage Reason'])!!}--}}
        {{--</div>--}}
    {{--</div>--}}




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

