{{--@include('admin.common.errors')--}}
<div class="row">
<div class="col-xs-12">
<div class="form-group form-float">
    <label class="form-label">Ride Name</label>
    <div class="form-line">
        {!! Form::text("",$observation->ride->name,['class'=>'form-control', 'readonly'])!!}
    </div>
</div>
</div>
<div class="col-xs-12">
<div class="form-group form-float">
    <label class="form-label">Date Reported</label>
    <div class="form-line">
        {!! Form::text("date_reported",$observation->date_reported,['class'=>'form-control', 'readonly'])!!}
    </div>
</div>
</div>
<div class="col-xs-12">
<div class="form-group form-float">
    <label class="form-label">Snag</label>
    <div class="form-line">
        {!! Form::textArea("snag",$observation->snag,['class'=>'form-control', 'readonly'])!!}
    </div>
</div>
</div>
 <div class="col-xs-12">
<div class="form-group form-float">
    <label class="form-label"> Date Resolved</label>
    <div class="form-line">
        {!! Form::date('date_resolved', \Carbon\Carbon::now()->toDateString(), ['class' => 'form-control']) !!}
        @error('date_resolved')
        <div class="invalid-feedback" style="color: #ef1010">
            {{ $message }}
        </div>
        @enderror
        </div>
    </div>
 </div>
 <div class="col-xs-12">
<div class="form-group form-float">
    <label class="form-label">Maintenance Feed Back</label>
    <div class="form-line">
        {!! Form::textArea("maintenance_feedback",null,['class'=>'form-control','placeholder'=>' Maintenance Feed Back'])!!}
        @error('maintenance_feedback')
        <div class="invalid-feedback" style="color: #ef1010">
            {{ $message }}
        </div>
        @enderror
    </div>
</div>
</div>
<div class="col-xs-12">
<div class="form-group form-float">
    <label class="form-label">RF Number</label>
    <div class="form-line">
        {!! Form::number("rf_number",null,['class'=>'form-control'])!!}
        @error('rf_number')
        <div class="invalid-feedback" style="color: #ef1010">
            {{ $message }}
        </div>
        @enderror
    </div>
</div>
</div>
<div class="col-xs-12">
<div class="form-group form-float">
    <label class="form-label">Reported On Tech Sheet</label>
    <div class="form-line">
    {!! Form::select('reported_on_tech_sheet', ['yes' => 'Yes', 'no' => 'No'], null, ['class' => 'form-control']) !!}
        @error('reported_on_tech_sheet')
        <div class="invalid-feedback" style="color: #ef1010">
            {{ $message }}
        </div>
        @enderror
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
<div class="col-xs-12 aligne-center contentbtn">
    <button class="btn btn-primary waves-effect" type="submit">Save</button>
</div>
</div>
