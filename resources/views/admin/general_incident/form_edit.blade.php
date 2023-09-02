<div class="row">
    <div class="col-xs-12">
        <div class="form-group form-float">
            <label class="form-label">Choose One</label>
            <div class="form-line">
                <input type="radio" name="choose" id="ride" value="ride"
                    @if ($accident->ride_id != null) checked @endif checked class="ml-4"> Ride

                <input type="radio" name="choose" id="park" @if ($accident->park_id != null && $accident->zone_id == null && $accident->ride_id == null) checked @endif
                    value="park" class="ml-4"> Park
                <input type="radio" name="choose" id="zone" value="zone" class="ml-4"
                    @if ($accident->zone_id != null && $accident->ride_id == null) checked @endif> Zone
                <input type="radio" name="choose" id="general" value="general" class="ml-4"
                    @if ($accident->text != null) checked @endif> General
            </div>
        </div>
    </div>
    <div class="col-xs-4" id="parks"  @if ($accident->park_id == null) style="display: none;" @endif>
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
    <div class="col-xs-4" id="zones"  @if ($accident->zone_id == null) style="display: none;" @endif>
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
    </div>
    <div class="col-xs-4" id="rides" @if ($accident->ride_id == null) style="display: none;" @endif>
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
    <div class="col-xs-12" id="text"   @if ($accident->text == null) style="display: none;" @endif>
        <div class="form-group form-float">
            <label class="form-label">General Text</label>
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
    <div class="col-xs-6">
        <div class="form-group form-float">
            <label class="form-label">Department</label>
            <div class="form-line">
                {!! Form::select('department_id', $departments, $accident->value['department_id'], [
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
            <label class="form-label">Date/Time</label>
            <div class="form-line">
                {!! Form::datetimeLocal('date', $accident->value['date'], [
                    'class' => 'form-control',
                    'placeholder' => 'Start Time',
                ]) !!}
                @error('date')
                    <div class="invalid-feedback" style="color: #ef1010">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
    </div>
    <div class="col-xs-12">
        <div class="form-group form-float">
            <label class="form-label">Location</label>
            <div class="form-line">
                {!! Form::input('text', 'location', $accident?->value['location'], [
                    'class' => 'form-control  ',
                    'placeholder' => 'location',
                ]) !!}
                @error('location')
                    <div class="invalid-feedback" style="color: #ef1010">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
    </div>
    <div class="col-xs-6">
        <div class="form-group form-float">
            <label class="form-label">Type Of Event</label>
            <div class="form-line">
                <input type="radio" name="type_of_event" @if ($accident?->value['type_of_event'] == 'Accident') checked @endif
                    value="Accident" class="ml-3"> Accident
                <input type="radio" name="type_of_event" @if ($accident?->value['type_of_event'] == 'Health') checked @endif
                    value="Health" class="ml-3"> Health
                <input type="radio" name="type_of_event" @if ($accident?->value['type_of_event'] == 'Near Miss') checked @endif
                    value="Near Miss" class="ml-3"> Near Miss
                <input type="radio" name="type_of_event" @if ($accident?->value['type_of_event'] == 'Incident') checked @endif
                    value="Incident" class="ml-3"> Incident
            </div>
        </div>
    </div>
    <div class="col-xs-6">
        <div class="form-group form-float">
            <label class="form-label">Harm (or Potential for Harm)</label>
            <div class="form-line">
                <input type="radio" name="harm" @if ($accident?->value['harm'] == 'Fatal or Major') checked @endif
                    value="Fatal or Major" class="ml-3"> Fatal or Major
                <input type="radio" name="harm" @if ($accident?->value['harm'] == 'Serious') checked @endif value="Serious"
                    class="ml-3"> Serious
                <input type="radio" name="harm" @if ($accident?->value['harm'] == 'Minor') checked @endif
                    value="Minor" class="ml-3"> Minor
                <input type="radio" name="harm" @if ($accident?->value['harm'] == 'Property Damage') checked @endif
                    value="Property Damage" class="ml-3"> Property Damage
            </div>
        </div>
    </div>
    <div class="mt-3">
        <h4 style="text-align:center">
            <strong>Person Involved</strong>
        </h4>
        <div class="col-xs-6">
            <div class="form-group form-float">
                <label class="form-label">Name</label>
                <div class="form-line">
                    {!! Form::input('text', 'name', $accident?->value['name'], ['class' => 'form-control']) !!}
                    @error('time')
                        <div class="invalid-feedback" style="color: #ef1010">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
        </div>
        <div class="col-xs-6">
            <div class="form-group form-float">
                <label class="form-label">Position</label>
                <div class="form-line">
                    {!! Form::input('text', 'position', $accident?->value['position'], ['class' => 'form-control']) !!}
                    @error('position')
                        <div class="invalid-feedback" style="color: #ef1010">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
        </div>
        <div class="col-xs-6">
            <div class="form-group form-float">
                <label class="form-label">Address</label>
                <div class="form-line">
                    {!! Form::input('text', 'address', $accident?->value['address'], ['class' => 'form-control']) !!}
                    @error('address')
                        <div class="invalid-feedback" style="color: #ef1010">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
        </div>
        <div class="col-xs-6">
            <div class="form-group form-float">
                <label class="form-label">Contact No.</label>
                <div class="form-line">
                    {!! Form::input('text', 'phone', $accident?->value['phone'], ['class' => 'form-control']) !!}
                    @error('phone')
                        <div class="invalid-feedback" style="color: #ef1010">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
        </div>
    </div>
    <div class="col-xs-12">
        <div class="form-group form-float">
            <label class="form-label">Brief Description of Event:
                (Details of what happened, when, where and any emergency action taken)
            </label>
            <div class="form-line">
                {!! Form::textArea('description', $accident?->value['description'], [
                    'class' => 'form-control summernote',
                    'placeholder' => 'Description',
                ]) !!}
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
            <label class="form-label">Details of witness(es), if any:
                (Name, position, contact number etc.)
            </label>
            <div class="form-line">
                {!! Form::textArea('details', $accident?->value['details'], [
                    'class' => 'form-control summernote',
                    'placeholder' => 'Description',
                ]) !!}
                @error('details')
                    <div class="invalid-feedback" style="color: #ef1010">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
    </div>
    <div class="col-xs-6">
        <div class="form-group form-float">
            <label class="form-label">Investigation Required</label>
            <div class="form-line">
                <input type="radio" name="investigation" @if ($accident?->value['investigation'] == 'Yes') checked @endif
                    value="Yes" class="ml-3"> Yes
                <input type="radio" name="investigation" @if ($accident?->value['investigation'] == 'No') checked @endif
                    value="No" class="ml-3"> No

            </div>
        </div>
    </div>
    <div class="col-xs-6">
        <div class="form-group form-float">
            <label class="form-label">RIDDOR reportable</label>
            <div class="form-line">
                <input type="radio" name="reportable" @if ($accident?->value['reportable'] == 'Yes') checked @endif
                    value="Yes" class="ml-3"> Yes
                <input type="radio" name="reportable" @if ($accident?->value['reportable'] == 'No') checked @endif
                    value="No" class="ml-3"> No

            </div>
        </div>
    </div>
    <div class="col-xs-6">
        <div class="form-group form-float">
            <label class="form-label">Investigation Level:</label>
            <div class="form-line">
                <input type="radio" name="investigation_level" @if ($accident?->value['investigation_level'] == 'High') checked @endif
                    value="High" class="ml-3"> High
                <input type="radio" name="investigation_level" @if ($accident?->value['investigation_level'] == 'Med') checked @endif
                    value="Med" class="ml-3"> Med
                <input type="radio" name="investigation_level" @if ($accident?->value['investigation_level'] == 'Low') checked @endif
                    value="Low" class="ml-3"> Low
                <input type="radio" name="investigation_level" @if ($accident?->value['investigation_level'] == 'Minimal') checked @endif
                    value="Minimal" class="ml-3"> Minimal
                <input type="radio" name="investigation_level" @if ($accident?->value['investigation_level'] == 'N/A') checked @endif
                    value="N/A" class="ml-3"> N/A
            </div>
        </div>
    </div>
    <div class="col-xs-6">
        <div class="form-group form-float">
            <label class="form-label">Entered in Accident Book</label>
            <div class="form-line">
                <input type="radio" name="book" @if ($accident?->value['book'] == 'Yes') checked @endif
                    value="Yes" class="ml-3"> Yes
                <input type="radio" name="book" @if ($accident?->value['book'] == 'No') checked @endif
                    value="No" class="ml-3"> No

            </div>
        </div>
    </div>

    <div class="col-xs-12 aligne-center contentbtn">
        <button class="btn btn-primary waves-effect" type="submit">Save</button>
    </div>
</div>
