<div class="form-group">

    <h3> All Rides</h3>
    <br>
    <div class="row">

        @foreach ($rides as $ride)
            {{-- @foreach ($rideCollection as $ride)
            @dd($ride) --}}
                <div class="col-md-4">
                    @isset($listRide)
                        <label>{{ Form::checkbox('ride_id[]', $ride->id, in_array($ride->id, $listRide) ? true : false, ['class' => 'name checkbox_roles']) }}
                            {{ $ride->name }}</label>
                    @else
                        <label>{{ Form::checkbox('ride_id[]', $ride->id, false, ['class' => 'name checkbox_roles']) }}
                            {{ $ride->name }}</label>
                    @endisset

                </div>
            {{-- @endforeach --}}
        @endforeach
        @error('ride_id')
            <div class="invalid-feedback" style="color: #ef1010">
                {{ $message }}
            </div>
        @enderror
    </div>

</div>
