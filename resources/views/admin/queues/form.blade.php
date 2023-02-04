{{--@include('admin.common.errors')--}}
<div class="row">
    <div class="form-group">
        <div class="col-lg-12">
            {!! Form::label('Ride') !!}
        </div>
        <div class="col-lg-6">
            {!! Form::select('ride_id', $rides,null, array('class' => 'form-control')) !!}
            @if ($errors->has('ride_id'))
                <span class="help-block">
                    <strong>{{ $errors->first('ride_id') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="form-group">
        <div class="col-lg-12">
            {!! Form::label('Date') !!}
        </div>
        <div class="col-lg-6">
            {!! Form::date('date',null,['class'=>'form-control']) !!}
            @if ($errors->has('date'))
                <span class="help-block">
                    <strong>{{ $errors->first('date') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="form-group">
        <div class="col-lg-12">
            {!! Form::label('Queue Minutes') !!}
        </div>
        <div class="col-lg-6">
            {!! Form::number('queue_minutes',null,['class'=>'form-control','id'=>'phone','placeholder'=>'Queue Minutes']) !!}
            @if ($errors->has('queue_minutes'))
                <span class="help-block">
                    <strong>{{ $errors->first('queue_minutes') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="form-group">
    <div class="col-lg-12">
        {!! Form::label('Start Time (Optional)') !!}
    </div>
    <div class="col-lg-6">
        {!! Form::time('start',null,['class'=>'form-control']) !!}
        @if ($errors->has('start'))
            <span class="help-block">
                    <strong>{{ $errors->first('start') }}</strong>
                </span>
        @endif
    </div>
    </div>

    <div class="form-group">
    <div class="col-lg-12">
        {!! Form::label('End Time (Optional)') !!}
    </div>
    <div class="col-lg-6">
        {!! Form::time('end',null,['class'=>'form-control']) !!}
        @if ($errors->has('end'))
            <span class="help-block">
                    <strong>{{ $errors->first('end') }}</strong>
                </span>
        @endif
    </div>
    </div>

<div class="col-xs-12 aligne-center contentbtn">
    <button class="btn btn-primary waves-effect" type="submit">Save</button>
</div>
</div>
