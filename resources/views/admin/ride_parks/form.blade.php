{{--@include('admin.common.errors')--}}
<div class="row">
<div class="col-xs-12">
        <div class="form-group form-float">
            <label class="form-label">Park</label>
            <div class="form-line">               
                <select name="park_id" class="form-control" id="park">
                <option value=""> Choose Park...</option>   
                    @foreach($parks as $park)
                        <option value="{{ $park->id }}"  {{ in_array($park->id, $park_id) ? 'selected' : '' }}  > {{ $park->name}}</option>   
                        @endforeach
   
                </select>
               
                @error('park_id')
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
