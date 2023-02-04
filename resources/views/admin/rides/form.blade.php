{{--@include('admin.common.errors')--}}
<div class="row">

    <div class="form-group">
        <label for="name"> Upload Rides Report </label>
        {!! Form::file("file",['class'=>'form-control'])!!}

    </div>

    <div class="col-xs-12 aligne-center contentbtn">
        <button class="btn btn-primary waves-effect" type="submit">Save</button>
    </div>
</div>

