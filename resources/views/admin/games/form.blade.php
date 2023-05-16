{{--@include('admin.common.errors')--}}
<div class="row">
<div class="col-xs-12">
<div class="form-group form-float">
    <label class="form-label">Ride Name</label>
    <div class="form-line">
        {!! Form::text("name",null,['class'=>'form-control','placeholder'=>' Ride name'])!!}
        @error('name')
        <div class="invalid-feedback" style="color: #ef1010">
            {{ $message }}
        </div>
        @enderror
    </div>
</div>
</div>
   
    <div class="col-xs-12">
        <div class="form-group form-float">
            <label class="form-label">Park</label>
            <div class="form-line">
                {!! Form::select('park_id', @$parks?$parks:null,null, array('class' => 'form-control select2 park_id','placeholder'=>'Choose Park Name')) !!}
                @error('park_id')
                <div class="invalid-feedback" style="color: #ef1010">
                   {{ $message }}
                </div>
                @enderror
            </div>
        </div>
    </div>
    <div class="col-xs-12">
        <div class="form-group form-float">
            <label class="form-label">Zone</label>
            <div class="form-line">
                <select class="form-control js-example-basic-single ms zone_id" id="zone_id" name="zone_id"
                        data-live-search=true required>
                    <option disabled> choose Park First</option>

                </select>
                @error('zone_id')
                <div class="invalid-feedback" style="color: #ef1010">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>
    </div> 
    <div class="col-xs-12">
        <div class="form-group form-float">
            <label class="form-label">Ride Category</label>
            <div class="form-line">
            {!! Form::select('ride_cat', ["family"=>'Family',"thrill"=>'Thrill',"kids"=>'Kids'],null, array('class' =>
            'form-control ','placeholder'=>'Choose Ride Category...')) !!}           
                 @error('ride_cat')
                <div class="invalid-feedback" style="color: #ef1010">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>
    </div>
    <div class="col-xs-12">
        <div class="form-group form-float">
            <label class="form-label">Ride Type</label>
            <div class="form-line">
                {!! Form::select('ride_type_id', $ride_types,null, array('class' => 'form-control select2','placeholder'=>'Choose Ride Type...')) !!}
                @error('ride_type_id')
                <div class="invalid-feedback" style="color: #ef1010">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>
    </div>
    <div class="col-xs-12">
        <div class="form-group form-float">
            <label class="form-label">Number Of Seats</label>
            <div class="form-line">
                {!! Form::number("number_of_seats",null,['class'=>'form-control','placeholder'=>' number_of_seats'])!!}
                @error('number_of_seats')
                <div class="invalid-feedback" style="color: #ef1010">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>
    </div>
    <div class="col-xs-12">
        <div class="form-group form-float">
            <label class="form-label">Capacity One Cycle</label>
            <div class="form-line">
                {!! Form::number("capacity_one_cycle",null,['class'=>'form-control','placeholder'=>' capacity'])!!}
                @error('capacity_one_cycle')
                <div class="invalid-feedback" style="color: #ef1010">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>
    </div>
    <div class="col-xs-12">
        <div class="form-group form-float">
            <label class="form-label">Cycle Duration /second</label>
            <div class="form-line">
                {!! Form::number("one_cycle_duration_seconds",null,['class'=>'form-control','placeholder'=>' cycle duration per second'])!!}
                @error('one_cycle_duration_seconds')
                <div class="invalid-feedback" style="color: #ef1010">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>
    </div>
    <div class="col-xs-12">
        <div class="form-group form-float">
            <label class="form-label">Number Of Gondolas</label>
            <div class="form-line">
                {!! Form::number("no_of_gondolas",null,['class'=>'form-control','placeholder'=>'Number Of Gondolas'])!!}
                @error('no_of_gondolas')
                <div class="invalid-feedback" style="color: #ef1010">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>
    </div>
    <div class="col-xs-12">
        <div class="form-group form-float">
            <label class="form-label">Minimum Height Requirement In cm</label>
            <div class="form-line">
                {!! Form::number("minimum_height_requirement",null,['class'=>'form-control','placeholder'=>'Minimum Height Requirement In cm'])!!}
                @error('minimum_height_requirement')
                <div class="invalid-feedback" style="color: #ef1010">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>
    </div>
    <div class="col-xs-12">
        <div class="form-group form-float">
            <label class="form-label">Cycle duration load unload /minutes</label>
            <div class="form-line">
                {!! Form::number("ride_cycle_mins",null,['class'=>'form-control',
                    'placeholder'=>'cycle duration load nload minutes'])!!}
                @error('ride_cycle_mins')
                <div class="invalid-feedback" style="color: #ef1010">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>
    </div>
   
    <div class="col-xs-12">
        <div class="form-group form-float">
            <label class="form-label">Theoretical Number</label>
            <div class="form-line">
                {!! Form::number("theoretical_number",null,['class'=>'form-control','placeholder'=>'Theoretical Number'])!!}
                @error('theoretical_number')
                <div class="invalid-feedback" style="color: #ef1010">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>
    </div>
    <div class="col-xs-12">
        <div class="form-group form-float">
            <label class="form-label">Ticket Price</label>
            <div class="form-line">
                {!! Form::number("ride_price",null,['class'=>'form-control','placeholder'=>'Ticket Price'])!!}
                @error('ride_price')
                <div class="invalid-feedback" style="color: #ef1010">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>
    </div>

    <div class="col-xs-12">
        <div class="form-group form-float">
            <label class="form-label">Ticket Price Fast Track</label>
            <div class="form-line">
                {!! Form::number("ride_price_ft",null,['class'=>'form-control','placeholder'=>'Ticket Price Fast Track'])!!}
                @error('ride_price_vip')
                <div class="invalid-feedback" style="color: #ef1010">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>
    </div> 
    <div class="col-xs-12">
        <div class="form-group form-float">
            <label class="form-label">Ride Description</label>
            <div class="form-line">
                {!! Form::textarea("description",null,['class'=>'form-control','placeholder'=>' Ride description'])!!}
                @error('description')
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

@push('scripts')

    <script>
 $('.park_id').change(function() {
        var val = $(this).val();
        $.ajax({
            type: "post",
            url: "{{ route('admin.getParkZones') }}",
            data: {
                'park_id': val,
                '_token': "{{ @csrf_token() }}"
            },
            success: function(data) {
                var options = '<option value="" disabled>choose Zone</option>';
                $.each(data.zones, function(key, value) {
                    options += '<option value="' + value.id + '">' + value.name +
                        '</option>';

                });
                $("#zone_id").empty().append(options);
            }
        });
    });

    </script>

@endpush
