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
            {!! Form::select('park_id', $parks,null, array('class' => 'form-control col-lg-6 select2')) !!}
            @error('park_id')
            <div class="invalid-feedback" style="color: #ef1010">
                {{ $message }}
            </div>
            @enderror
        </div>
    </div>

    <div class="form-group stoppageCategory ">
        <label class="col-lg-12">Operator :</label></label>
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
        <label class="col-lg-12">Number of vip:</label>
        <div class="col-lg-6">
            {!! Form::number("number_of_vip",null,['class'=>'form-control','placeholder'=>'number of vip'])!!}
            @error('number_of_vip')
            <div class="invalid-feedback" style="color: #ef1010">
                {{ $message }}
            </div>
            @enderror
        </div>
    </div>

    <div class="form-group">
        <label class="col-lg-12">Number of disabled:</label>
        <div class="col-lg-6">
            {!! Form::number("number_of_disabled",null,['class'=>'form-control','placeholder'=>'number of disabled'])!!}
            @error('number_of_disabled')
            <div class="invalid-feedback" style="color: #ef1010">
                {{ $message }}
            </div>
            @enderror
        </div>
    </div>

    <div class="form-group">
        <label class="col-lg-12">cycle time minute:</label>
        <div class="col-lg-6">
            {!! Form::number("cycle_time_minute",null,['class'=>'form-control','placeholder'=>'cycle time minute'])!!}
            @error('cycle_time_minute')
            <div class="invalid-feedback" style="color: #ef1010">
                {{ $message }}
            </div>
            @enderror
        </div>
    </div>
    <div class="form-group">
        <label class="col-lg-12">Ride price:</label>
        <div class="col-lg-6">
            {!! Form::number("ride_price",null,['class'=>'form-control','placeholder'=>'Ride price'])!!}
            @error('ride_price')
            <div class="invalid-feedback" style="color: #ef1010">
                {{ $message }}
            </div>
            @enderror
        </div>
    </div>
    <div class="form-group">
        <label class="col-lg-12">Ride price:</label>
        <div class="col-lg-6">
            {!! Form::number("ride_price_vip",null,['class'=>'form-control','placeholder'=>'Ride price vip'])!!}
            @error('ride_price_vip')
            <div class="invalid-feedback" style="color: #ef1010">
                {{ $message }}
            </div>
            @enderror
        </div>
    </div>
    <div class="form-group">
        <label class="col-lg-12">Ride price:</label>
        <div class="col-lg-6">
            {!! Form::number("ride_price_new",null,['class'=>'form-control','placeholder'=>'Ride price new'])!!}
            @error('ride_price_new')
            <div class="invalid-feedback" style="color: #ef1010">
                {{ $message }}
            </div>
            @enderror
        </div>
    </div>

    <div class="form-group">
        <label class="col-lg-12">Ride price vip New:</label>
        <div class="col-lg-6">
            {!! Form::number("ride_price_vip_new",null,['class'=>'form-control','placeholder'=>'Ride price vip New'])!!}
            @error('ride_price_vip_new')
            <div class="invalid-feedback" style="color: #ef1010">
                {{ $message }}
            </div>
            @enderror
        </div>
    </div>
    <div class="form-group">
        <label class="col-lg-12">Sales:</label>
        <div class="col-lg-6">
            {!! Form::number("sales",null,['class'=>'form-control','placeholder'=>'Sales'])!!}
            @error('sales')
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

    <div class="col-xs-12 aligne-center contentbtn">
        <button class="btn btn-primary waves-effect" type="submit">Save</button>
    </div>
</div>



