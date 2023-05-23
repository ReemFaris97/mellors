{{--@include('admin.common.errors')--}}
<div class="row">
<div class="col-xs-12">
        <div class="form-group form-float">
            <label class="form-label">User</label>
            <div class="form-line">               
                <select name="user_id" class="form-control">
                <option value=""> Choose User...</option>   
                    @foreach($users as $user)
                        <option value="{{ $user->id }}"  {{ in_array($user->id, $user_id) ? 'selected' : '' }}  > {{ $user->name}}</option>   
                        @endforeach
   
                </select>
               
                @error('user_id')
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
