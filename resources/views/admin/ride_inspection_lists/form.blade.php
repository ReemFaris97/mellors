{{--@include('admin.common.errors')--}}
<div class="row">
        <div class="col-xs-12">
            <div class="form-group form-float">
                <label class="form-label">Ride</label>
                <div class="form-line">
                    {!! Form::select('ride_id',$rides,null, array('class' => 'form-control')) !!}
                    @error('ride_id')
                    <div class="invalid-feedback" style="color: #ef1010">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>
        </div>

    <div class="col-xs-12 col-sm-12 col-md-12">

        <div class="form-group">

            <strong> Inspection Elements</strong>
            <br>

            <div class="row">

            @foreach($inspection_list as $value)
                <div class="col-md-4">
                    @isset($list)
                        <label>{{ Form::checkbox('inspection_list_id[]', $value->id, in_array($value->id, $list) ? true : false, array('class' => 'name checkbox_roles')) }}
                            {{ $value->name }}</label>
                    @else
                        <label>{{ Form::checkbox('inspection_list_id[]', $value->id, false, array('class' => 'name checkbox_roles')) }}
                            {{ $value->name }}</label>
                    @endisset
                </div>
            @endforeach

                @error('ride_id')
                <div class="invalid-feedback" style="color: #ef1010">
                    {{ $message }}
                </div>
                @enderror
        </div>

    </div>
    <div class="col-xs-12 aligne-center contentbtn">
        <button class="btn btn-primary waves-effect" type="submit">Save</button>
    </div>
</div>
</div>