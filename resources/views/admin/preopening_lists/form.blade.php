{{--@include('admin.common.errors')--}}
<div class="row">
        <div class="col-xs-12">
            <div class="form-group form-float">
                <label class="form-label">Ride</label>
                <div class="form-line">
                    {!! Form::select('ride_id',$rides,null, array('class' => 'form-control')) !!}
                    @error('ride_id')
                    <div class="invalid-feedback" style="color: #ef1010">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>
        </div>

    <div class="col-xs-12 col-sm-12 col-md-12">

        <div class="form-group">

            <strong> Preopening List</strong>
            <br>

            <div class="row">

            @foreach($inspections as $value)
                <div class="col-md-4">
                    @isset($list)
                        <label>{{ Form::checkbox('inspection_list[]', $value->name, in_array($value->name, $list) ? true : false, array('class' => 'name checkbox_roles')) }}
                            {{ $value->name }}</label>
                    @else
                        <label>{{ Form::checkbox('inspection_list[]', $value->name, false, array('class' => 'name checkbox_roles')) }}
                            {{ $value->name }}</label>
                    @endisset
                </div>
            @endforeach

        </div>

    </div>
    <div class="col-xs-12">
        <div class="form-group form-float">
            <label class="form-label">comment</label>
            <div class="form-line">
                {!! Form::textArea('comment',null, array('class' => 'form-control')) !!}
                @error('comment')
                <div class="invalid-feedback" style="color: #ef1010">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>
    </div>
    <div class="col-xs-12">
        <div class="form-group form-float">
            <label class="form-label">Date</label>
            <div class="form-line">
                {!! Form::date('date',null, array('class' => 'form-control')) !!}
                @error('date')
                <div class="invalid-feedback" style="color: #ef1010">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>
    </div>
        {!! Form::input('hidden','zone_id',$zone_id,['class'=>'form-control']) !!}
    <div class="col-xs-12 aligne-center contentbtn">
        <button class="btn btn-primary waves-effect" type="submit">Save</button>
    </div>
</div>
