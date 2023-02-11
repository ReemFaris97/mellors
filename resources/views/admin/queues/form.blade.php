{{--@include('admin.common.errors')--}}
<div class="row">
    <div class="form-group">
        <label class="col-lg-12">Ride :</label></label>
        <div class="col-lg-6">
            {!! Form::select('ride_id', $rides,null, array('class' => 'form-control col-lg-6')) !!}
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
            {!! Form::select('park_id', $parks,null, array('class' => 'form-control col-lg-6')) !!}
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
            {!! Form::select('user_id', $users,null, array('class' => 'form-control col-lg-6','placeholder'=>'CHOOSE Operators')) !!}
            @error('user_id')
            <div class="invalid-feedback" style="color: #ef1010">
                {{ $message }}
            </div>
            @enderror
        </div>
    </div>


    <div class="form-group">
        <label class="col-lg-12">Seats filled :</label>
        <div class="col-lg-6">
            {!! Form::number("seats_filled",null,['class'=>'form-control','placeholder'=>'Seats filled '])!!}
            @error('seats_filled')
            <div class="invalid-feedback" style="color: #ef1010">
                {{ $message }}
            </div>
            @enderror
        </div>
    </div>

    <div class="form-group">
        <label class="col-lg-12"> Date :</label>
        <div class="col-lg-6">
            {!! Form::date("date",null,['class'=>'form-control','placeholder'=>'opened_date'])!!}
            @error('date')
            <div class="invalid-feedback" style="color: #ef1010">
                {{ $message }}
            </div>
            @enderror
        </div>
    </div>
    <div class="form-group">
        <label class="col-lg-12">  Time :</label>
        <div class="col-lg-6">
            {!! Form::time("time",null,['class'=>'form-control','placeholder'=>'time'])!!}
            @error('time')
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
        <label class="col-lg-12">  Queue seconds :</label>
        <div class="col-lg-6">
            {!! Form::number("queue_seconds",null,['class'=>'form-control','placeholder'=>'Queue seconds'])!!}
            @error('queue_seconds')
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



