<div class="row">
        <div class="col-xs-12">
            <div class="form-group form-float">
                <label class="form-label">Choose One</label>
                <div class="form-line">
                    <input type="radio" name="choose" id="ride" value="ride" checked class="ml-4"> Ride
    
                    <input type="radio" name="choose" id="park" value="park" class="ml-4" > Park
                    <input type="radio" name="choose" id="zone" value="zone" class="ml-4"> Zone
                    <input type="radio" name="choose" id="general" value="general" class="ml-4"> General
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
        <div class="col-xs-4" id="zones" >
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
        <div class="col-xs-4" id="rides"  >
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
</div>
<div class="row">

        <h4 style="text-align:center">
            <strong>Incident Details</strong>
        </h4>
        <div class="col-xs-4">
            <div class="form-group form-float">
                <label class="form-label">Name of Person Involved:</label>
                <div class="form-line">
                    {!! Form::input('text', 'person_name', null, ['class' => 'form-control']) !!}
                    @error('person_name')
                        <div class="invalid-feedback" style="color: #ef1010">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
        </div>
        <div class="col-xs-4">
            <div class="form-group form-float">
                <label class="form-label">Incident Date:</label>
                <div class="form-line">
                    {!! Form::date('incident_date', null, ['class' => 'form-control']) !!}
                    @error('incident_date')
                        <div class="invalid-feedback" style="color: #ef1010">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
        </div>
        <div class="col-xs-4">
            <div class="form-group form-float">
                <label class="form-label">Time of Incident:</label>
                <div class="form-line">
                    {!! Form::time('incident_time', null, ['class' => 'form-control']) !!}
                    @error('incident_time')
                        <div class="invalid-feedback" style="color: #ef1010">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
        </div>
    </div>
    <div class="col-xs-3">
        <div class="form-group form-float">
            <label class="form-label">Employee</label>
            <div class="form-line">
                <input type="hidden" name="employee" value="null"> <!-- Hidden input with value null -->
    <input type="radio" name="employee" value="Yes" class="ml-3"> Yes
                <input type="radio" name="employee" value="No" class="ml-3"> No
           </div>
        </div>
    </div>
    <div class="col-xs-3">
        <div class="form-group form-float">
            <label class="form-label">Contractor</label>
            <div class="form-line">
                <input type="hidden" name="contractor" value="null"> <!-- Hidden input with value null -->
    <input type="radio" name="contractor" value="Yes" class="ml-3"> Yes
                <input type="radio" name="contractor" value="No" class="ml-3"> No
           </div>
        </div>
    </div>
    <div class="col-xs-3">
        <div class="form-group form-float">
            <label class="form-label">Customer</label>
            <div class="form-line">
                <input type="hidden" name="customer" value="null"> <!-- Hidden input with value null -->
    <input type="radio" name="customer" value="Yes" class="ml-3"> Yes
                <input type="radio" name="customer" value="No" class="ml-3"> No
           </div>
        </div>
    </div>
    <div class="col-xs-3">
        <div class="form-group form-float">
            <label class="form-label">Pedestrian</label>
            <div class="form-line">
                <input type="hidden" name="pedestrian" value="null"> <!-- Hidden input with value null -->
    <input type="radio" name="pedestrian" value="Yes" class="ml-3"> Yes
                <input type="radio" name="pedestrian" value="No" class="ml-3"> No
           </div>
        </div>
    </div>

    <div class="col-xs-12">
        <div class="form-group form-float">
            <label class="form-label">Location</label>
            <div class="form-line">
                {!! Form::input('text', 'location', null, ['class' => 'form-control  ', 'placeholder' => 'location']) !!}
                @error('location')
                    <div class="invalid-feedback" style="color: #ef1010">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
    </div>

    <div class="col-xs-12">
        <div class="form-group form-float">
            <label class="form-label">Address</label>
            <div class="form-line">
                {!! Form::input('text', 'address', null, ['class' => 'form-control  ', 'placeholder' => 'location']) !!}
                @error('address')
                    <div class="invalid-feedback" style="color: #ef1010">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
    </div>

    <div class="col-xs-3">
        <div class="form-group form-float">
            <label class="form-label">Head Office Informed?</label>
            <div class="form-line">
                <input type="hidden" name="head_office_informed" value="null"> <!-- Hidden input with value null -->
    <input type="radio" name="head_office_informed" value="Yes" class="ml-3"> Yes
                <input type="radio" name="head_office_informed" value="No" class="ml-3"> No
           </div>
        </div>
    </div>

    <div class="col-xs-4">
        <div class="form-group form-float">
            <label class="form-label">Date</label>
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
    <div class="col-xs-5">
        <div class="form-group form-float">
            <label class="form-label">Name of Person:</label>
            <div class="form-line">
            {!! Form::input('text', 'name_person_informed', null, ['class' => 'form-control  ', 'placeholder' => 'name_person_informed']) !!}
                @error('name_person_informed')
                    <div class="invalid-feedback" style="color: #ef1010">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
    </div>
    <div class="col-xs-3">
        <div class="form-group form-float">
            <label class="form-label">Accident Book Completed? </label>
            <div class="form-line">
                <input type="hidden" name="accident_book_completed" value="null"> <!-- Hidden input with value null -->
    <input type="radio" name="accident_book_completed" value="Yes" class="ml-3"> Yes
                <input type="radio" name="accident_book_completed" value="No" class="ml-3"> No
           </div>
        </div>
    </div>

    <div class="col-xs-4">
        <div class="form-group form-float">
            <label class="form-label">Date Entered</label>
            <div class="form-line">
            {!! Form::date('date_entered', null, ['class' => 'form-control', 'placeholder' => 'date entered']) !!}
                @error('date_entered')
                    <div class="invalid-feedback" style="color: #ef1010">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
    </div>

    <div class="col-xs-5">
        <div class="form-group form-float">
            <label class="form-label">	Report Reference No:</label>
            <div class="form-line">
            {!! Form::input('text', 'report_eference_no', null, ['class' => 'form-control  ', 'placeholder' => 'Report Reference No']) !!}
                @error('report_eference_no')
                    <div class="invalid-feedback" style="color: #ef1010">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
    </div>

    <div class="col-xs-3">
        <div class="form-group form-float">
            <label class="form-label">RIDDOR Reportable?</label>
            <div class="form-line">
                <input type="hidden" name="riddor_reportable" value="null"> <!-- Hidden input with value null -->
    <input type="radio" name="riddor_reportable" value="Yes" class="ml-3"> Yes
                <input type="radio" name="riddor_reportable" value="No" class="ml-3"> No
           </div>
        </div>
    </div>

    <div class="col-xs-4">
        <div class="form-group form-float">
            <label class="form-label">Date Reported</label>
            <div class="form-line">
            {!! Form::date('date_reported', null, ['class' => 'form-control', 'placeholder' => 'Date Reported']) !!}
                @error('date_reported')
                    <div class="invalid-feedback" style="color: #ef1010">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
    </div>

    <div class="col-xs-5">
        <div class="form-group form-float">
            <label class="form-label">Time Reported:</label>
            <div class="form-line">
            {!! Form::time('time_eported', null, ['class' => 'form-control  ', 'placeholder' => 'Time Reported']) !!}
                @error('time_eported')
                    <div class="invalid-feedback" style="color: #ef1010">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
    </div>
        <h4 style="text-align:center">
            <strong>Investigation Team Member Details</strong>
        </h4>
        <div class="col-xs-6">
            <div class="form-group form-float">
                <label class="form-label">Investigation Lead Name:</label>
                <div class="form-line">
                    {!! Form::input('text', 'investigation_lead_name', null, ['class' => 'form-control']) !!}
                    @error('investigation_lead_name')
                        <div class="invalid-feedback" style="color: #ef1010">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
        </div>
        <div class="col-xs-6">
            <div class="form-group form-float">
                <label class="form-label">Department:</label>
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
        <div class="col-xs-12">
            <div class="form-group form-float">
                <label class="form-label">Designation:</label>
                <div class="form-line">
                    {!! Form::input('text', 'designation', null, ['class' => 'form-control']) !!}
                    @error('designation')
                        <div class="invalid-feedback" style="color: #ef1010">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
        </div>

    <div class="col-xs-6">
            <div class="form-group form-float">
                <label class="form-label">Investigation Assistant  Name:</label>
                <div class="form-line">
                    {!! Form::input('text', 'investigation_assistant_name', null, ['class' => 'form-control']) !!}
                    @error('investigation_assistant_name')
                        <div class="invalid-feedback" style="color: #ef1010">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
        </div>
        <div class="col-xs-6">
            <div class="form-group form-float">
                <label class="form-label">Department:</label>
                <div class="form-line">
                    {!! Form::select('investigation_department_id', $departments, null, [
                        'class' => 'form-control select2',
                        'placeholder' => 'Choose Department...',
                    ]) !!}
                    @error('investigation_department_id')
                        <div class="invalid-feedback" style="color: #ef1010">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
        </div>
        <div class="col-xs-12">
            <div class="form-group form-float">
                <label class="form-label">Designation:</label>
                <div class="form-line">
                    {!! Form::input('text', 'Investigation_designation', null, ['class' => 'form-control']) !!}
                    @error('Investigation_designation')
                        <div class="invalid-feedback" style="color: #ef1010">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
        </div>
        <h4 style="text-align:center">
            <strong>Witnesses to Incident</strong>
        </h4>
    <div class="col-xs-4">
        <div class="form-group form-float">
            <label class="form-label">Was Incident Witnessed? </label>
            <div class="form-line">
                <input type="hidden" name="was_incident_witnessed" value="null"> <!-- Hidden input with value null -->
    <input type="radio" name="was_incident_witnessed" value="Yes" class="ml-3"> Yes
                <input type="radio" name="was_incident_witnessed" value="No" class="ml-3"> No
           </div>
        </div>
    </div>
    <div class="col-xs-4">
        <div class="form-group form-float">
            <label class="form-label">Are Witnesses Employees?</label>
            <div class="form-line">
                <input type="hidden" name="are_witnesses_employees" value="null"> <!-- Hidden input with value null -->
    <input type="radio" name="are_witnesses_employees" value="Yes" class="ml-3"> Yes
                <input type="radio" name="are_witnesses_employees" value="No" class="ml-3"> No
           </div>
        </div>
    </div>
    <div class="col-xs-4">
        <div class="form-group form-float">
            <label class="form-label">Witnesses Statements Taken?</label>
            <div class="form-line">
                <input type="hidden" name="witnesses_statements_taken" value="null"> <!-- Hidden input with value null -->
    <input type="radio" name="witnesses_statements_taken" value="Yes" class="ml-3"> Yes
                <input type="radio" name="witnesses_statements_taken" value="No" class="ml-3"> No
           </div>
        </div>
    </div>
    <div class="col-xs-6">
        <div class="form-group form-float">
            <label class="form-label">Witness Name:</label>
            <div class="form-line">
                {!! Form::input('text', 'witnesses_name_one', null, ['class' => 'form-control  ', 'placeholder' => 'Witness Name']) !!}
                @error('witnesses_name_one')
                    <div class="invalid-feedback" style="color: #ef1010">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
    </div>

    <div class="col-xs-6">
        <div class="form-group form-float">
            <label class="form-label">Contact Phone No:</label>
            <div class="form-line">
                {!! Form::input('text', 'contact_phone_no_one', null, ['class' => 'form-control  ', 'placeholder' => 'Contact Phone No']) !!}
                @error('contact_phone_no_one')
                    <div class="invalid-feedback" style="color: #ef1010">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
    </div>
    <div class="col-xs-12">
        <div class="form-group form-float">
            <label class="form-label">Address:</label>
            <div class="form-line">
                {!! Form::input('text', 'witnesses_address_one', null, ['class' => 'form-control  ', 'placeholder' => 'Address']) !!}
                @error('witnesses_address_one')
                    <div class="invalid-feedback" style="color: #ef1010">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
    </div>

    <div class="col-xs-6">
        <div class="form-group form-float">
            <label class="form-label">Witness Name:</label>
            <div class="form-line">
                {!! Form::input('text', 'witnesses_name_two', null, ['class' => 'form-control  ', 'placeholder' => 'Witness Name']) !!}
                @error('witnesses_name_two')
                    <div class="invalid-feedback" style="color: #ef1010">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
    </div>

    <div class="col-xs-6">
        <div class="form-group form-float">
            <label class="form-label">Contact Phone No:</label>
            <div class="form-line">
                {!! Form::input('text', 'contact_phone_no_two', null, ['class' => 'form-control  ', 'placeholder' => 'Contact Phone No']) !!}
                @error('contact_phone_no_two')
                    <div class="invalid-feedback" style="color: #ef1010">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
    </div>
    <div class="col-xs-12">
        <div class="form-group form-float">
            <label class="form-label">Address:</label>
            <div class="form-line">
                {!! Form::input('text', 'witnesses_address_two', null, ['class' => 'form-control  ', 'placeholder' => 'Address']) !!}
                @error('witnesses_address_two')
                    <div class="invalid-feedback" style="color: #ef1010">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
    </div>
    <div class="col-xs-6">
        <div class="form-group form-float">
            <label class="form-label">Witness Name:</label>
            <div class="form-line">
                {!! Form::input('text', 'witnesses_name_three', null, ['class' => 'form-control  ', 'placeholder' => 'Witness Name']) !!}
                @error('witnesses_name_three')
                    <div class="invalid-feedback" style="color: #ef1010">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
    </div>

    <div class="col-xs-6">
        <div class="form-group form-float">
            <label class="form-label">Contact Phone No:</label>
            <div class="form-line">
                {!! Form::input('text', 'contact_phone_no_three', null, ['class' => 'form-control  ', 'placeholder' => 'Contact Phone No']) !!}
                @error('location')
                    <div class="invalid-feedback" style="color: #ef1010">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
    </div>
    <div class="col-xs-12">
        <div class="form-group form-float">
            <label class="form-label">Address:</label>
            <div class="form-line">
                {!! Form::input('text', 'witnesses_address_three', null, ['class' => 'form-control  ', 'placeholder' => 'Address']) !!}
                @error('witnesses_address_three')
                    <div class="invalid-feedback" style="color: #ef1010">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
    </div>
        <h4 style="text-align:center">
            <strong>Details of What Lead to the Incident (in brief)</strong>
        </h4>
        <div class="col-xs-12">
        <div class="form-group form-float">
            <div class="form-line">
                {!! Form::textArea("details",null,['class'=>'form-control summernote','placeholder'=>'Details'])!!}
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
            <label class="form-label">Was the Incident Work Related?</label>
            <div class="form-line">
                <input type="hidden" name="was_the_incident_work_related" value="null"> <!-- Hidden input with value null -->
    <input type="radio" name="was_the_incident_work_related" value="Yes" class="ml-3"> Yes
                <input type="radio" name="was_the_incident_work_related" value="No" class="ml-3"> No
           </div>
        </div>
    </div>
    <div class="col-xs-6">
        <div class="form-group form-float">
            <label class="form-label">Was First Aid Administered at Location?</label>
            <div class="form-line">
                <input type="hidden" name="was_first_aid_administered_at_location" value="null"> <!-- Hidden input with value null -->
    <input type="radio" name="was_first_aid_administered_at_location" value="Yes" class="ml-3"> Yes
                <input type="radio" name="was_first_aid_administered_at_location" value="No" class="ml-3"> No
           </div>
        </div>
    </div>
    <div class="col-xs-12">
        <div class="form-group form-float">
            <label class="form-label">Name of First Aider:</label>
            <div class="form-line">
                {!! Form::input('text', 'name_of_first_aider', null, ['class' => 'form-control  ', 'placeholder' => 'Name of First Aider']) !!}
                @error('name_of_first_aider')
                    <div class="invalid-feedback" style="color: #ef1010">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
    </div>

    <div class="col-xs-12">
        <div class="form-group form-float">
            <label class="form-label">Details of Injury:</label>
            <div class="form-line">
                {!! Form::input('text', 'details_of_injury', null, ['class' => 'form-control  ', 'placeholder' => 'Details of Injury']) !!}
                @error('details_of_injury')
                    <div class="invalid-feedback" style="color: #ef1010">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
    </div>
  
    <div class="col-xs-6">
        <div class="form-group form-float">
            <label class="form-label">Were Emergency Services Called?</label>
            <div class="form-line">
                <input type="hidden" name="were_emergency_services_called" value="null"> <!-- Hidden input with value null -->
    <input type="radio" name="were_emergency_services_called" value="Yes" class="ml-3"> Yes
                <input type="radio" name="were_emergency_services_called" value="No" class="ml-3"> No
           </div>
        </div>
    </div>
    <div class="col-xs-6">
        <div class="form-group form-float">
            <label class="form-label">Was Person Involved Hospitalised?</label>
            <div class="form-line">
                <input type="hidden" name="was_person_involved_hospitalised" value="null"> <!-- Hidden input with value null -->
    <input type="radio" name="was_person_involved_hospitalised" value="Yes" class="ml-3"> Yes
                <input type="radio" name="was_person_involved_hospitalised" value="No" class="ml-3"> No
           </div>
        </div>
    </div>

    <div class="col-xs-12 bottom">
    <table class="bordered-table">
        <thead>
            <tr>
                <th colspan="2">Conditions at the Time of Incident</th>
            </tr>
            <tr>
                <th colspan="2">Environmental Conditions</th>
            </tr>
            <tr>
            <th>Hazard</th>
            <th>Description if Required (in brief)</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>
                <input type="hidden" name="Noise" value="null"> <!-- Hidden input with value null -->
    <input type="checkbox" name="Noise" value="Yes" class="ml-3"> Noise
                </td>
                <td>
                    {!! Form::input('text', 'Noise_desc', null, ['class' => 'form-control ']) !!}
                </td>
            </tr>
            <tr>
                <td>
                <input type="hidden" name="Lighting" value="null"> <!-- Hidden input with value null -->
    <input type="checkbox" name="Lighting" value="Yes" class="ml-3"> Lighting
                </td>
                <td>
                    {!! Form::input('text', 'Lighting_desc', null, ['class' => 'form-control  ']) !!}
                </td>
            </tr>
            <tr>
                <td>
                <input type="hidden" name="Dust_Fumes" value="null"> <!-- Hidden input with value null -->
    <input type="checkbox" name="Dust_Fumes" value="Yes" class="ml-3"> Dust / Fumes
                </td>
                <td>
                    {!! Form::input('text', 'Dust_Fumes_desc', null, ['class' => 'form-control  ']) !!}
                </td>
            </tr>
            <tr>
                <td>
                <input type="hidden" name="Slip_Trip_Hazard" value="null"> <!-- Hidden input with value null -->
    <input type="checkbox" name="Slip_Trip_Hazard" value="Yes" class="ml-3"> Slip / Trip Hazard
                </td>
                <td>
                    {!! Form::input('text', 'Slip_Trip_Hazard_desc', null, ['class' => 'form-control  ']) !!}
                </td>
            </tr>
            <tr>
                <td>
                <input type="hidden" name="Layout_Design" value="null"> <!-- Hidden input with value null -->
    <input type="checkbox" name="Layout_Design" value="Yes" class="ml-3"> Layout / Design
                </td>
                <td>
                    {!! Form::input('text', 'Layout_Design_desc', null, ['class' => 'form-control  ']) !!}
                </td>
            </tr>
            <tr>
                <td>
                <input type="hidden" name="Vibration" value="null"> <!-- Hidden input with value null -->
    <input type="checkbox" name="Vibration" value="Yes" class="ml-3"> Vibration
                </td>
                <td>
                    {!! Form::input('text', 'Vibration_desc', null, ['class' => 'form-control  ']) !!}
                </td>
            </tr>
            <tr>
                <td>
                <input type="hidden" name="Damaged_Unstable_Floor" value="null"> <!-- Hidden input with value null -->
    <input type="checkbox" name="Damaged_Unstable_Floor" value="Yes" class="ml-3"> Damaged / Unstable Floor
                </td>
                <td>
                {!! Form::input('text', 'Damaged_Unstable_Floor_desc', null, ['class' => 'form-control  ']) !!}
                </td>
            </tr>
            <tr>
                <td>
                <input type="hidden" name="Weather" value="null"> <!-- Hidden input with value null -->
    <input type="checkbox" name="Weather" value="Yes" class="ml-3"> Weather
                </td>
                <td>
                    {!! Form::input('text', 'Weather_desc', null, ['class' => 'form-control  ']) !!}
                </td>
            </tr>
            <tr>
               <td class="checkbox-cell">
                <input type="hidden" name="Other" value="null"> <!-- Hidden input with value null -->
    <input type="checkbox" name="Other" value="Yes" class="ml-3"> Other
                </td>
                <td>
                    {!! Form::input('text', 'Other_desc', null, ['class' => 'form-control  ']) !!}
                </td>
            </tr>
           
        </tbody>
    </table>
