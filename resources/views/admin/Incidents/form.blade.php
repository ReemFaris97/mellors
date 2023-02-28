{{--@include('admin.common.errors')--}}
<div class="row">
<div class="col-xs-12">
<div class="form-group form-float">
    <label class="form-label">Ride</label>
    <div class="form-line">
        {!! Form::select("ride_id",$rides,null,['class'=>'form-control','placeholder'=>' Select ride '])!!}
        @error('ride_id')
        <div class="invalid-feedback" style="color: #ef1010">
            {{ $message }}
        </div>
        @enderror
    </div>
</div>
</div>
    <div class="col-xs-12">
        <div class="form-group form-float">
            <label class="form-label">Description</label>
            <div class="form-line">
                {!! Form::textArea("comment",null,['class'=>'form-control summernote','placeholder'=>'Description'])!!}
                @error('comment')
                <div class="invalid-feedback" style="color: #ef1010">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>
    </div>
    <div class="col-xs-12">
        <div class="form-group form-float">
            <label class="form-label">Date</label>
            <div class="form-line">
                {!! Form::date("date",null,['class'=>'form-control'])!!}
                @error('date')
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
