<div class="row">
    <div class="col-xs-12">
        <div class="form-group form-float">
            <label class="form-label">Choose One</label>
            <div class="form-line">
                <input type="radio" name="choose" id="ride" value="ride" checked class="ml-4"> Ride

                <input type="radio" name="choose" id="park" value="park" class="ml-4"> Park
                {{-- <input type="radio" name="choose" id="zone" value="zone" class="ml-4"> Zone --}}
                {{-- <input type="radio" name="choose" id="general" value="general" class="ml-4"> General --}}
            </div>
        </div>
    </div>
    <div class="col-xs-4" id="parks">
        <div class="form-group form-float">
            <label class="form-label">Parks</label>
            <div class="form-line">
                {!! Form::select('park_id', $parks, null, [
                    'class' => 'form-control select2 Parks',
                    'placeholder' => 'Choose Park...',
                ]) !!}
                @error('park_id')
                    <div class="invalid-feedback" style="color: #ef1010">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
    </div>
    {{-- <div class="col-xs-4" id="zones">
        <div class="form-group form-float">
            <label class="form-label">Zones</label>
            <div class="form-line">
                {!! Form::select('zone_id', $zones, null, [
                    'class' => 'form-control select2 Zones',
                    'placeholder' => 'Choose Zone...',
                ]) !!}
                @error('zone_id')
                    <div class="invalid-feedback" style="color: #ef1010">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
    </div> --}}
    <div class="col-xs-4" id="rides">
        <div class="form-group form-float">
            <label class="form-label">Rides</label>
            <div class="form-line">
                {!! Form::select('ride_id', $rides, null, [
                    'class' => 'form-control select2 Rides',
                    'placeholder' => 'Choose Ride...',
                ]) !!}
                @error('ride_id')
                    <div class="invalid-feedback" style="color: #ef1010">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
    </div>
    <div class="col-xs-12" id="text" style="display: none;">
        <div class="form-group form-float">
            <label class="form-label">Location</label>
            <div class="form-line">
                {!! Form::input('text', 'text', null, ['class' => 'form-control  ', 'placeholder' => 'text']) !!}
                @error('text')
                    <div class="invalid-feedback" style="color: #ef1010">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
    </div>
</div>
<div class="row">

    <div class="col-xs-6">
        <div class="form-group form-float">
            <label class="form-label">Department</label>
            <div class="form-line">
                {!! Form::select('department_id', $departments, null, [
                    'class' => 'form-control select2',
                    'placeholder' => 'Choose Department...',
                ]) !!}
                @error('department_id')
                    <div class="invalid-feedback" style="color: #ef1010">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
    </div>
    <div class="col-xs-6">
        <div class="form-group form-float">
            <label class="form-label">Date Of Accident</label>
            <div class="form-line">
                {!! Form::date('date', null, ['class' => 'form-control', 'placeholder' => 'Start Time']) !!}
                @error('date')
                    <div class="invalid-feedback" style="color: #ef1010">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
    </div>
    <div class="col-xs-6">
        <div class="form-group form-float">
            <label class="form-label">Date of Witness Statement</label>
            <div class="form-line">
                {!! Form::datetimeLocal('witness_statement', null, ['class' => 'form-control', 'placeholder' => 'Start Time']) !!}
                @error('witness_statement')
                    <div class="invalid-feedback" style="color: #ef1010">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
    </div>
    <div class="col-xs-6">
        <div class="form-group form-float">
            <label class="form-label">Time Statement Taken</label>
            <div class="form-line">
                {!! Form::time('time', null, ['class' => 'form-control', 'placeholder' => 'Start Time']) !!}
                @error('time')
                    <div class="invalid-feedback" style="color: #ef1010">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
    </div>
    <div class="col-xs-4">
        <div class="form-group form-float">
            <label class="form-label">Witness Name</label>
            <div class="form-line">
                {!! Form::input('text', 'witness_name', null, [
                    'class' => 'form-control  ',
                    'placeholder' => 'Enter witness name',
                ]) !!}
                @error('witness_name')
                    <div class="invalid-feedback" style="color: #ef1010">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
    </div>
    <div class="col-xs-4">
        <div class="form-group form-float">
            <label class="form-label">Witness Phone No</label>
            <div class="form-line">
                {!! Form::input('number', 'witness_phone', null, [
                    'class' => 'form-control  ',
                    'placeholder' => 'Enter witness phone',
                ]) !!}
                @error('witness_phone')
                    <div class="invalid-feedback" style="color: #ef1010">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
    </div>
    <div class="col-xs-4">
        <div class="form-group form-float">
            <label class="form-label">Witness Position</label>
            <div class="form-line">
                {!! Form::input('text', 'witness_position', null, [
                    'class' => 'form-control  ',
                    'placeholder' => 'Enter witness position',
                ]) !!}
                @error('witness_position')
                    <div class="invalid-feedback" style="color: #ef1010">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
    </div>
    <div class="col-xs-12">
        <div class="form-group form-float">
            <label class="form-label"> Statement
            </label>
            <div class="form-line">
                {!! Form::textArea('statement', null, ['class' => 'form-control summernote', 'placeholder' => 'Description']) !!}
                @error('statement')
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