</div>
<br>
<div class="col-xs-12 bottom">
    <table class="bordered-table">
        <thead>
            <tr>
                <th colspan="2">Personal Attributes </th>
            </tr>
            <tr>
            <th>Attribute</th>
            <th>Details (in brief)</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>
                <input type="hidden" name="Fatigue" value="null"> <!-- Hidden input with value null -->
    <input type="checkbox" name="Fatigue" value="Yes" class="ml-3"> Fatigue
                </td>
                <td>
                {!! Form::input('text', 'Fatigue_desc', null, ['class' => 'form-control  ']) !!}
                </td>
            </tr>
            <tr>
                <td>
                <input type="hidden" name="Lack_of_Communication" value="null"> <!-- Hidden input with value null -->
    <input type="checkbox" name="Lack_of_Communication" value="Yes" class="ml-3"> Lack of Communication
                </td>
                <td>
                    {!! Form::input('text', 'Lack_of_Communication_desc', null, ['class' => 'form-control  ']) !!}
                </td>
            </tr>
            <tr>
                <td>
                <input type="hidden" name="Distractions" value="null"> <!-- Hidden input with value null -->
    <input type="checkbox" name="Distractions" value="Yes" class="ml-3"> Distractions


                </td>
                <td>
                    {!! Form::input('text', 'Distractions_desc', null, ['class' => 'form-control  ']) !!}
                </td>
            </tr>
            <tr>
                <td>
                <input type="hidden" name="Change_of_Routine" value="null"> <!-- Hidden input with value null -->
    <input type="checkbox" name="Change_of_Routine" value="Yes" class="ml-3">  Change of Routine


                </td>
                <td>
                    {!! Form::input('text', 'Change_of_Routine_desc', null, ['class' => 'form-control  ']) !!}
                </td>
            </tr>
            <tr>
                <td>
                <input type="hidden" name="Time_Production_Pressure" value="null"> <!-- Hidden input with value null -->
    <input type="checkbox" name="Time_Production_Pressure" value="Yes" class="ml-3"> Time / Production Pressure


                </td>
                <td>
                    {!! Form::input('text', 'Time_Production_Pressure_desc', null, ['class' => 'form-control  ']) !!}
                </td>
            </tr>
            <tr>
                <td>
                <input type="hidden" name="Procedure_No_Followed" value="null"> <!-- Hidden input with value null -->
    <input type="checkbox" name="Procedure_No_Followed" value="Yes" class="ml-3"> Procedure Not Followed
                </td>
                <td>
                    {!! Form::input('text', 'Procedure_No_Followed_desc', null, ['class' => 'form-control  ']) !!}
                </td>
            </tr>
            <tr>
                <td>
                <input type="hidden" name="Drugs_or_Alcohol" value="null"> <!-- Hidden input with value null -->
    <input type="checkbox" name="Drugs_or_Alcohol" value="Yes" class="ml-3"> Drugs or Alcohol
                </td>
                <td>
                    {!! Form::input('text', 'Drugs_or_Alcohol_desc', null, ['class' => 'form-control  ']) !!}
                </td>
            </tr>
            <tr>
               <td class="checkbox-cell">
                <input type="hidden" name="Attribute_Other" value="null"> <!-- Hidden input with value null -->
    <input type="checkbox" name="Attribute_Other" value="Yes" class="ml-3"> Other
                </td>
                <td>
                    {!! Form::input('text', 'Attribute_Other_desc', null, ['class' => 'form-control  ']) !!}
                </td>
            </tr>
           
        </tbody>
    </table>
