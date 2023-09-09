{{--@include('admin.common.errors')--}}
<div class="row">
    <div class="col-xs-12">
        <div class="form-group form-float">
            <label class="form-label">Ride</label>
            <div class="form-line">
                {!! Form::select('ride_id', $rides,null, array('class' => 'form-control ')) !!}
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
                    <input type="radio" name="type" value="Complaint" class="ml-3" id="complaint_type" > Complaint
                    <input type="radio" name="type" value="Suggestion" class="ml-3" id="sugg"  > Suggestion
                    <input type="radio" name="type" value="Other " class="ml-3" id="other" > Other
                </div>
            </div>
        </div>

        <div class="col-xs-12 " id="complaint" hidden>
            <div class="form-group form-float">
                <label class="form-label">Customer Feedback Type</label>
                <div class="form-line">
                    <select name="complaint_id" class="form-control">
                        <option value=""> Choose....</option>
                        @foreach ($complaints as $value )
                           <option value="{{ $value->id }}"> {{ $value->name }} </option>
                        @endforeach
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
            {!! Form::file('image[]' , [
                                      "class" => "form-control  file_upload_preview",
                                      "multiple" => "multiple",
                                      "data-preview-file-type" => "text"
                                                  ]) !!}
        </div>

        <div class="col-xs-12 aligne-center contentbtn">
            <button class="btn btn-primary waves-effect" type="submit">Save</button>
        </div>
    </div>
    @push('scripts')

    <script>
        $('#complaint_type').click(function () {
            $('#complaint').show();
        }) ;
        $('#other').click(function () {
            $('#complaint').hide();
        }) ;
        $('#sugg').click(function () {
            $('#complaint').hide();
        }) ;
    </script>
    @endpush