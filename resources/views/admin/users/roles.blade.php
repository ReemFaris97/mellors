@extends('admin.layout.app')

@section('title', 'Update User Roles')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card-box">
                <h4 class="header-title m-t-0 m-b-30">Assign Park & Zone & Ride To User  </h4>

                {!! Form::model($user, [
                    'route' => ['admin.rolesUpdate', $user->id],
                    'method' => 'POST',
                    'enctype' => 'multipart/form-data',
                    'files' => true,
                    'id' => 'form',
                ]) !!}
                <div class="row">

                    <div class="col-xs-12 col-sm-12 col-md-12">

                        <div class="form-group">

                            <h3> All Parks</h3>
                            <br>
                            <div class="row" id="parks1">

                                @foreach ($parks as $value)
                                    <div class="col-md-4">
                                        @isset($list)
                                            <label>{{ Form::checkbox('park_id[]', $value->id, in_array($value->id, $list) ? true : false, ['class' => 'name checkbox_roles parks']) }}
                                                {{ $value->name }}</label>
                                        @else
                                            <label>{{ Form::checkbox('park_id[]', $value->id, false, ['class' => 'name checkbox_roles parks']) }}
                                                {{ $value->name }}</label>
                                        @endisset
                                    </div>
                                @endforeach

                                @error('park_id')
                                    <div class="invalid-feedback" style="color: #ef1010">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                        </div>
                        <input type="hidden" name="user_id" value="{{ $user_id }}" id="userid">
                        <div class="col-xs-12 col-sm-12 col-md-12" id="zones">

                            <div class="form-group">

                                <h3> All Zones</h3>
                                <br>
                                <div class="row">

                                    @foreach ($zones as $value)
                                        <div class="col-md-4">
                                            @isset($list)
                                                <label>{{ Form::checkbox('zone_id[]', $value->id, in_array($value->id, $listZone) ? true : false, ['class' => 'name checkbox_roles zone1']) }}
                                                    {{ $value->name }}</label>
                                            @else
                                                <label>{{ Form::checkbox('zone_id[]', $value->id, false, ['class' => 'name checkbox_roles zone1']) }}
                                                    {{ $value->name }}</label>
                                            @endisset
                                        </div>
                                    @endforeach

                                    @error('zone_id')
                                        <div class="invalid-feedback" style="color: #ef1010">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12" id="riders">

                            <div class="form-group">

                                <h3> All Rides</h3>
                                <br>
                                <div class="row">

                                    @foreach ($rides as $rideCollection)
                                        @foreach ($rideCollection as $ride)
                                            <div class="col-md-4">
                                                @isset($listRide)
                                                    <label>{{ Form::checkbox('ride_id[]', $ride->id, in_array($ride->id, $listRide) ? true : false, ['class' => 'name checkbox_roles']) }}
                                                        {{ $ride->name }}</label>
                                                @else
                                                    <label>{{ Form::checkbox('ride_id[]', $ride->id, false, ['class' => 'name checkbox_roles']) }}
                                                        {{ $ride->name }}</label>
                                                @endisset

                                            </div>
                                        @endforeach
                                    @endforeach
                                    @error('ride_id')
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
                        {!! Form::close() !!}
                    </div>
                </div>
            </div><!-- end col -->
        </div>

    </div>
@endsection
@push('scripts')
    <script>
        $(".parks").click(function() {
            var selected = []; // initialize array
            $('div#parks1 input[type=checkbox]').each(function() {
                if ($(this).is(":checked")) {
                    selected.push($(this).attr('value'));
                }
            });
            var user_id = $('#userid').val();
            console.log(selected)
            $.ajax({
                url: "{{ route('admin.getZones') }}",
                method: 'GET',
                data: {
                    arr: selected,
                    user_id: user_id
                },
                success: function(data) {
                    console.log(data)
                    $('#zones').html(' ');
                    $('#zones').html(data);
                    $('#riders').html(' ');
                }
            });
        });
        $(document).on("click",".zone1",function() {

            var selected = []; // initialize array
            $('div#zones input[type=checkbox]').each(function() {
                if ($(this).is(":checked")) {
                    selected.push($(this).attr('value'));
                }
            });
            var user_id = $('#userid').val();
            console.log(selected)
            $.ajax({
                url: "{{ route('admin.getRiders') }}",
                method: 'GET',
                data: {
                    arr: selected,
                    user_id: user_id
                },
                success: function(data) {
                    console.log(data)
                    $('#riders').html(' ');
                    $('#riders').html(data);
                }
            });
        });
    </script>
@endpush
