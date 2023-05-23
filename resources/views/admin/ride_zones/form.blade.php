{{--@include('admin.common.errors')--}}
<div class="row">
<div class="col-xs-12">
        <div class="form-group form-float">
            <label class="form-label">Zone</label>
            <div class="form-line">               
                <select name="zone_id" class="form-control">
                <option value=""> Choose Zone...</option>   
                    @foreach($zones as $zone)
                        <option value="{{ $zone->id }}"  {{ in_array($zone->id, $zone_id) ? 'selected' : '' }}  > {{ $zone->name}}</option>   
                        @endforeach
   
                </select>
               
                @error('zone_id')
                <div class="invalid-feedback" style="color: #ef1010">
                   {{ $message }}
                </div>
                @enderror
            </div>
        </div>
    </div>
</div>
<input type="hidden" value="{{$ride_id}}" name="ride_id">
<div class="col-xs-12 aligne-center contentbtn">
    <button class="btn btn-primary waves-effect" type="submit">Save</button>
</div>
