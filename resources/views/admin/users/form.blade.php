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
    <label class="col-md-3 control-label">Roles :</label>
    <div class="col-xs-12 col-md-9">
        {!! Form::select('roles', $roles,@$userRole?$userRole:null, array('class' => 'form-control')) !!}
    </div>
</div>


<div class="form-group">
    <label class="col-md-3 control-label">Department :</label>
    <div class="col-xs-12 col-md-9">
        {!! Form::select('department_id', $departments,null, array('class' => 'form-control')) !!}
    </div>
</div>



<div class="form-group">
    <label class="col-md-3 control-label">Branch :</label>
    <div class="col-xs-12 col-md-9">
        {!! Form::select('branch_id', $branches,null, array('class' => 'form-control')) !!}
    </div>
</div>


<div class="col-xs-12">
    <div class="input-group-btn">
        <button type="submit" class="btn waves-effect waves-light btn-primary">حفظ</button>
    </div>
</div>

