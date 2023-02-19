{{--@include('admin.common.errors')--}}
<div class="row">

    <div class="col-xs-12 col-sm-12 col-md-12">

        <div class="form-group">

            <strong> Preopening List</strong>
            <br>

            <div class="row">
                {{--<div class="col-xs-12">--}}
                    {{--@foreach($inspections as $value)--}}

                    {{--<div class="form-group form-float">--}}
                        {{--<label class="form-label">{{$value->inspection_list->name}}</label>--}}
                        {{--<div class="form-line">--}}
                            {{--<table>--}}
                                {{--<tr><td>--}}
                                        {{--{!! Form::label('checked[]','Yes') !!}--}}
                                    {{--</td><td>--}}
                                        {{--{!! Form::radio('checked[]','0') !!}--}}
                                    {{--</td></tr>--}}
                                {{--<tr><td>--}}
                                        {{--{!! Form::label('checked[]','No') !!}--}}
                                    {{--</td><td>--}}
                                        {{--{!! Form::radio('checked[]','1') !!}--}}
                                    {{--</td></tr>--}}
                                {{--<tr>--}}
                                    {{--<td>--}}
                                {{--<div class="col-xs-12">--}}
                                {{--<div class="form-group form-float">--}}
                                    {{--<label class="form-label">comment</label>--}}
                                    {{--<div class="form-line">--}}
                                        {{--{!! Form::textArea('comment[]',null, array('class' => 'form-control')) !!}--}}
                                        {{--@error('comment')--}}
                                        {{--<div class="invalid-feedback" style="color: #ef1010">--}}
                                            {{--{{ $message }}--}}
                                        {{--</div>--}}
                                        {{--@enderror--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                                {{--</div>--}}
                                    {{--</td>--}}
                                {{--</tr>--}}
                            {{--</table>--}}
                            {{--@error('checked')--}}
                            {{--<div class="invalid-feedback" style="color: #ef1010">--}}
                                {{--{{ $message }}--}}
                            {{--</div>--}}
                            {{--@enderror--}}
                        {{--</div>--}}
                    {{--</div>--}}
                        {{--@endforeach--}}
                {{--</div>--}}
                @foreach($inspections as $value)
                    <div class="col-md-4">
                        @isset($list)
                            <label>{{ Form::checkbox('inspection_element_id[]', $value->id, in_array($value->id, $list) ? true : false, array('class' => 'name checkbox_roles')) }}
                                {{ $value->name }}</label>
                        @else
                            <label>{{ Form::checkbox('inspection_element_id[]', $value->inspection_list->id, false, array('class' => 'name checkbox_roles')) }}
                                {{ $value->inspection_list->name }}</label>
                            <div class="form-group form-float">
                                <label class="form-label">comment</label>
                                <div class="form-line">
                                    {!! Form::textArea('comment[]',null, array('class' => 'form-control')) !!}
                                    @error('comment')
                                    <div class="invalid-feedback" style="color: #ef1010">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>


                        @endisset
                    </div>
                @endforeach

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
        <input name="ride_id" type="hidden" value={{$id}}>
    <div class="col-xs-12 aligne-center contentbtn">
        <button class="btn btn-primary waves-effect" type="submit">Save</button>
    </div>
</div>
