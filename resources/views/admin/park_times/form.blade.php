{{--@include('admin.common.errors')--}}
<div class="row">

    <div class="form-group">
        <div class="col-lg-12">
            Park :</label>
        </div>
        <div class="col-lg-12">
            {!! Form::select('park_id', $parks,null, array('class' => 'form-control col-lg-6 select2')) !!}
        </div>
    </div>
    <div class="form-group">
        <div class="col-lg-12">
            {!! Form::label('Open Date') !!}
        </div>
        <div class="col-lg-12">
        {!! Form::date('date',$time->date?? \Carbon\Carbon::now()->toDateString(), ['class' => 'form-control']) !!}
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
        <div class="col-lg-12">
        {!! Form::time('start',$time->start?? \Carbon\Carbon::now()->format('H:i'), ['class' => 'form-control']) !!}
            @if ($errors->has('start'))
            <span class="help-block">
                <strong>{{ $errors->first('start') }}</strong>
            </span>
            @endif
        </div>
    </div>
    <div class="form-group">
        <div class="col-lg-12">
            {!! Form::label('Close Date') !!}
        </div>
        <div class="col-lg-12">
        {!! Form::date('close_date',$time->close_date?? \Carbon\Carbon::now()->toDateString(), ['class' => 'form-control']) !!}
            @if ($errors->has('close_date'))
            <span class="help-block">
                <strong>{{ $errors->first('close_date') }}</strong>
            </span>
            @endif
        </div>
    </div>
    <div class="form-group">
        <div class="col-lg-12">
            {!! Form::label('Closed Time') !!}
        </div>
        <div class="col-lg-12">
        {!! Form::time('end',$time->end?? \Carbon\Carbon::now()->format('H:i'), ['class' => 'form-control']) !!}
            @if ($errors->has('end'))
            <span class="help-block">
                <strong>{{ $errors->first('end') }}</strong>
            </span>
            @endif
        </div>
    </div>
    <br>
    <br>
    <div class="col-xs-12 aligne-center contentbtn">
        <button class="btn btn-primary waves-effect" type="submit">Save</button>
    </div>
</div>