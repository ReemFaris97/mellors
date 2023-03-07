{{--@include('admin.common.errors')--}}
<div class="row">
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
            <label class="form-label">Accident Time</label>
            <div class="form-line">
                {!! Form::time("time",null,['class'=>'form-control'])!!}
                @error('time')
                <div class="invalid-feedback" style="color: #ef1010">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>
    </div>
    <input type="hidden" name="ride_id" value="{{$ride_id}}">
    <input type="hidden" name="park_time_id" value="{{$park_time_id}}">
<div class="col-xs-12 aligne-center contentbtn">
    <button class="btn btn-primary waves-effect" type="submit">Save</button>
</div>
</div>
