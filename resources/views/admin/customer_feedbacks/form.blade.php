{{--@include('admin.common.errors')--}}
<div class="row">
    <div class="col-xs-12">
        <div class="form-group form-float">
            <label class="form-label">Ride</label>
            <div class="form-line">
                {!! Form::select('ride_id', $rides,null, array('class' => 'form-control select2')) !!}
                @error('ride_id')
                <div class="invalid-feedback" style="color: #ef1010">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>

        <div class="col-xs-12">
            <div class="form-group form-float">
                <label class="form-label">Customer Feedback Type</label>
                <div class="form-line">
                    <select name="type" class="form-control">
                        <option value="{{ 'Complaint' }}"> Complaint</option>
                        <option value="{{ 'Suggestion' }}"> Suggestion</option>
                        <option value="{{ 'Other' }}"> Other</option>

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
                <label class="form-label">Comment</label>
                <div class="form-line">
                    {!! Form::textArea("comment",null,['class'=>'form-control summernote','placeholder'=>' comment'])!!}
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
            <label for="name"> Upload Customer Feedback Images </label>
            {!! Form::file('file[]' , [
                                      "class" => "form-control  file_upload_preview",
                                      "multiple" => "multiple",
                                      "data-preview-file-type" => "text"
                                                  ]) !!}
        </div>

        <div class="col-xs-12 aligne-center contentbtn">
            <button class="btn btn-primary waves-effect" type="submit">Save</button>
        </div>
    </div>
