{{--@include('admin.common.errors')--}}
<div class="row">
    <div class="form-group">
        <label class="col-lg-12">Ride :</label></label>
        <div class="col-lg-6">
            {!! Form::select('ride_id', $rides,null, array('class' => 'form-control col-lg-6')) !!}
        </div>
    </div>

    <div class="form-group stoppageCategory ">
        <label class="col-lg-12">Operator :</label></label>
        <div class="col-lg-6">
            {!! Form::select('user_id', $users,null, array('class' => 'form-control col-lg-6','placeholder'=>'CHOOSE Operators')) !!}
        </div>
    </div>

    <div class="form-group stoppageCategory ">
        <label class="col-lg-12">Ride Status :</label></label>
        <div class="col-lg-6">
            {!! Form::select('ride_status', ['stopped','active'],null, array('class' => 'form-control col-lg-6','placeholder'=>'Ride Status')) !!}
        </div>
    </div>
    <div class="form-group stoppageSubCategory ">
        <label class="col-lg-12">Stoppage Reasons Main Category :</label></label>
        <div class="col-lg-6">
            {!! Form::select('', $stopage_category,null, array('class' => 'form-control col-lg-6 mai_category','placeholder'=>'Stoppage sub Category')) !!}
        </div>
    </div>
    <div class="form-group stoppageSubCategory ">
        <label class="col-lg-12">Stoppage Sub Category :</label></label>
        <div class="col-lg-6">
            <select class="form-control js-example-basic-single ms subCategory" id="subCategory" name="stopage_sub_category_id"
                    data-live-search=true required>
                    <option disabled> choose Main Category First</option>

            </select>

        </div>
    </div>

    <div class="form-group stoppageReason">
        <label class="col-lg-12">Ride Notes :</label></label>
        <div class="col-lg-6">
            {!! Form::textarea("ride_notes",null,['class'=>'form-control','placeholder'=>'Ride Notes'])!!}
        </div>
    </div>

    <div class="form-group">
        <label class="col-lg-12">Down Time :</label>
        <div class="col-lg-6">
            {!! Form::number("down_minutes",null,['class'=>'form-control','placeholder'=>'Down Time'])!!}
        </div>
    </div>
    <div class="form-group">
        <label class="col-lg-12"> Date :</label>
        <div class="col-lg-6">
            {!! Form::date("date",null,['class'=>'form-control','placeholder'=>'opened_date'])!!}
        </div>
    </div>
{{--    <div class="form-group">--}}
{{--        <label class="col-lg-12"> Date Time :</label>--}}
{{--        <div class="col-lg-6">--}}
{{--            {!! Form::time("date_time",null,['class'=>'form-control','placeholder'=>'date_time'])!!}--}}
{{--        </div>--}}
{{--    </div>--}}
    <div class="form-group">
        <label class="col-lg-12">Opened Date :</label>
        <div class="col-lg-6">
            {!! Form::date("opened_date",null,['class'=>'form-control','placeholder'=>'opened_date'])!!}
        </div>
    </div>

    <div class="col-xs-12 aligne-center contentbtn">
        <button class="btn btn-primary waves-effect" type="submit">Save</button>
    </div>
</div>


@push('scripts')
<script type="text/javascript">
    $('.mai_category').change(function() {
        var val = $(this).val();
        $.ajax({
            type: "post",
            url: "{{ route('admin.getSubStoppageCategories') }}",
            data: {
                'stopage_category_id': val,
                '_token': "{{ @csrf_token() }}"
            },
            success: function(data) {
                var options = '<option disabled>choose Zone</option>';
                $.each(data.subCategory, function(key, value) {
                    options += '<option value="' + value.id + '">' + value.name +
                        '</option>';

                });
                $("#subCategory").empty().append(options);
            }
        });
    });

</script>
@endpush