</div>
<br>
<br>
<br>
<div class="col-xs-12 bottom">
    <table class="bordered-table">
        <thead>
            <tr>
                <th colspan="2">Working Systems</th>
            </tr>
            <tr>
            <th>Hazard</th>
            <th>Details (in brief)</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>
                <input type="hidden" name="No_Hazard_Identified" value="null"> <!-- Hidden input with value null -->
    <input type="checkbox" name="No_Hazard_Identified" value="Yes" class="ml-3"> No Hazard Identified
                </td>
                <td>
                    {!! Form::input('text', 'No_Hazard_Identified_desc', null, ['class' => 'form-control  ']) !!}
                </td>
            </tr>
            <tr>
                <td>
                <input type="hidden" name="Inadequate_Safe_Procedure" value="null"> <!-- Hidden input with value null -->
    <input type="checkbox" name="Inadequate_Safe_Procedure" value="Yes" class="ml-3"> Inadequate Safe Procedure’s
                </td>
                <td>
                    {!! Form::input('text', 'Inadequate_Safe_Procedure_desc', null, ['class' => 'form-control  ']) !!}
                </td>
            </tr>
            <tr>
                <td>
                <input type="hidden" name="Inadequate_Risk_Assessment" value="null"> <!-- Hidden input with value null -->
    <input type="checkbox" name="Inadequate_Risk_Assessment" value="Yes" class="ml-3"> Inadequate Risk Assessment
                </td>
                <td>
                    {!! Form::input('text', 'Inadequate_Risk_Assessment_desc', null, ['class' => 'form-control  ']) !!}
                </td>
            </tr>
            <tr>
                <td>
                <input type="hidden" name="Inadequate_Controls_in_Place" value="null"> <!-- Hidden input with value null -->
    <input type="checkbox" name="Inadequate_Controls_in_Place" value="Yes" class="ml-3"> Inadequate Controls in Place
                </td>
                <td>
                    {!! Form::input('text', 'Inadequate_Controls_in_Place_desc', null, ['class' => 'form-control  ']) !!}
                </td>
            </tr>
            <tr>
                <td>
                <input type="hidden" name="Inadequate_Training" value="null"> <!-- Hidden input with value null -->
    <input type="checkbox" name="Inadequate_Training" value="Yes" class="ml-3"> Inadequate Training


                </td>
                <td>
                    {!! Form::input('text', 'Inadequate_Training_desc', null, ['class' => 'form-control  ']) !!}
                </td>
            </tr>
            <tr>
                <td>
                <input type="hidden" name="Lack_of_Supervision" value="null"> <!-- Hidden input with value null -->
    <input type="checkbox" name="Lack_of_Supervision" value="Yes" class="ml-3"> Lack of Supervision


                </td>
                <td>
                    {!! Form::input('text', 'Lack_of_Supervision_desc', null, ['class' => 'form-control  ']) !!}
                </td>
            </tr>
            <tr>
                <td class="checkbox-cell">
                    <input type="hidden" name="Attribute_two_Other" value="null"> <!-- Hidden input with value null -->
    <input type="checkbox" name="Attribute_two_Other" value="Yes" class="ml-3"> Other
                    </td>
                    <td>
                        {!! Form::input('text', 'Attribute_two_Other_desc', null, ['class' => 'form-control  ']) !!}
                    </td>
            </tr>
           
        </tbody>
    </table>
    </div>
