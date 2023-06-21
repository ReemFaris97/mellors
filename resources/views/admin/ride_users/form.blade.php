{{--@include('admin.common.errors')--}}
<div class="row">
   
    <div class="col-xs-12 col-sm-12 col-md-12">

        <div class="form-group">

            <h3> All Rides</h3>
            <br>
            <div class="row">

            @foreach($rides as $rideCollection)
                @foreach($rideCollection as $ride)
                    <div class="col-md-4">
                    @isset($list)
                        <label>{{ Form::checkbox('ride_id[]', $ride->id, in_array($ride->id, $list) ? true : false, array('class' => 'name checkbox_roles')) }}
                            {{ $ride->name }}</label>
                    @else
                        <label>{{ Form::checkbox('ride_id[]', $ride->id, false, array('class' => 'name checkbox_roles')) }}
                            {{ $ride->name }}</label>
                    @endisset

                    </div>
                @endforeach
            @endforeach
                @error('ride_id')
                <div class="invalid-feedback" style="color: #ef1010">
                    {{ $message }}
                </div>
                @enderror
        </div>

    </div>
    <input type="hidden" name="user_id" value="{{$user_id}}">

    <div class="col-xs-12 aligne-center contentbtn">
        <button class="btn btn-primary waves-effect" type="submit">Save</button>
    </div>
</div>
</div>