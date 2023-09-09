{{--@include('admin.common.errors')--}}
<div class="row">
<div class="col-xs-12">
<div class="form-group form-float">
    <label class="form-label">Complaint Item :</label>
    <div class="form-line">
        {!! Form::text("name",null,['class'=>'form-control','placeholder'=>' Complaint Item'])!!}
        @error('name')
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
</div>