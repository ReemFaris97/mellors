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
                {!! Form::input('text', 'text', $accident?->value['text'], ['class' => 'form-control  ', 'placeholder' => 'text']) !!}
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
<div class="row">

        <h4 style="text-align:center">
            <strong>Incident Details</strong>
        </h4>
        <div class="col-xs-4">
            <div class="form-group form-float">
                <label class="form-label">Name of Person Involved:</label>
                <div class="form-line">
                    {!! Form::input('text', 'person_name', $accident?->value['person_name'], ['class' => 'form-control']) !!}
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
                    {!! Form::date('incident_date', $accident?->value['incident_date'], ['class' => 'form-control']) !!}
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
                    {!! Form::time('incident_time', $accident?->value['incident_time'], ['class' => 'form-control']) !!}
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
                <input type="radio" name="employee"  @if ($accident?->value['employee'] == 'Yes') checked @endif
                    value="Yes" class="ml-3"> Yes
                <input type="radio" name="employee"  @if ($accident?->value['employee'] == 'No') checked @endif
                    value="No" class="ml-3"> No
           </div>
        </div>
    </div>
    <div class="col-xs-3">
        <div class="form-group form-float">
            <label class="form-label">Contractor</label>
            <div class="form-line">
                               <input type="hidden" name="contractor" value="null"> <!-- Hidden input with value null -->
 <input type="radio" name="contractor"  @if ($accident?->value['contractor'] == 'Yes') checked @endif
                    value="Yes" class="ml-3"> Yes
                <input type="radio" name="contractor"  @if ($accident?->value['contractor'] == 'No') checked @endif
                    value="No" class="ml-3"> No
           </div>
        </div>
    </div>
    <div class="col-xs-3">
        <div class="form-group form-float">
            <label class="form-label">Customer</label>
            <div class="form-line">
                                <input type="hidden" name="customer" value="null"> <!-- Hidden input with value null -->
                <input type="radio" name="customer"  @if ($accident?->value['customer'] == 'Yes') checked @endif
                    value="Yes" class="ml-3"> Yes
                <input type="radio" name="customer"  @if ($accident?->value['customer'] == 'No') checked @endif
                    value="No" class="ml-3"> No
           </div>
        </div>
    </div>
    <div class="col-xs-3">
        <div class="form-group form-float">
            <label class="form-label">Pedestrian</label>
            <div class="form-line">
                    <input type="hidden" name="pedestrian" value="null"> <!-- Hidden input with value null -->
            <input type="radio" name="pedestrian"  @if ($accident?->value['pedestrian'] == 'Yes') checked @endif
                    value="Yes" class="ml-3"> Yes
                <input type="radio" name="pedestrian"  @if ($accident?->value['pedestrian'] == 'No') checked @endif
                    value="No" class="ml-3"> No
           </div>
        </div>
    </div>

    {{-- <div class="col-xs-12">
        <div class="form-group form-float">
            <label class="form-label">Location</label>
            <div class="form-line">
                {!! Form::input('text', 'location', $accident?->value['location'], ['class' => 'form-control  ', 'placeholder' => 'location']) !!}
                @error('location')
                    <div class="invalid-feedback" style="color: #ef1010">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
    </div> --}}

    <div class="col-xs-12">
        <div class="form-group form-float">
            <label class="form-label">Address</label>
            <div class="form-line">
                {!! Form::input('text', 'address', $accident?->value['address'], ['class' => 'form-control  ', 'placeholder' => 'location']) !!}
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
               <input type="radio" name="head_office_informed"  @if ($accident?->value['head_office_informed'] == 'Yes') checked @endif
                    value="Yes" class="ml-3"> Yes
                <input type="radio" name="head_office_informed"  @if ($accident?->value['head_office_informed'] == 'No') checked @endif
                    value="No" class="ml-3"> No
           </div>
        </div>
    </div>

    <div class="col-xs-4">
        <div class="form-group form-float">
            <label class="form-label">Date</label>
            <div class="form-line">
            {!! Form::date('date', $accident?->value['date'], ['class' => 'form-control', 'placeholder' => 'Start Time']) !!}
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
            {!! Form::input('text', 'name_person_informed', $accident?->value['name_person_informed'], ['class' => 'form-control  ', 'placeholder' => 'name_person_informed']) !!}
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
              <input type="radio" name="accident_book_completed"  @if ($accident?->value['accident_book_completed'] == 'Yes') checked @endif
                    value="Yes" class="ml-3"> Yes
                <input type="radio" name="accident_book_completed"  @if ($accident?->value['accident_book_completed'] == 'No') checked @endif
                    value="No" class="ml-3"> No
           </div>
        </div>
    </div>

    <div class="col-xs-4">
        <div class="form-group form-float">
            <label class="form-label">Date Entered</label>
            <div class="form-line">
            {!! Form::date('date_entered', $accident?->value['date_entered'], ['class' => 'form-control', 'placeholder' => 'date entered']) !!}
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
            {!! Form::input('text','report_eference_no', $accident?->value['report_eference_no'], ['class' => 'form-control  ', 'placeholder' => 'Report Reference No']) !!}
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
          <input type="radio" name="riddor_reportable"  @if ($accident?->value['riddor_reportable'] == 'Yes') checked @endif
                    value="Yes" class="ml-3"> Yes
                <input type="radio" name="riddor_reportable"  @if ($accident?->value['riddor_reportable'] == 'No') checked @endif
                    value="No" class="ml-3"> No
           </div>
        </div>
    </div>

    <div class="col-xs-4">
        <div class="form-group form-float">
            <label class="form-label">Date Reported</label>
            <div class="form-line">
            {!! Form::date('date_reported', $accident?->value['date_reported'], ['class' => 'form-control', 'placeholder' => 'Date Reported']) !!}
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
            {!! Form::time('time_eported', $accident?->value['time_eported'], ['class' => 'form-control  ', 'placeholder' => 'Time Reported']) !!}
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
                    {!! Form::input('text', 'investigation_lead_name', $accident?->value['investigation_lead_name'], ['class' => 'form-control']) !!}
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
                    {!! Form::select('department_id', $departments, $accident?->value['department_id'], [
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
                    {!! Form::input('text', 'designation', $accident?->value['designation'], ['class' => 'form-control']) !!}
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
                    {!! Form::input('text', 'investigation_assistant_name', $accident?->value['investigation_assistant_name'], ['class' => 'form-control']) !!}
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
                    {!! Form::select('investigation_department_id', $departments, $accident?->value['investigation_department_id'], [
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
                    {!! Form::input('text', 'Investigation_designation', $accident?->value['Investigation_designation'], ['class' => 'form-control']) !!}
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
              <input type="radio" name="was_incident_witnessed"  @if ($accident?->value['was_incident_witnessed'] == 'Yes') checked @endif
                    value="Yes" class="ml-3"> Yes
                <input type="radio" name="was_incident_witnessed"  @if ($accident?->value['was_incident_witnessed'] == 'No') checked @endif
                    value="No" class="ml-3"> No
           </div>
        </div>
    </div>
    <div class="col-xs-4">
        <div class="form-group form-float">
            <label class="form-label">Are Witnesses Employees?</label>
            <div class="form-line">
                    <input type="hidden" name="are_witnesses_employees" value="null"> <!-- Hidden input with value null -->
            <input type="radio" name="are_witnesses_employees"  @if ($accident?->value['are_witnesses_employees'] == 'Yes') checked @endif
                    value="Yes" class="ml-3"> Yes
                <input type="radio" name="are_witnesses_employees"  @if ($accident?->value['are_witnesses_employees'] == 'No') checked @endif
                    value="No" class="ml-3"> No
           </div>
        </div>
    </div>
    <div class="col-xs-4">
        <div class="form-group form-float">
            <label class="form-label">Witnesses Statements Taken?</label>
            <div class="form-line">
                 <input type="hidden" name="witnesses_statements_taken" value="null"> <!-- Hidden input with value null -->
               <input type="radio" name="witnesses_statements_taken"  @if ($accident?->value['witnesses_statements_taken'] == 'Yes') checked @endif
                    value="Yes" class="ml-3"> Yes
                <input type="radio" name="witnesses_statements_taken"  @if ($accident?->value['witnesses_statements_taken'] == 'No') checked @endif
                    value="No" class="ml-3"> No
           </div>
        </div>
    </div>
    <div class="col-xs-6">
        <div class="form-group form-float">
            <label class="form-label">Witness Name:</label>
            <div class="form-line">
                {!! Form::input('text', 'witnesses_name_one', $accident?->value['witnesses_name_one'], ['class' => 'form-control  ', 'placeholder' => 'Witness Name']) !!}
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
                {!! Form::input('text', 'contact_phone_no_one', $accident?->value['contact_phone_no_one'], ['class' => 'form-control  ', 'placeholder' => 'Contact Phone No']) !!}
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
                {!! Form::input('text', 'witnesses_address_one', $accident?->value['witnesses_address_one'], ['class' => 'form-control  ', 'placeholder' => 'Address']) !!}
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
                {!! Form::input('text', 'witnesses_name_two', $accident?->value['witnesses_name_two'], ['class' => 'form-control  ', 'placeholder' => 'Witness Name']) !!}
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
                {!! Form::input('text', 'contact_phone_no_two', $accident?->value['contact_phone_no_two'], ['class' => 'form-control  ', 'placeholder' => 'Contact Phone No']) !!}
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
                {!! Form::input('text', 'witnesses_address_two', $accident?->value['witnesses_address_two'], ['class' => 'form-control  ', 'placeholder' => 'Address']) !!}
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
                {!! Form::input('text', 'witnesses_name_three', $accident?->value['witnesses_name_three'], ['class' => 'form-control  ', 'placeholder' => 'Witness Name']) !!}
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
                {!! Form::input('text', 'contact_phone_no_three', $accident?->value['contact_phone_no_three'], ['class' => 'form-control  ', 'placeholder' => 'Contact Phone No']) !!}
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
                {!! Form::input('text', 'witnesses_address_three', $accident?->value['witnesses_address_three'], ['class' => 'form-control  ', 'placeholder' => 'Address']) !!}
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
                {!! Form::textArea("details", $accident?->value['details'],['class'=>'form-control summernote','placeholder'=>'Details'])!!}
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
                <input type="radio" name="was_the_incident_work_related"  @if ($accident?->value['was_the_incident_work_related'] == 'Yes') checked @endif
                    value="Yes" class="ml-3"> Yes
                <input type="radio" name="was_the_incident_work_related"  @if ($accident?->value['was_the_incident_work_related'] == 'No') checked @endif
                    value="No" class="ml-3"> No
           </div>
        </div>
    </div>
    <div class="col-xs-6">
        <div class="form-group form-float">
            <label class="form-label">Was First Aid Administered at Location?</label>
            <div class="form-line">
                  <input type="hidden" name="was_first_aid_administered_at_location" value="null"> <!-- Hidden input with value null -->
              <input type="radio" name="was_first_aid_administered_at_location"  @if ($accident?->value['was_first_aid_administered_at_location'] == 'Yes') checked @endif
                    value="Yes" class="ml-3"> Yes
                <input type="radio" name="was_first_aid_administered_at_location"  @if ($accident?->value['was_first_aid_administered_at_location'] == 'No') checked @endif
                    value="No" class="ml-3"> No
           </div>
        </div>
    </div>
    <div class="col-xs-12">
        <div class="form-group form-float">
            <label class="form-label">Name of First Aider:</label>
            <div class="form-line">
                {!! Form::input('text', 'name_of_first_aider', $accident?->value['name_of_first_aider'], ['class' => 'form-control  ', 'placeholder' => 'Name of First Aider']) !!}
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
                {!! Form::input('text', 'details_of_injury', $accident?->value['details_of_injury'], ['class' => 'form-control  ', 'placeholder' => 'Details of Injury']) !!}
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
               <input type="radio" name="were_emergency_services_called"  @if ($accident?->value['were_emergency_services_called'] == 'Yes') checked @endif
                    value="Yes" class="ml-3"> Yes
                <input type="radio" name="were_emergency_services_called"  @if ($accident?->value['were_emergency_services_called'] == 'No') checked @endif
                    value="No" class="ml-3"> No
           </div>
        </div>
    </div>
    <div class="col-xs-6">
        <div class="form-group form-float">
            <label class="form-label">Was Person Involved Hospitalised?</label>
            <div class="form-line">
                 <input type="hidden" name="was_person_involved_hospitalised" value="null"> <!-- Hidden input with value null -->
               <input type="radio" name="was_person_involved_hospitalised"  @if ($accident?->value['was_person_involved_hospitalised'] == 'Yes') checked @endif
                    value="Yes" class="ml-3"> Yes
                <input type="radio" name="was_person_involved_hospitalised"  @if ($accident?->value['was_person_involved_hospitalised'] == 'No') checked @endif
                    value="No" class="ml-3"> No
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
               <input type="checkBox" name="Noise"  @if ($accident?->value['Noise'] == 'Yes') checked @endif
                    value="Yes" class="ml-3"> Noise
                </td>
                <td>
                    {!! Form::input('text', 'Noise_desc', $accident?->value['Noise_desc'], ['class' => 'form-control ']) !!}
                </td>
            </tr>
            <tr>
                <td>
                <input type="hidden" name="Lighting" value="null"> <!-- Hidden input with value null -->
               <input type="checkBox" name="Lighting"  @if ($accident?->value['Lighting'] == 'Yes') checked @endif
                    value="Yes" class="ml-3"> Lighting
                </td>
                <td>
                    {!! Form::input('text', 'Lighting_desc', $accident?->value['Lighting_desc'], ['class' => 'form-control  ']) !!}
                </td>
            </tr>
            <tr>
                <td>
                <input type="hidden" name="Dust_Fumes" value="null"> <!-- Hidden input with value null -->
                <input type="checkBox" name="Dust_Fumes"  @if ($accident?->value['Dust_Fumes'] == 'Yes') checked @endif
                    value="Yes" class="ml-3"> Dust / Fumes
                </td>
                <td>
                    {!! Form::input('text', 'Dust_Fumes_desc', $accident?->value['Dust_Fumes_desc'], ['class' => 'form-control  ']) !!}
                </td>
            </tr>
            <tr>
                <td>
                <input type="hidden" name="Slip_Trip_Hazard" value="null"> <!-- Hidden input with value null -->
                <input type="checkBox" name="Slip_Trip_Hazard"  @if ($accident?->value['Slip_Trip_Hazard'] == 'Yes') checked @endif
                    value="Yes" class="ml-3"> Slip / Trip Hazard
                </td>
                <td>
                    {!! Form::input('text', 'Slip_Trip_Hazard_desc', $accident?->value['Slip_Trip_Hazard_desc'], ['class' => 'form-control  ']) !!}
                </td>
            </tr>
            <tr>
                <td>
                 <input type="hidden" name="Layout_Design" value="null"> <!-- Hidden input with value null -->
               <input type="checkBox" name="Layout_Design"  @if ($accident?->value['Layout_Design'] == 'Yes') checked @endif
                    value="Yes" class="ml-3"> Layout / Design
                </td>
                <td>
                    {!! Form::input('text', 'Layout_Design_desc', $accident?->value['Layout_Design_desc'], ['class' => 'form-control  ']) !!}
                </td>
            </tr>
            <tr>
                <td>
                <input type="hidden" name="Vibration" value="null"> <!-- Hidden input with value null -->
                <input type="checkBox" name="Vibration"  @if ($accident?->value['Vibration'] == 'Yes') checked @endif
                    value="Yes" class="ml-3"> Vibration
                </td>
                <td>
                    {!! Form::input('text', 'Vibration_desc', $accident?->value['Vibration_desc'], ['class' => 'form-control  ']) !!}
                </td>
            </tr>
            <tr>
                <td>
                 <input type="hidden" name="Damaged_Unstable_Floor" value="null"> <!-- Hidden input with value null -->
               <input type="checkBox" name="Damaged_Unstable_Floor"  @if ($accident?->value['Damaged_Unstable_Floor'] == 'Yes') checked @endif
                    value="Yes" class="ml-3"> Damaged / Unstable Floor
                </td>
                <td>
                {!! Form::input('text', 'Damaged_Unstable_Floor_desc', $accident?->value['Damaged_Unstable_Floor_desc'], ['class' => 'form-control  ']) !!}
                </td>
            </tr>
            <tr>
                <td>
                 <input type="hidden" name="Weather" value="null"> <!-- Hidden input with value null -->
               <input type="checkBox" name="Weather"  @if ($accident?->value['Weather'] == 'Yes') checked @endif
                    value="Yes" class="ml-3"> Weather
                </td>
                <td>
                    {!! Form::input('text', 'Weather_desc', $accident?->value['Weather_desc'], ['class' => 'form-control  ']) !!}
                </td>
            </tr>
            <tr>
               <td class="checkbox-cell">
                  <input type="hidden" name="Other" value="null"> <!-- Hidden input with value null -->
              <input type="checkBox" name="Other"  @if ($accident?->value['Other'] == 'Yes') checked @endif
                    value="Yes" class="ml-3"> Other
                </td>
                <td>
                    {!! Form::input('text', 'Other_desc', $accident?->value['Other_desc'], ['class' => 'form-control  ']) !!}
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
              <input type="checkBox" name="Fatigue"  @if ($accident?->value['Fatigue'] == 'Yes') checked @endif
                    value="Yes" class="ml-3"> Fatigue
                </td>
                <td>
                {!! Form::input('text', 'Fatigue_desc', $accident?->value['Fatigue_desc'], ['class' => 'form-control  ']) !!}
                </td>
            </tr>
            <tr>
                <td>
                 <input type="hidden" name="Lack_of_Communication" value="null"> <!-- Hidden input with value null -->
               <input type="checkBox" name="Lack_of_Communication"  @if ($accident?->value['Lack_of_Communication'] == 'Yes') checked @endif
                    value="Yes" class="ml-3"> Lack of Communication
                </td>
                <td>
                    {!! Form::input('text', 'Lack_of_Communication_desc', $accident?->value['Lack_of_Communication_desc'], ['class' => 'form-control  ']) !!}
                </td>
            </tr>
            <tr>
                <td>
                  <input type="hidden" name="Distractions" value="null"> <!-- Hidden input with value null -->
              <input type="checkBox" name="Distractions"  @if ($accident?->value['Distractions'] == 'Yes') checked @endif
                    value="Yes" class="ml-3"> Distractions


                </td>
                <td>
                    {!! Form::input('text', 'Distractions_desc', $accident?->value['Distractions_desc'], ['class' => 'form-control  ']) !!}
                </td>
            </tr>
            <tr>
                <td>
                  <input type="hidden" name="Change_of_Routine" value="null"> <!-- Hidden input with value null -->
              <input type="checkBox" name="Change_of_Routine"  @if ($accident?->value['Change_of_Routine'] == 'Yes') checked @endif
                    value="Yes" class="ml-3">  Change of Routine


                </td>
                <td>
                    {!! Form::input('text', 'Change_of_Routine_desc', $accident?->value['Change_of_Routine_desc'], ['class' => 'form-control  ']) !!}
                </td>
            </tr>
            <tr>
                <td>
                    <input type="hidden" name="Time_Production_Pressure" value="null"> <!-- Hidden input with value null -->
                    <input type="checkBox" name="Time_Production_Pressure"  @if ($accident?->value['Time_Production_Pressure'] == 'Yes') checked @endif
                    value="Yes" class="ml-3"> Time / Production Pressure


                </td>
                <td>
                    {!! Form::input('text', 'Time_Production_Pressure_desc', $accident?->value['Time_Production_Pressure_desc'], ['class' => 'form-control  ']) !!}
                </td>
            </tr>
            <tr>
                <td>
                    <input type="hidden" name="Procedure_No_Followed" value="null"> <!-- Hidden input with value null -->
                    <input type="checkBox" name="Procedure_No_Followed"  @if ($accident?->value['Procedure_No_Followed'] == 'Yes') checked @endif
                    value="Yes" class="ml-3"> Procedure Not Followed
                </td>
                <td>
                    {!! Form::input('text', 'Procedure_No_Followed_desc', $accident?->value['Procedure_No_Followed_desc'], ['class' => 'form-control  ']) !!}
                </td>
            </tr>
            <tr>
                <td>
                    <input type="hidden" name="Drugs_or_Alcohol" value="null"> <!-- Hidden input with value null -->
                    <input type="checkBox" name="Drugs_or_Alcohol"  @if ($accident?->value['Drugs_or_Alcohol'] == 'Yes') checked @endif
                    value="Yes" class="ml-3"> Drugs or Alcohol
                </td>
                <td>
                    {!! Form::input('text', 'Drugs_or_Alcohol_desc', $accident?->value['Drugs_or_Alcohol_desc'], ['class' => 'form-control  ']) !!}
                </td>
            </tr>
            <tr>
               <td class="checkbox-cell">
                <input type="hidden" name="Attribute_Other" value="null"> <!-- Hidden input with value null -->
                <input type="checkBox" name="Attribute_Other"  @if ($accident?->value['Attribute_Other'] == 'Yes') checked @endif
                    value="Yes" class="ml-3"> Other
                </td>
                <td>
                    {!! Form::input('text', 'Attribute_Other_desc', $accident?->value['Attribute_Other_desc'], ['class' => 'form-control  ']) !!}
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
                    <input type="checkBox" name="No_Hazard_Identified"  @if ($accident?->value['No_Hazard_Identified'] == 'Yes') checked @endif
                    value="Yes" class="ml-3"> No Hazard Identified
                </td>
                <td>
                    {!! Form::input('text', 'No_Hazard_Identified_desc', $accident?->value['No_Hazard_Identified_desc'], ['class' => 'form-control  ']) !!}
                </td>
            </tr>
            <tr>
                <td>
                    <input type="hidden" name="Inadequate_Safe_Procedure" value="null"> <!-- Hidden input with value null -->
                    <input type="checkBox" name="Inadequate_Safe_Procedure"  @if ($accident?->value['Inadequate_Safe_Procedure'] == 'Yes') checked @endif
                    value="Yes" class="ml-3"> Inadequate Safe Procedure’s
                </td>
                <td>
                    {!! Form::input('text', 'Inadequate_Safe_Procedure_desc', $accident?->value['Inadequate_Safe_Procedure_desc'], ['class' => 'form-control  ']) !!}
                </td>
            </tr>
            <tr>
                <td>
                    <input type="hidden" name="Inadequate_Risk_Assessment" value="null"> <!-- Hidden input with value null -->
                    <input type="checkBox" name="Inadequate_Risk_Assessment"  @if ($accident?->value['Inadequate_Risk_Assessment'] == 'Yes') checked @endif
                    value="Yes" class="ml-3"> Inadequate Risk Assessment
                </td>
                <td>
                    {!! Form::input('text', 'Inadequate_Risk_Assessment_desc', $accident?->value['Inadequate_Risk_Assessment_desc'], ['class' => 'form-control  ']) !!}
                </td>
            </tr>
            <tr>
                <td>
                    <input type="hidden" name="Inadequate_Controls_in_Place" value="null"> <!-- Hidden input with value null -->
                    <input type="checkBox" name="Inadequate_Controls_in_Place"  @if ($accident?->value['Inadequate_Controls_in_Place'] == 'Yes') checked @endif
                    value="Yes" class="ml-3"> Inadequate Controls in Place
                </td>
                <td>
                    {!! Form::input('text', 'Inadequate_Controls_in_Place_desc', $accident?->value['Inadequate_Controls_in_Place_desc'], ['class' => 'form-control  ']) !!}
                </td>
            </tr>
            <tr>
                <td>
                    <input type="hidden" name="Inadequate_Training" value="null"> <!-- Hidden input with value null -->
                    <input type="checkBox" name="Inadequate_Training"  @if ($accident?->value['Inadequate_Training'] == 'Yes') checked @endif
                    value="Yes" class="ml-3"> Inadequate Training


                </td>
                <td>
                    {!! Form::input('text', 'Inadequate_Training_desc', $accident?->value['Inadequate_Training_desc'], ['class' => 'form-control  ']) !!}
                </td>
            </tr>
            <tr>
                <td>
                    <input type="hidden" name="Lack_of_Supervision" value="null"> <!-- Hidden input with value null -->
                    <input type="checkBox" name="Lack_of_Supervision"  @if ($accident?->value['Lack_of_Supervision'] == 'Yes') checked @endif
                    value="Yes" class="ml-3"> Lack of Supervision


                </td>
                <td>
                    {!! Form::input('text', 'Lack_of_Supervision_desc', $accident?->value['Lack_of_Supervision_desc'], ['class' => 'form-control  ']) !!}
                </td>
            </tr>
            <tr>
                <td class="checkbox-cell">
                    <input type="hidden" name="Attribute_two_Other" value="null"> <!-- Hidden input with value null -->
                    <input type="checkBox" name="Attribute_two_Other"  @if ($accident?->value['Attribute_two_Other'] == 'Yes') checked @endif
                    value="Yes" class="ml-3"> Other
                    </td>
                    <td>
                        {!! Form::input('text', 'Attribute_two_Other_desc', $accident?->value['Attribute_two_Other_desc'], ['class' => 'form-control  ']) !!}
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
                    <input type="checkBox" name="Incorrect_Equipment"  @if ($accident?->value['Incorrect_Equipment'] == 'Yes') checked @endif
                    value="Yes" class="ml-3"> Incorrect Equipment


                </td>
                <td>
                    {!! Form::input('text', 'Incorrect_Equipment_desc', $accident?->value['Incorrect_Equipment_desc'], ['class' => 'form-control  ']) !!}
                </td>
            </tr>
            <tr>
                <td>
                    <input type="hidden" name="Equipment_Failure" value="null"> <!-- Hidden input with value null -->
                    <input type="checkBox" name="Equipment_Failure"  @if ($accident?->value['Equipment_Failure'] == 'Yes') checked @endif
                    value="Yes" class="ml-3"> Equipment Failure
                </td>
                <td>
                {!! Form::input('text', 'Equipment_Failure_desc', $accident?->value['Equipment_Failure_desc'], ['class' => 'form-control  ']) !!}
                </td>
            </tr>
            <tr>
                <td>
                    <input type="hidden" name="Inadequate_Maintenance" value="null"> <!-- Hidden input with value null -->
                    <input type="checkBox" name="Inadequate_Maintenance"  @if ($accident?->value['Inadequate_Maintenance'] == 'Yes') checked @endif
                    value="Yes" class="ml-3">  Inadequate Maintenance
                </td>
                <td>
                    {!! Form::input('text', 'Inadequate_Maintenance_desc', $accident?->value['Inadequate_Maintenance_desc'], ['class' => 'form-control  ']) !!}
                </td>
            </tr>
            <tr>
                <td>
                    <input type="hidden" name="Heavy_or_Awkward" value="null"> <!-- Hidden input with value null -->
                    <input type="checkBox" name="Heavy_or_Awkward"  @if ($accident?->value['Heavy_or_Awkward'] == 'Yes') checked @endif
                    value="Yes" class="ml-3"> Heavy or Awkward
                </td>
                <td>
                    {!! Form::input('text', 'Heavy_or_Awkward_desc', $accident?->value['Heavy_or_Awkward_desc'], ['class' => 'form-control  ']) !!}
                </td>
            </tr>
            <tr>
                <td>
                    <input type="hidden" name="Inadequate_Training_two" value="null"> <!-- Hidden input with value null -->
                    <input type="checkBox" name="Inadequate_Training_two"  @if ($accident?->value['Inadequate_Training_two'] == 'Yes') checked @endif
                    value="Yes" class="ml-3"> Inadequate Training


                </td>
                <td>
                    {!! Form::input('text', 'Inadequate_Training_two_desc', $accident?->value['Inadequate_Training_two_desc'], ['class' => 'form-control  ']) !!}
                </td>
            </tr>
            <tr>
                <td>
                    <input type="hidden" name="Inadequate_Guarding" value="null"> <!-- Hidden input with value null -->
                    <input type="checkBox" name="Inadequate_Guarding"  @if ($accident?->value['Inadequate_Guarding'] == 'Yes') checked @endif
                    value="Yes" class="ml-3"> Inadequate Guarding

                </td>
                <td>
                    {!! Form::input('text', 'Inadequate_Guarding_desc', $accident?->value['Inadequate_Guarding_desc'], ['class' => 'form-control  ']) !!}
                </td>
            </tr>
            <tr>
               <td class="checkbox-cell">
                <input type="hidden" name="Other_four" value="null"> <!-- Hidden input with value null -->
                <input type="checkBox" name="Other_four"  @if ($accident?->value['Other_four'] == 'Yes') checked @endif
                    value="Yes" class="ml-3"> Other
                </td>
                <td>
                    {!! Form::input('text', 'Other_four_desc', $accident?->value['Other_four_desc'], ['class' => 'form-control  ']) !!}
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
                {!! Form::input('text', 'Contributing1', $accident?->value['Contributing1'], ['class' => 'form-control  ']) !!}
            </td>
            <td>
                {!! Form::input('text', 'Corrective_Actions1', $accident?->value['Corrective_Actions1'], ['class' => 'form-control  ']) !!}
            </td>
            <td>
                {!! Form::input('text', 'Completed_by_Name1', $accident?->value['Completed_by_Name1'], ['class' => 'form-control']) !!}
            </td>
            <td>
                {!! Form::date('Date_to_be_Completed1', $accident?->value['Date_to_be_Completed1'], ['class' => 'form-control  ']) !!}
            </td>
            <td>
                {!! Form::input('text', 'Further_Actions1', $accident?->value['Further_Actions1'], ['class' => 'form-control ']) !!}
            </td>
            </tr>
            <tr>
                <td>
                {!! Form::input('text', 'Contributing2', $accident?->value['Contributing2'], ['class' => 'form-control  ']) !!}
            </td>
            <td>
                {!! Form::input('text', 'Corrective_Actions2', $accident?->value['Corrective_Actions2'], ['class' => 'form-control  ']) !!}
            </td>
            <td>
                {!! Form::input('text', 'Completed_by_Name2', $accident?->value['Completed_by_Name2'], ['class' => 'form-control']) !!}
            </td>
            <td>
                {!! Form::date('Date_to_be_Completed2', $accident?->value['Date_to_be_Completed2'], ['class' => 'form-control  ']) !!}
            </td>
            <td>
                {!! Form::input('text', 'Further_Actions2', $accident?->value['Further_Actions2'], ['class' => 'form-control ']) !!}
            </td>
            </tr>
            <tr>
                <td>
                {!! Form::input('text', 'Contributing3', $accident?->value['Contributing3'], ['class' => 'form-control  ']) !!}
            </td>
            <td>
                {!! Form::input('text', 'Corrective_Actions3', $accident?->value['Corrective_Actions3'], ['class' => 'form-control  ']) !!}
            </td>
            <td>
                {!! Form::input('text', 'Completed_by_Name3', $accident?->value['Completed_by_Name3'], ['class' => 'form-control']) !!}
            </td>
            <td>
                {!! Form::date('Date_to_be_Completed3', $accident?->value['Date_to_be_Completed3'], ['class' => 'form-control  ']) !!}
            </td>
            <td>
                {!! Form::input('text', 'Further_Actions3', $accident?->value['Further_Actions3'], ['class' => 'form-control ']) !!}
            </td>
            </tr>
            <tr>
                <td>
                {!! Form::input('text', 'Contributing4', $accident?->value['Contributing4'], ['class' => 'form-control  ']) !!}
            </td>
            <td>
                {!! Form::input('text', 'Corrective_Actions4', $accident?->value['Corrective_Actions4'], ['class' => 'form-control  ']) !!}
            </td>
            <td>
                {!! Form::input('text', 'Completed_by_Name4', $accident?->value['Completed_by_Name4'], ['class' => 'form-control']) !!}
            </td>
            <td>
                {!! Form::date('Date_to_be_Completed4', $accident?->value['Date_to_be_Completed4'], ['class' => 'form-control  ']) !!}
            </td>
            <td>
                {!! Form::input('text', 'Further_Actions4', $accident?->value['Further_Actions4'], ['class' => 'form-control ']) !!}
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
                {!! Form::textArea("Further_Information", $accident?->value['Further_Information'],['class'=>'form-control summernote','placeholder'=>'Description'])!!}

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
                {!! Form::input('text', 'Report_Completed_By', $accident?->value['Report_Completed_By'], ['class' => 'form-control  ']) !!}
            </td>
            <td class="bold">
            Date Completed:
            </td>
            <td>
                {!! Form::date('Date_Completed', $accident?->value['Date_Completed'], ['class' => 'form-control  ']) !!}
            </td>
            </tr>
            <tr>
            <td class="bold">
            Signature: </td>
            <td>
                {!! Form::input('text', 'Signature', $accident?->value['Signature'], ['class' => 'form-control  ']) !!}
            </td>
            <td class="bold">
            Position:
             </td>
            <td>
                {!! Form::input('text', 'Position', $accident?->value['Position'], ['class' => 'form-control  ', 'placeholder' => 'location']) !!}
            </td>
            </tr>
        </tbody>
    </table>
    </div>

    <div class="col-xs-12 aligne-center contentbtn">
        <button class="btn btn-primary waves-effect" type="submit">Save</button>
    </div>
</div>
