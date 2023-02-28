{{--@include('admin.common.errors')--}}
<div class="row">
<div class="col-xs-12">
<div class="form-group form-float">
    <label class="form-label">Question :</label>
    <div class="form-line">
        {!! Form::text("question",null,['class'=>'form-control','placeholder'=>' Question'])!!}
        @error('question')
        <div class="invalid-feedback" style="color: #ef1010">
            {{ $message }}
        </div>
        @enderror
    </div>
</div>
    <div class="col-xs-12">
        <div class="form-group form-float">
            <label class="form-label">Type</label>
            <div class="form-line">
                <select class="form-control js-example-basic-single ms"  name="type"
                        data-live-search=true required>
                    <option disabled> Choose Type</option>
                    <option value="technical"> Technical </option>
                    <option value="skill_games"> Skill Games </option>
                    <option value="health_and_safety"> Health & Safety </option>
                    <option value="maintenance"> Maintenance </option>
                    <option value="ride_ops"> Ride Ops </option>
                </select>
                @error ('type')
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
</div>