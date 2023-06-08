{{--@include('admin.common.errors')--}}
<div class="row">

        <div class="col-lg-12 form-group">
            {!! Form::label('Open Date') !!}
        <div class="col-lg-12">
            {!! Form::date('date',null,['class'=>'form-control']) !!}
            @if ($errors->has('date'))
                <span class="help-block">
                    <strong>{{ $errors->first('date') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="col-lg-12 form-group">
        {!! Form::label('Start Time') !!}
    <div class="col-lg-12">
        {!! Form::time('start',null,['class'=>'form-control']) !!}
        @if ($errors->has('start'))
            <span class="help-block">
                    <strong>{{ $errors->first('start') }}</strong>
                </span>
        @endif
    </div>
    </div>
        <div class="col-lg-12 form-group">
            {!! Form::label('Close Date') !!}
        <div class="col-lg-12">
            {!! Form::date('close_date',null,['class'=>'form-control']) !!}
            @if ($errors->has('close_date'))
                <span class="help-block">
                    <strong>{{ $errors->first('close_date') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="col-lg-12 form-group">
        {!! Form::label('Closed Time') !!}
    <div class="col-lg-12">
        {!! Form::time('end',null,['class'=>'form-control']) !!}
        @if ($errors->has('end'))
            <span class="help-block">
                    <strong>{{ $errors->first('end') }}</strong>
                </span>
        @endif
    </div>
    </div>
    <div class="col-lg-12 form-group">
        {!! Form::label('No Of Gondolas') !!}
    <div class="col-lg-12">
    {!! Form::number("no_of_gondolas",null,['class'=>'form-control'])!!}
            @if ($errors->has('no_of_gondolas'))
            <span class="help-block">
                    <strong>{{ $errors->first('no_of_gondolas') }}</strong>
                </span>
        @endif
    </div>
    </div>

    <div class="col-lg-12 form-group">
        {!! Form::label('No Of Seats') !!}
    <div class="col-lg-12">
    {!! Form::number("no_of_seats",null,['class'=>'form-control'])!!} 
               @if ($errors->has('no_of_seats'))
            <span class="help-block">
                    <strong>{{ $errors->first('no_of_seats') }}</strong>
                </span>
        @endif
    </div>
    </div>

    <div class="col-lg-12 form-group">
        {!! Form::label('Comment') !!}
    <div class="col-lg-12">
    {!! Form::textArea("comment",null,['class'=>'form-control summernote'])!!} 
               @if ($errors->has('comment'))
            <span class="help-block">
                    <strong>{{ $errors->first('comment') }}</strong>
                </span>
        @endif
    </div>
    </div>

    @if(isset($ride_id))
        {!! Form::input('hidden','ride_id',$ride_id,['class'=>'form-control']) !!}
    @endif
    @if(isset($park_time_id))
        {!! Form::input('hidden','park_time_id',$park_time_id,['class'=>'form-control']) !!}
    @endif
<div class="col-xs-12 aligne-center contentbtn">
    <button class="btn btn-primary waves-effect" type="submit">Save</button>
</div>
</div>
