{{--@include('admin.common.errors')--}}
<div class="row">
    <div class="form-group">
        <label class="col-lg-12">Ride :</label></label>
        <div class="col-lg-6">
            {!! Form::select('ride_id', $rides,null, array('class' => 'form-control col-lg-6 select2')) !!}
            @error('ride_id')
            <div class="invalid-feedback" style="color: #ef1010">
                {{ $message }}
            </div>
            @enderror
        </div>
    </div>
    <div class="form-group">
        <label class="col-lg-12">Parks :</label></label>
        <div class="col-lg-6">
            {!! Form::select('park_id', $parks,null, array('class' => 'form-control col-lg-6 select2     ')) !!}
            @error('park_id')
            <div class="invalid-feedback" style="color: #ef1010">
                {{ $message }}
            </div>
            @enderror
        </div>
    </div>

    <div class="form-group stoppageCategory ">
        <label class="col-lg-12">Operator Name :</label></label>
        <div class="col-lg-6">
            {!! Form::select('user_id', $users,null, array('class' => 'form-control col-lg-6 select2','placeholder'=>'CHOOSE Operators')) !!}
            @error('user_id')
            <div class="invalid-feedback" style="color: #ef1010">
                {{ $message }}
            </div>
            @enderror
        </div>
    </div>


    <div class="form-group">
        <label class="col-lg-12">Opened Date :</label>
        <div class="col-lg-6">
            {!! Form::date("opened_date",null,['class'=>'form-control','placeholder'=>'opened_date'])!!}
            @error('opened_date')
            <div class="invalid-feedback" style="color: #ef1010">
                {{ $message }}
            </div>
            @enderror
        </div>
    </div>

    <div class="form-group">
        <label class="col-lg-12">Queue Start Time :</label>
        <div class="col-lg-6">
            {!! Form::datetimeLocal("start_time",null,['class'=>'form-control','placeholder'=>'Start Time'])!!}
            @error('start_time')
            <div class="invalid-feedback" style="color: #ef1010">
                {{ $message }}
            </div>
            @enderror
        </div>
    </div>
    <div class="form-group">
        <label class="col-lg-12">  Queue minutes :</label>
        <div class="col-lg-6">
            {!! Form::number("queue_minutes",null,['class'=>'form-control','placeholder'=>'Queue minutes'])!!}
            @error('queue_minutes')
            <div class="invalid-feedback" style="color: #ef1010">
                {{ $message }}
            </div>
            @enderror
        </div>
    </div>

    <div class="form-group">
        <label class="col-lg-12">Rider count :</label>
        <div class="col-lg-6">
            {!! Form::number("rider_count",null,['class'=>'form-control','placeholder'=>'rider count '])!!}
            @error('rider_count')
            <div class="invalid-feedback" style="color: #ef1010">
                {{ $message }}
            </div>
            @enderror
        </div>
    </div>

    <div class="form-group">
        <label class="col-lg-12">Current wait time :</label>
        <div class="col-lg-6">
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
        <div class="col-lg-6">
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
        <div class="col-lg-6">
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



