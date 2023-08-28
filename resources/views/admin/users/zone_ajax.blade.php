<div class="form-group">

    <h3> All Zones</h3>
    <br>
    <div class="row">

        @foreach ($zones as $value)
            <div class="col-md-4">
                @isset($listZone)
                    <label>{{ Form::checkbox('zone_id[]', $value->id, in_array($value->id, $listZone) ? true : false, ['class' => 'name checkbox_roles zone1']) }}
                        {{ $value->name }}</label>
                @else
                    <label>{{ Form::checkbox('zone_id[]', $value->id, false, ['class' => 'name checkbox_roles zone1']) }}
                        {{ $value->name }}</label>
                @endisset
            </div>
        @endforeach

        @error('zone_id')
            <div class="invalid-feedback" style="color: #ef1010">
                {{ $message }}
            </div>
        @enderror
    </div>

</div>