<br>

<div class="col-xs-12 bottom">
    <table class="bordered-table">
        <thead>
            <tr>
                <th colspan="2">Equipment or Materials</th>
            </tr>
            <tr>
            <th>Hazard</th>
            <th>Details (in brief)</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>
                <input type="hidden" name="Incorrect_Equipment" value="null"> <!-- Hidden input with value null -->
    <input type="checkbox" name="Incorrect_Equipment" value="Yes" class="ml-3"> Incorrect Equipment


                </td>
                <td>
                    {!! Form::input('text', 'Incorrect_Equipment_desc', null, ['class' => 'form-control  ']) !!}
                </td>
            </tr>
            <tr>
                <td>
                <input type="hidden" name="Equipment_Failure" value="null"> <!-- Hidden input with value null -->
    <input type="checkbox" name="Equipment_Failure" value="Yes" class="ml-3"> Equipment Failure
                </td>
                <td>
                {!! Form::input('text', 'Equipment_Failure_desc', null, ['class' => 'form-control  ']) !!}
                </td>
            </tr>
            <tr>
                <td>
                <input type="hidden" name="Inadequate_Maintenance" value="null"> <!-- Hidden input with value null -->
    <input type="checkbox" name="Inadequate_Maintenance" value="Yes" class="ml-3">  Inadequate Maintenance
                </td>
                <td>
                    {!! Form::input('text', 'Inadequate_Maintenance_desc', null, ['class' => 'form-control  ']) !!}
                </td>
            </tr>
            <tr>
                <td>
                <input type="hidden" name="Heavy_or_Awkward" value="null"> <!-- Hidden input with value null -->
    <input type="checkbox" name="Heavy_or_Awkward" value="Yes" class="ml-3"> Heavy or Awkward
                </td>
                <td>
                    {!! Form::input('text', 'Heavy_or_Awkward_desc', null, ['class' => 'form-control  ']) !!}
                </td>
            </tr>
            <tr>
                <td>
                <input type="hidden" name="Inadequate_Training_two" value="null"> <!-- Hidden input with value null -->
    <input type="checkbox" name="Inadequate_Training_two" value="Yes" class="ml-3"> Inadequate Training


                </td>
                <td>
                    {!! Form::input('text', 'Inadequate_Training_two_desc', null, ['class' => 'form-control  ']) !!}
                </td>
            </tr>
            <tr>
                <td>
                <input type="hidden" name="Inadequate_Guarding" value="null"> <!-- Hidden input with value null -->
    <input type="checkbox" name="Inadequate_Guarding" value="Yes" class="ml-3"> Inadequate Guarding


                </td>
                <td>
                    {!! Form::input('text', 'Inadequate Guarding_desc', null, ['class' => 'form-control  ']) !!}
                </td>
            </tr>
            <tr>
               <td class="checkbox-cell">
                <input type="hidden" name="Other_four" value="null"> <!-- Hidden input with value null -->
    <input type="checkbox" name="Other_four" value="Yes" class="ml-3"> Other
                </td>
                <td>
                    {!! Form::input('text', 'Other_four_desc', null, ['class' => 'form-control  ']) !!}
                </td>
            </tr>
           
        </tbody>
    </table>
    </div>
