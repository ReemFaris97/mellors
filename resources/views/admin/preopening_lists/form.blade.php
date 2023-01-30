{{--@include('admin.common.errors')--}}
<div class="row">
        <div class="col-xs-12">
            <div class="form-group form-float">
                <label class="form-label">Game</label>
                <div class="form-line">
                    {!! Form::select('game_id', $games,null, array('class' => 'form-control')) !!}
                    @error('game_id')
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
                            <label>{{ Form::checkbox('inspection_list[]', $value->name, array('class' => 'name')) }}
                                {{ $value->name }}</label>
                    </div>
                @endforeach

            </div>

        </div>

    </div>
        {!! Form::input('hidden','zone_id',$zone_id,['class'=>'form-control']) !!}
    <div class="col-xs-12 aligne-center contentbtn">
        <button class="btn btn-primary waves-effect" type="submit">Save</button>
    </div>
</div>
