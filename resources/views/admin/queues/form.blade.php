{{--@include('admin.common.errors')--}}
<div class="row">


    <div class="form-group">
        <label class="col-lg-12">Queue Start Time :</label>
        <div class="    ">
            {!! Form::datetimeLocal("start_time",null,['class'=>'form-control','placeholder'=>'Start Time'])!!}
            @error('start_time')
            <div class="invalid-feedback" style="color: #ef1010">
                {{ $message }}
            </div>
            @enderror
        </div>
    </div>
    <div class="form-group">
        <label class="col-lg-12">  Queue seconds :</label>
        <div class="    ">
            {!! Form::number("queue_seconds",null,['class'=>'form-control','placeholder'=>'Queue seconds'])!!}
            @error('queue_seconds')
            <div class="invalid-feedback" style="color: #ef1010">
                {{ $message }}
            </div>
            @enderror
        </div>
    </div>
    <div class="form-group">
        <label class="col-lg-12">Rider count :</label>
        <div class="    ">
            {!! Form::number("riders_count",null,['class'=>'form-control','placeholder'=>'rider count '])!!}
            @error('rider_count')
            <div class="invalid-feedback" style="color: #ef1010">
                {{ $message }}
            </div>
            @enderror
        </div>
    </div>

    <div class="form-group">
        <label class="col-lg-12">Current wait time :</label>
        <div class="    ">
            {!! Form::number("current_wait_time",null,['class'=>'form-control','placeholder'=>'Current wait time'])!!}
            @error('current_wait_time')
            <div class="invalid-feedback" style="color: #ef1010">
                {{ $message }}
            </div>
            @enderror
        </div>
    </div>
    <div class="form-group">
        <label class="col-lg-12">Max Queue Capacity :</label>
        <div class="    ">
            {!! Form::number("max_queue_capacity",null,['class'=>'form-control','placeholder'=>'Max Queue Capacity'])!!}
            @error('max_queue_capacity')
            <div class="invalid-feedback" style="color: #ef1010">
                {{ $message }}
            </div>
            @enderror
        </div>
    </div>
    <div class="form-group">
        <label class="col-lg-12">Current Queue Occupancy :</label>
        <div class="    ">
            {!! Form::number("current_queue_occupancy",null,['class'=>'form-control','placeholder'=>'Current Queue Occupancy'])!!}
            @error('current_queue_occupancy')
            <div class="invalid-feedback" style="color: #ef1010">
                {{ $message }}
            </div>
            @enderror
        </div>
    </div>

    <div class="col-xs-12 aligne-center contentbtn">
        <button class="btn btn-primary waves-effect" type="submit">Save</button>
    </div>
</div>



