{{--@include('admin.common.errors')--}}
<div class="row">

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
        {!! Form::label('Start Time') !!}
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
        {!! Form::label('Closed Time') !!}
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
    @if(isset($id))
        {!! Form::input('hidden','ride_id',$id,['class'=>'form-control']) !!}
    @endif
<div class="col-xs-12 aligne-center contentbtn">
    <button class="btn btn-primary waves-effect" type="submit">Save</button>
</div>
</div>
