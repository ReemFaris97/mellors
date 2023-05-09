{{--@include('admin.common.errors')--}}
<div class="row">
   
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

                @error('inspection_list_id')
                <div class="invalid-feedback" style="color: #ef1010">
                    {{ $message }}
                </div>
                @enderror
        </div>

    </div>
    <input type="hidden" name="ride_id" value="{{$ride_id}}"

    <div class="col-xs-12 aligne-center contentbtn">
        <button class="btn btn-primary waves-effect" type="submit">Save</button>
    </div>
</div>
</div>