<br>

<div class="col-xs-12 bottom">
    <table class="bordered-table">
        <thead>
            <tr>
                <th>Note</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>
                <p class="bold"> All documents to include: </p>

             <p class="bold">  Risk Assessments, Witness Statements, Method Statements, Location Photographs, Training documents, Accident Book copy and any other related documents or evidence to be forwarded to Mellors Group Head Office.
             </p>
          <p class="bold" style="text-align:center;"> Email All Information to: p.pearson@mellorsgroup.com or j.pearson@mellorsgroup.com 
          </p>
            </td>
            </tr>
           
        </tbody>
    </table>
    </div>
<br>
<div class="col-xs-12 bottom">
    <table class="bordered-table">
        <thead>
            <tr>
                <th colspan="5">Corrective Actions Required</th>
            </tr>
            <tr>
            <th>Contributing Factors (as Above)</th>
            <th>Corrective Actions Required</th>
            <th>To be Completed by Name</th>
            <th>Date to be Completed</th>
            <th>Further Actions</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>
                {!! Form::input('text', 'Contributing1', null, ['class' => 'form-control  ']) !!}
            </td>
            <td>
                {!! Form::input('text', 'Corrective_Actions1', null, ['class' => 'form-control  ']) !!}
            </td>
            <td>
                {!! Form::input('text', 'Completed_by_Name1', null, ['class' => 'form-control']) !!}
            </td>
            <td>
                {!! Form::date('Date_to_be_Completed1', null, ['class' => 'form-control  ']) !!}
            </td>
            <td>
                {!! Form::input('text', 'Further_Actions1', null, ['class' => 'form-control ']) !!}
            </td>
            </tr>
            <tr>
                <td>
                {!! Form::input('text', 'Contributing2', null, ['class' => 'form-control  ']) !!}
            </td>
            <td>
                {!! Form::input('text', 'Corrective_Actions2', null, ['class' => 'form-control  ']) !!}
            </td>
            <td>
                {!! Form::input('text', 'Completed_by_Name2', null, ['class' => 'form-control']) !!}
            </td>
            <td>
                {!! Form::date('Date_to_be_Completed2', null, ['class' => 'form-control  ']) !!}
            </td>
            <td>
                {!! Form::input('text', 'Further_Actions2', null, ['class' => 'form-control ']) !!}
            </td>
            </tr>
            <tr>
                <td>
                {!! Form::input('text', 'Contributing3', null, ['class' => 'form-control  ']) !!}
            </td>
            <td>
                {!! Form::input('text', 'Corrective_Actions3', null, ['class' => 'form-control  ']) !!}
            </td>
            <td>
                {!! Form::input('text', 'Completed_by_Name3', null, ['class' => 'form-control']) !!}
            </td>
            <td>
                {!! Form::date('Date_to_be_Completed3', null, ['class' => 'form-control  ']) !!}
            </td>
            <td>
                {!! Form::input('text', 'Further_Actions3', null, ['class' => 'form-control ']) !!}
            </td>
            </tr>
            <tr>
                <td>
                {!! Form::input('text', 'Contributing4', null, ['class' => 'form-control  ']) !!}
            </td>
            <td>
                {!! Form::input('text', 'Corrective_Actions4', null, ['class' => 'form-control  ']) !!}
            </td>
            <td>
                {!! Form::input('text', 'Completed_by_Name4', null, ['class' => 'form-control']) !!}
            </td>
            <td>
                {!! Form::date('Date_to_be_Completed4', null, ['class' => 'form-control  ']) !!}
            </td>
            <td>
                {!! Form::input('text', 'Further_Actions4', null, ['class' => 'form-control ']) !!}
            </td>
            </tr>
        </tbody>
    </table>
    </div>

