{{--@include('admin.common.errors')--}}
<div class="row">
    <div class="col-xs-12">
        <div class="form-group form-float">
            <label class="form-label">Park</label>
            <div class="form-line">
                {!! Form::select('park_id',@$parks?$parks:[],null, array('class' => 'form-control','id'=>'park','placeholder'=>'Choose Park')) !!}
                @error('park_id')
                <div class="invalid-feedback" style="color: #ef1010">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>
        <div class="col-xs-12">
            <div class="form-group form-float">
                <label class="form-label">Ride</label>
                <div class="form-line">
                {!! Form::select('ride_id',@$rides?$rides:[],null, array('class' => 'form-control ride','id'=>'ride','placeholder'=>'Choose Park First')) !!}

                 
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
            <label for="name"> Upload Images </label>

            @include('admin.rsr_reports.images_upload');
        </div>
        @if(isset($id))
         <input type="hidden" name="stoppage_id" value="{{$id}}">
        @endif
<div class="col-xs-12 aligne-center contentbtn">
    <button class="btn btn-primary waves-effect" type="submit">Save</button>
</div>
</div>
</div>


</div>
@push('scripts')
    <script type="text/javascript">
        $("#park").change(function(){
            $.ajax({
                url: "{{ route('admin.getParkRides') }}?park_id=" + $(this).val(),
                method: 'GET',
                success: function(data) {
                    $('#ride').html(data.html);
                }
            });
        });
    </script>
@endpush
