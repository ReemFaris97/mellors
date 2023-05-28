<div class="form-group">
    <label for="name">Name</label>
    {!! Form::text('name',null,['class'=>'form-control','id'=>'name','placeholder'=>'name']) !!}
    @error('name')
    <div class="invalid-feedback" style="color: #ef1010">
        {{ $message }}
    </div>
    @enderror
</div>
<div class="form-group">
    <label for="first_name">First Name</label>
    {!! Form::text('first_name',null,['class'=>'form-control','id'=>'first_name','placeholder'=>'first_name']) !!}
    @error('first_name')
    <div class="invalid-feedback" style="color: #ef1010">
        {{ $message }}
    </div>
    @enderror
</div>
<div class="form-group">
    <label for="middle_name">Middle Name</label>
    {!! Form::text('middle_name',null,['class'=>'form-control','id'=>'middle_name','placeholder'=>'middle_name']) !!}
    @error('middle_name')
    <div class="invalid-feedback" style="color: #ef1010">
        {{ $message }}
    </div>
    @enderror
</div>
<div class="form-group">
    <label for="last_name">Last Name</label>
    {!! Form::text('last_name',null,['class'=>'form-control','id'=>'last_name','placeholder'=>'last_name']) !!}

    @error('last_name')
    <div class="invalid-feedback" style="color: #ef1010">
        {{ $message }}
    </div>
    @enderror
</div>
<div class="form-group">
    <label for="email">Email</label>
    {!! Form::email('email',null,['class'=>'form-control','id'=>'email','placeholder'=>'email']) !!}
    @error('email')
    <div class="invalid-feedback" style="color: #ef1010">
        {{ $message }}
    </div>
    @enderror
</div>
<div class="form-group">
    <label for="last_name">Employee Number</label>
    {!! Form::number('user_number',null,['class'=>'form-control','id'=>'last_name','placeholder'=>'Employee Number'])
    !!}
    @error('user_number')
    <div class="invalid-feedback" style="color: #ef1010">
        {{ $message }}
    </div>
    @enderror
</div>
<div class="form-group">
    <label for="phone">Phone Number</label>
    {!! Form::text('phone',null,['class'=>'form-control','id'=>'phone','placeholder'=>'phone number']) !!}
    @error('phone')
    <div class="invalid-feedback" style="color: #ef1010">
        {{ $message }}
    </div>
    @enderror
</div>
<div class="form-group">
    <label for="password">Password</label>
    {!! Form::password('password',['class'=>'form-control','id'=>'password','placeholder'=>'password']) !!}
    @error('password')
    <div class="invalid-feedback" style="color: #ef1010">
        {{ $message }}
    </div>
    @enderror
</div>
<div class="form-group">
    <label for="password_confirmation">Password Confirmation</label>
    {!!
    Form::password('password_confirmation',['class'=>'form-control','id'=>'password_confirmation','placeholder'=>'password
    confirmation']) !!}
    @error('password_confirmation')
    <div class="invalid-feedback" style="color: #ef1010">
        {{ $message }}
    </div>
    @enderror
</div>


<div class="form-group">
    <label>Roles :</label>
    {!! Form::select('roles', $roles,@$userRole?$userRole:null, array('class' => 'form-control select2')) !!}
    @error('roles')
    <div class="invalid-feedback" style="color: #ef1010">
        {{ $message }}
    </div>
    @enderror
</div>


<div class="form-group">
    <label>Department :</label>
    {!! Form::select('department_id',$departments,null,array('class' => 'form-control select2')) !!}
    @error('department_id')
    <div class="invalid-feedback" style="color: #ef1010">
        {{ $message }}
    </div>
    @enderror
</div>

<div class="form-group">
    <label>Branch :</label>
    {!! Form::select('branch_id',$branches,null,array('class' => 'form-control
    select2','id'=>'branch','placeholder'=>'choose
    branch')) !!}
    @error('branch_id')
    <div class="invalid-feedback" style="color: #ef1010">
        {{ $message }}
    </div>
    @enderror
</div>
<div class="form-group">
    <label>Time Zone :</label>
    <select name="time_zone" class="select2">
    @foreach (DateTimeZone::listIdentifiers() as $timezone)
        <option value="{{ $timezone }}"
            @if(old('time_zone', $user->time_zone ?? '') === $timezone) selected @endif>
            {{ $timezone }}
        </option>
    @endforeach
</select>
    @error('time_zone')
    <div class="invalid-feedback" style="color: #ef1010">
        {{ $message }}
    </div>
    @enderror
</div>

<div class="form-group">
    <label>User Park (choose branch first):</label>
   @if(isset($parks))
   
   <select name="park_id[]" class="custom-select form-control " id="park" multiple="multiple">
            @foreach($parks as $park)
           <option value="{{ $park->id }}" {{ in_array($park->id, $userparksIds) ? 'selected' : '' }} > {{ $park->name}}</option>   
         @endforeach
   
</select>
   @else
    {!! Form::select('park_id[]',[],null,array('class' => 'form-control
        custom-select','multiple'=>"",'id'=>'park'))
    !!}
    @endif
  
</div>
<div class="form-group">
    <label>User Zone (choose branch first):</label>
    @if(isset($zones))
   <select name="zone_id[]" class="custom-select form-control " id="zone" multiple="multiple">
            @foreach($zones as $zone)
            <option  value="{{ $zone->id }}" @if(in_array($zone->id , $userzonesIds)) selected @endif>{{ $zone->name }}</option>
            @endforeach
   </select>
   @else
    {!! Form::select('zone_id[]',[],null, array('class' => 'form-control
        custom-select','multiple'=>"",'id'=>'zone'))
    !!}
    @endif
    @error('zone_id')
    <div class="invalid-feedback" style="color: #ef1010">
        {{ $message }}
    </div>
    @enderror
</div>

<div class="form-group">
    <div class="input-group-btn">
        <button type="submit" class="btn waves-effect waves-light btn-primary">Save</button>
    </div>
</div>
@push('scripts')
<script type="text/javascript">
$("#branch").change(function() {
    $.ajax({
        url: "{{ route('admin.parks.get_by_branch') }}?branch_id=" + $(this).val(),
        method: 'GET',
        success: function(data) {
            $('#park').html(data.html);
        }
    });
});

</script>
<script type="text/javascript">
$("#branch").change(function() {
    $.ajax({
        url: "{{ route('admin.zones.get_by_branch') }}?branch_id=" + $(this).val(),
        method: 'GET',
        success: function(data) {
            $('#zone').html(data.html);
        }
    });
});
</script>


@endpush