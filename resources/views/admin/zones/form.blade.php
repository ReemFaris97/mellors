{{--@include('admin.common.errors')--}}
<div class="row">
<div class="col-xs-12">
<div class="form-group form-float">
    <label class="form-label">Zone Name</label>
    <div class="form-line">
        {!! Form::text("name",null,['class'=>'form-control','placeholder'=>' Zone name'])!!}
        @error('name')
        <div class="invalid-feedback" style="color: #ef1010">
            {{ $message }}
        </div>
        @enderror
    </div>
</div>
</div>
    <div class="col-xs-12">
        <div class="form-group">
            <label class="col-md-3 control-label">Choose Zone Supervisor :</label>
            <div class="col-xs-12 col-md-9">
                {!! Form::select('zone_supervisor', $users,null, array('class' => 'form-control')) !!}
            </div>
        </div>
    </div>
    <div class="col-xs-12">
        <div class="form-group">
            <label class="col-md-3 control-label">Park :</label>
            <div class="col-xs-12 col-md-9">
                {!! Form::select('park_id', $parks,null, array('class' => 'form-control')) !!}
            </div>
        </div>
    </div>

<div class="col-xs-12 aligne-center contentbtn">
    <button class="btn btn-primary waves-effect" type="submit">Save</button>
</div>
</div>
