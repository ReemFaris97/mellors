{{--@include('admin.common.errors')--}}
<div class="row">
    <div class="col-xs-12">
        <div class="form-group form-float">
            <label class="form-label">Ride</label>
            <div class="form-line">
                {!! Form::select('ride_id', $rides,null, array('class' => 'form-control')) !!}
                @error('ride_id')
                <div class="invalid-feedback" style="color: #ef1010">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>

        <div class="col-xs-12">
            <div class="form-group form-float">
                <label class="form-label">RSR Report Type</label>
                <div class="form-line">
                    <select name="type" class="form-control">
                        <option value="{{ 'with_stoppages' }}"> With Stoppages</option>
                        <option value="{{ 'without_stoppages' }}"> Without Stoppages </option>
                    </select>
                    @error('type')
                    <div class="invalid-feedback" style="color: #ef1010">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>
        </div>

<div class="col-xs-12">
<div class="form-group form-float">
    <label class="form-label">Ride Performance Details</label>
    <div class="form-line">
        {!! Form::textArea("ride_performance_details",null,['class'=>'form-control summernote','placeholder'=>' Ride Performance Details'])!!}
        @error('ride_performance_details')
        <div class="invalid-feedback" style="color: #ef1010">
            {{ $message }}
        </div>
        @enderror
    </div>
</div>
</div>
        <div class="col-xs-12">
            <div class="form-group form-float">
                <label class="form-label">Ride Inspection</label>
                <div class="form-line">
                    {!! Form::textArea("ride_inspection",null,['class'=>'form-control summernote','placeholder'=>' Ride Inspection'])!!}
                    @error('ride_inspection')
                    <div class="invalid-feedback" style="color: #ef1010">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>
        </div>
        <div class="col-xs-12">
            <div class="form-group form-float">
                <label class="form-label">Corrective Actions Taken</label>
                <div class="form-line">
                    {!! Form::textArea("corrective_actions_taken",null,['class'=>'form-control summernote','placeholder'=>'Corrective Actions Taken'])!!}
                    @error('corrective_actions_taken')
                    <div class="invalid-feedback" style="color: #ef1010">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>
        </div>
        <div class="col-xs-12">
            <div class="form-group form-float">
                <label class="form-label">Conclusion</label>
                <div class="form-line">
                    {!! Form::textArea("conclusion",null,['class'=>'form-control summernote','placeholder'=>'conclusion'])!!}
                    @error('conclusion')
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
                    {!! Form::date("date",null,['class'=>'form-control','placeholder'=>' comment'])!!}
                    @error('date')
                    <div class="invalid-feedback" style="color: #ef1010">
                        {{ $message }}
                    </div>
                      @enderror
                </div>
            </div>
        </div>

        <div class="form-group">
            <label for="name"> Upload RSR Report Images  </label>
        {!! Form::file('file[]',[
                                  "class"=>"form-control  file_upload_preview",
                                  "multiple" => "multiple",
                                  "data-preview-file-type"=>"text"
                                              ]) !!}
        </div>

<div class="col-xs-12 aligne-center contentbtn">
    <button class="btn btn-primary waves-effect" type="submit">Save</button>
</div>
</div>
</div>