<div class="col-xs-12 bottom">
    <table class="bordered-table">
        <thead>
            <tr>
                <th>Further Information or Notes</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>
                {!! Form::textArea("Further_Information",null,['class'=>'form-control summernote','placeholder'=>'Description'])!!}

            </td>
            </tr>
           
        </tbody>
    </table>
    </div>
<br>

<div class="col-xs-12 bottom">
    <table class="bordered-table">
        <thead>
            <tr style="background-color: blue;">
                <th colspan="5">Declaration of Report Completion and Submission</th>
            </tr>
        </thead>
        <tbody>
            <tr>
            <td class="bold"> 
            Report Completed By: </td>
            <td>
                {!! Form::input('text', 'Report_Completed_By', null, ['class' => 'form-control  ']) !!}
            </td>
            <td class="bold"> 
            Date Completed:
            </td>
            <td>
                {!! Form::date('Date_Completed', null, ['class' => 'form-control  ']) !!}
            </td>
            </tr>
            <tr>
            <td class="bold"> 
            Signature: </td>
            <td>
                {!! Form::input('text', 'Signature', null, ['class' => 'form-control  ']) !!}
            </td>
            <td class="bold"> 
            Position:
             </td>
            <td>
                {!! Form::input('text', 'Position', null, ['class' => 'form-control  ', 'placeholder' => 'location']) !!}
            </td>
            </tr>
        </tbody>
    </table>
    </div>

    <div class="col-xs-12 aligne-center contentbtn">
        <button class="btn btn-primary waves-effect" type="submit">Save</button>
    </div>
</div>
