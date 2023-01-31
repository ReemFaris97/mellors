{{--@include('admin.common.errors')--}}
<div class="row">
<div class="col-xs-12">
<div class="form-group form-float">
    <label class="form-label">Ride Name</label>
    <div class="form-line">
        {!! Form::text("name",null,['class'=>'form-control','placeholder'=>' Ride name'])!!}
        @error('name')
        <div class="invalid-feedback" style="color: #ef1010">
            {{ $message }}
        </div>
        @enderror
    </div>
</div>
</div>
    <div class="col-xs-12">
        <div class="form-group form-float">
            <label class="form-label">Ride Description</label>
            <div class="form-line">
                {!! Form::textarea("description",null,['class'=>'form-control','placeholder'=>' Game description'])!!}
                @error('description')
                <div class="invalid-feedback" style="color: #ef1010">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>
    </div>


    <div class="col-xs-12">
        <div class="form-group form-float">
            <label class="form-label">Park</label>
            <div class="form-line">
                {!! Form::select('park_id', $parks,null, array('class' => 'form-control')) !!}
                @error('park_id')
                <div class="invalid-feedback" style="color: #ef1010">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>
    </div>
    <div class="col-xs-12">
        <div class="form-group form-float">
            <label class="form-label">Zone</label>
            <div class="form-line">
                {!! Form::select('zone_id', $zones,null, array('class' => 'form-control')) !!}
                @error('zone_id')
                <div class="invalid-feedback" style="color: #ef1010">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>
    </div>
    <div class="col-xs-12">
        <div class="form-group form-float">
            <label class="form-label">Capacity</label>
            <div class="form-line">
                {!! Form::text("capacity",null,['class'=>'form-control','placeholder'=>' capacity'])!!}
                @error('capacity')
                <div class="invalid-feedback" style="color: #ef1010">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>
    </div>
    <div class="col-xs-12">
        <div class="form-group form-float">
            <label class="form-label">Cycle duration per second</label>
            <div class="form-line">
                {!! Form::text("cycle_duration_per_second",null,['class'=>'form-control','placeholder'=>' cycle duration per second'])!!}
                @error('cycle_duration_per_second')
                <div class="invalid-feedback" style="color: #ef1010">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>
    </div>
    <div class="col-xs-12">
        <div class="form-group form-float">
            <label class="form-label">Cycle duration load unload / minutes</label>
            <div class="form-line">
                {!! Form::text("cycle_duration_load_unload_minutes",null,['class'=>'form-control','placeholder'=>'cycle duration load nload minutes'])!!}
                @error('cycle_duration_load_unload_minutes')
                <div class="invalid-feedback" style="color: #ef1010">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>
    </div>
    <div class="col-xs-12">
        <div class="form-group form-float">
            <label class="form-label">IS FLOW ?</label>
            <div class="form-line">
                <table>
                    <tr><td>
                            {!! Form::label('is_flow','Yes') !!}
                        </td><td>
                            {!! Form::radio('is_flow','0') !!}
                        </td></tr>
                    <tr><td>
                            {!! Form::label('is_flow','No') !!}
                        </td><td>
                            {!! Form::radio('is_flow','1') !!}
                        </td></tr>

                </table>
                @error('is_flow')
                <div class="invalid-feedback" style="color: #ef1010">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>
    </div>
    <div class="col-xs-12">
        <div class="form-group form-float">
            <label class="form-label">Price</label>
            <div class="form-line">
                {!! Form::number("price",null,['class'=>'form-control','placeholder'=>'price'])!!}
                @error('price')
                <div class="invalid-feedback" style="color: #ef1010">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>
    </div>
    <div class="col-xs-12">
        <div class="form-group form-float">
            <label class="form-label">Price vip</label>
            <div class="form-line">
                {!! Form::number("price_vip",null,['class'=>'form-control','placeholder'=>'price_vip'])!!}
                @error('price_vip')
                <div class="invalid-feedback" style="color: #ef1010">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>
    </div>
    <div class="col-xs-12">
        <div class="form-group form-float">
            <label class="form-label">Ride Category</label>
            <div class="form-line">
                {!! Form::select('game_cat_id', $game_cats,null, array('class' => 'form-control')) !!}
                @error('game_cat_id')
                <div class="invalid-feedback" style="color: #ef1010">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>
    </div>

    <div class="col-xs-12 aligne-center contentbtn">
    <button class="btn btn-primary waves-effect" type="submit">Save</button>
</div>
</div>
