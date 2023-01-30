{{--@include('admin.common.errors')--}}
<div class="row">
<div class="col-xs-12">
<div class="form-group form-float">
    <label class="form-label">Role</label>
    <div class="form-line">
        {!! Form::text("name",null,['class'=>'form-control','placeholder'=>'Role'])!!}
        @error('name')
        <div class="invalid-feedback" style="color: #ef1010">
            {{ $message }}
        </div>
        @enderror
    </div>
</div>
</div>

<div class="col-xs-12 col-sm-12 col-md-12">

    <div class="form-group">

        <strong> Permissions list</strong>
        @error('permission')
        <div class="invalid-feedback" style="color: #ef1010">
            {{ $message }}
        </div>
        @enderror
        <br>


            <div class="row">
                @foreach($permission as $value)
                    <div class="col-md-4">
                        @isset($rolePermissions)
                            <label>{{ Form::checkbox('permission[]', $value->id, in_array($value->id, $rolePermissions) ? true : false, array('class' => 'name')) }}
                                {{ $value->title }}</label>
                        @else
                            <label>{{ Form::checkbox('permission[]', $value->id, false, array('class' => 'name')) }}
                                {{ $value->title }}</label>
                        @endisset
                    </div>
                @endforeach

            </div>

    </div>

</div>
@if(isset($item->id))
    {!! Form::input('hidden','id',$item->id,['class'=>'form-control']) !!}
@endif
<div class="col-xs-12 aligne-center contentbtn">
    <button class="btn btn-primary waves-effect" type="submit">Save</button>
</div>
</div>
