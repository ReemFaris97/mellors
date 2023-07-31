{{--@include('admin.common.errors')--}}
<div class="row">

<div class="col-xs-12">
<div class="form-group form-float">
    <label class="form-label">Date Reported</label>
    <div class="form-line">
        {!! Form::date("date_reported",null,['class'=>'form-control'])!!}
    </div>
</div>
</div>
<div class="col-xs-12">
<div class="form-group form-float">
    <label class="form-label">Snag</label>
    <div class="form-line">
        {!! Form::textArea("snag",null,['class'=>'form-control'])!!}
    </div>
</div>
</div>

<div class="col-xs-12">
<div class="form-group form-float">
    <label class="form-label">Department</label>
    <div class="form-line">
    {!! Form::select('department_id', $departments,null, array('class' => 'form-control select2')) !!}
        @error('department_id')
        <div class="invalid-feedback" style="color: #ef1010">
            {{ $message }}
        </div>
        @enderror
    </div>
</div>
</div>

