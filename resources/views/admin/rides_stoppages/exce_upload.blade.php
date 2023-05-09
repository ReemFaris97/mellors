<div class="row">
    @if($errors->any())
        <div class="alert alert-danger">
            <p><strong>Opps Something went wrong</strong></p>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="form-group">
        <label for="name"> Upload Stoppages Report With File  </label>
        {!! Form::file("file",['class'=>'form-control','required'])!!}
    </div>
    @if ($errors->has('filr'))
        <span class="help-block">
                <span class="help-block">
                    <strong>{{ $errors->first('file') }}</strong>
                </span>
            @endif

    <div class="col-xs-12 aligne-center contentbtn">
        <button class="btn btn-primary waves-effect" type="submit">Save</button>
    </div>
</div>
