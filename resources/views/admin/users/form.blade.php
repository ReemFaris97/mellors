<div class="form-group">
    <label for="name">name</label>
    {!! Form::text('name',null,['class'=>'form-control','id'=>'name','placeholder'=>'name']) !!}
</div>
<div class="form-group">
    <label for="first_name">first name</label>
    {!! Form::text('first_name',null,['class'=>'form-control','id'=>'first_name','placeholder'=>'first_name']) !!}
</div>
<div class="form-group">
    <label for="middle_name">middle name</label>
    {!! Form::text('middle_name',null,['class'=>'form-control','id'=>'middle_name','placeholder'=>'middle_name']) !!}
</div>
<div class="form-group">
    <label for="last_name">last name</label>
    {!! Form::text('last_name',null,['class'=>'form-control','id'=>'last_name','placeholder'=>'last_name']) !!}
</div>
<div class="form-group">
    <label for="email">email</label>
    {!! Form::email('email',null,['class'=>'form-control','id'=>'email','placeholder'=>'email']) !!}
</div>
<div class="form-group">
    <label for="last_name">Employee Number</label>
    {!! Form::number('user_number',null,['class'=>'form-control','id'=>'last_name','placeholder'=>'Employee Number']) !!}
</div>
<div class="form-group">
    <label for="phone">phone number</label>
    {!! Form::text('phone',null,['class'=>'form-control','id'=>'phone','placeholder'=>'phone number']) !!}
</div>
<div class="form-group">
    <label for="password">password</label>
    {!! Form::password('password',['class'=>'form-control','id'=>'password','placeholder'=>'password']) !!}
</div>
<div class="form-group">
    <label for="password_confirmation">password confirmation</label>
    {!! Form::password('password_confirmation',['class'=>'form-control','id'=>'password_confirmation','placeholder'=>'password confirmation']) !!}
</div>


<div class="form-group">
    <label >Roles :</label>
        {!! Form::select('roles', $roles,@$userRole?$userRole:null, array('class' => 'form-control')) !!}
</div>


<div class="form-group">
    <label>Department :</label>
        {!! Form::select('department_id',$departments,null,array('class' => 'form-control')) !!}
</div>

<div class="form-group">
    <label >Branch :</label>
        {!! Form::select('branch_id',$branches,null,array('class' => 'form-control','id'=>'branch','placeholder'=>'choose branch')) !!}
</div>
<div class="form-group">
    <label >User Park (choose branch first):</label>
    {!! Form::select('park_id[]',@$parks?$parks:[],null,array('class' => 'form-control','multiple'=>"",'id'=>'park')) !!}
</div>
<div class="form-group">
    <label >User Zone (choose branch first):</label>
    {!! Form::select('zone_id[]',@$zones?$zones:[],null, array('class' => 'form-control','multiple'=>"",'id'=>'zone')) !!}
</div>

<div class="col-xs-12">
    <div class="input-group-btn">
        <button type="submit" class="btn waves-effect waves-light btn-primary">Save</button>
    </div>
</div>
@push('scripts')
    <script type="text/javascript">
        $("#branch").change(function(){
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
        $("#branch").change(function(){
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
