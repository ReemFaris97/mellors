<div class="row">
    <div class="form-group">
        <label class="col-lg-12">Ride :</label></label>
        <div class="col-lg-6">
            {!! Form::select('ride_id', $rides,null, array('class' => 'form-control col-lg-6','placeholder'=>'choose ride')) !!}
        </div>
        @error('name')
        <div class="invalid-feedback" style="color: #ef1010">
            {{ $message }}
        </div>
        @enderror
    </div>

    <div class="form-group stoppageCategory ">
        <label class="col-lg-12">Operator :</label>
        <div class="col-lg-6">
            {!! Form::select('user_id', $users,null, array('class' => 'form-control col-lg-6','placeholder'=>'Choose Operators')) !!}
        </div>
        @error('name')
        <div class="invalid-feedback" style="color: #ef1010">
            {{ $message }}
        </div>
        @enderror
    </div>

    <div class="form-group stoppageCategory ">
        <label class="col-lg-12">Ride Status :</label>
        <div class="col-lg-6">
            {!! Form::select('ride_status', ["stopped"=>'stopped',"active"=>'active'],null, array('class' => 'form-control col-lg-6','placeholder'=>'Ride Status')) !!}
        </div>
        @error('name')
        <div class="invalid-feedback" style="color: #ef1010">
            {{ $message }}
        </div>
        @enderror
    </div>
    <div class="form-group stoppageSubCategory ">
        <label class="col-lg-12">Stoppage Reasons Main Category :</label>
        <div class="col-lg-6">
            {!! Form::select('', $stopage_category,null, array('class' => 'form-control col-lg-6 mai_category','placeholder'=>'Stoppage main Category')) !!}
        </div>
    </div>
    <div class="form-group stoppageSubCategory ">
        <label class="col-lg-12">Stoppage Sub Category :</label>
        <div class="col-lg-6">
            <select class="form-control js-example-basic-single ms subCategory" id="subCategory"
                    name="stopage_sub_category_id"
                    data-live-search=true required>
                <option disabled> choose Main Category First</option>

            </select>
            @error('name')
            <div class="invalid-feedback" style="color: #ef1010">
                {{ $message }}
            </div>
            @enderror

        </div>
    </div>

    <div class="form-group stoppageReason">
        <label class="col-lg-12">Ride Notes :</label>
        <div class="col-lg-6">
            {!! Form::textarea("ride_notes",null,['class'=>'form-control','placeholder'=>'Ride Notes'])!!}
        </div>
        @error('name')
        <div class="invalid-feedback" style="color: #ef1010">
            {{ $message }}
        </div>
        @enderror
    </div>

    <div class="form-group ">
        <label class="col-lg-12">Type :</label>
        <div class="col-lg-6">
            {!! Form::select('type', ['all_day'=>'all_day','time_slot'=>'time_slot'],null, array('class' => 'form-control col-lg-6 stoppageType','placeholder'=>'Stoppage type')) !!}
        </div>
        @error('type')
        <div class="invalid-feedback" style="color: #ef1010">
            {{ $message }}
        </div>
        @enderror
    </div>

    <div class="form-group downTime hidden">
        <label class="col-lg-12">Down Time :</label>
        <div class="col-lg-6">
            {!! Form::number("down_minutes",null,['class'=>'form-control','placeholder'=>'Down Time'])!!}
        </div>
        @error('name')
        <div class="invalid-feedback" style="color: #ef1010">
            {{--            {{ $message }}--}}
        </div>
        @enderror
    </div>
    <div class="timeSlot hidden">
        <div class="form-group">
            <div class="col-lg-12">
                {!! Form::label('Start Time') !!}
            </div>
            <div class="col-lg-6">
                {!! Form::time('time_slot_start',null,['class'=>'form-control']) !!}
                @if ($errors->has('start'))
                    <span class="help-block">
                    <strong>{{ $errors->first('start') }}</strong>
                </span>
                @endif
            </div>
        </div>
        <div class="form-group">
            <div class="col-lg-12">
                {!! Form::label('Close Date') !!}
            </div>
            <div class="col-lg-6">
                {!! Form::date('time_slot_end',null,['class'=>'form-control']) !!}
                @if ($errors->has('close_date'))
                    <span class="help-block">
                    <strong>{{ $errors->first('close_date') }}</strong>
                </span>
                @endif
            </div>
        </div>
    </div>

    @if(auth()->user()->hasRole('Technical') || auth()->user()->hasRole('Super Admin'))
        <br><br><br>
        <div class="form-group stoppageReason">
            <label class="col-lg-12">Stoppage description :</label>
            <div class="col-lg-6">
                {!! Form::textarea("description",null,['class'=>'form-control','placeholder'=>'Stoppage description'])!!}
            </div>
        </div>

        <br><br><br>

        <div class="form-group">
            @if (isset($album))
                <div class="form-group">
                    <label class="form-label">Images :</label>
                    <div class="form-line row">
                        @foreach ($album as $item)
                            <div class="col-lg-12">
                                <div class="flex-img">
                                    <input type="text" value="{{$item->comment}}" class="form-control">
                                    <a download href="{{ $item->image }}"> <img class="img-preview"
                                                                                src="{{ $item->image }}"
                                                                                style="height: 40px; width: 40px"></a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
        </div>

        <div class="form-group">
            <label for="name"> Upload Images </label>

            @include('admin.rides_stoppages.images_upload');
        </div>
    @endif

    <div class="col-xs-12 aligne-center contentbtn">
        <button class="btn btn-primary waves-effect" type="submit">Save</button>
    </div>
</div>


@push('scripts')
    <script type="text/javascript">
        $('.mai_category').change(function () {
            var val = $(this).val();
            $.ajax({
                type: "post",
                url: "{{ route('admin.getSubStoppageCategories') }}",
                data: {
                    'stopage_category_id': val,
                    '_token': "{{ @csrf_token() }}"
                },
                success: function (data) {
                    var options = '<option disabled>choose Zone</option>';
                    $.each(data.subCategory, function (key, value) {
                        options += '<option value="' + value.id + '">' + value.name +
                            '</option>';

                    });
                    $("#subCategory").empty().append(options);
                }
            });
        });

        $('.stoppageType').change(function () {
            var val = $(this).val();
            console.log(val);
            if (val == "time_slot") {
                $('.downTime').removeClass('hidden');
                $('.timeSlot').removeClass('hidden');
            }
            if (val == "all_day") {
                $('.downTime').addClass('hidden');
                $('.timeSlot').addClass('hidden');
            }
        });


    </script>
@endpush

