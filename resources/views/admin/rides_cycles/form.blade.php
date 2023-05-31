{{--@include('admin.common.errors')--}}
<div class="row">
    <div class="form-group">
        <label class="col-lg-12">Riders Count :</label>
        <div class="">
            {!! Form::number("riders_count",null,['class'=>'form-control','placeholder'=>'riders count '])!!}
            @error('riders_count')
            <div class="invalid-feedback" style="color: #ef1010">
                {{ $message }}
            </div>
            @enderror
        </div>
    </div>
    <div class="form-group">
        <label class="col-lg-12">Number of vip:</label>
        <div class="">
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
        <div class="  ">
            {!! Form::number("number_of_disabled",null,['class'=>'form-control','placeholder'=>'number of disabled'])!!}
            @error('number_of_disabled')
            <div class="invalid-feedback" style="color: #ef1010">
                {{ $message }}
            </div>
            @enderror
        </div>
    </div>
    <div class="form-group">
        <label class="col-lg-12">Number Of Fast Track:</label>
        <div class="  ">
            {!! Form::number("number_of_ft",null,['class'=>'form-control','placeholder'=>'Number Of Fast Track'])!!}
            @error('number_of_ft')
            <div class="invalid-feedback" style="color: #ef1010">
                {{ $message }}
            </div>
            @enderror
        </div>
    </div>

    <div class="form-group">
        <label class="col-lg-12">Cycle Duration /Second:</label>
        <div class="  ">
            {!! Form::number("duration_seconds",null,['class'=>'form-control','placeholder'=>'Cycle Duration'])!!}
            @error('duration_seconds')
            <div class="invalid-feedback" style="color: #ef1010">
                {{ $message }}
            </div>
            @enderror
        </div>
    </div>
    <div class="form-group">
        <label class="col-lg-12">Sales:</label>
        <div class="  ">
            {!! Form::number("sales",null,['class'=>'form-control','placeholder'=>'Salles'])!!}
            @error('sales')
            <div class="invalid-feedback" style="color: #ef1010">
                {{ $message }}
            </div>
            @enderror
        </div>
    </div>
       <div class="form-group">
        <label class="col-lg-12">Cycle Start Time :</label>
        <div class="  ">
            {!! Form::datetimeLocal("start_time",null,['class'=>'form-control','placeholder'=>'Start Time'])!!}
            @error('start_time')
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



