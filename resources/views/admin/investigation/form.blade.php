<div class="row">
        <h4 style="text-align:center">
            <strong>Incident Details</strong>
        </h4>
        <div class="col-xs-4">
            <div class="form-group form-float">
                <label class="form-label">Name of Person Involved:</label>
                <div class="form-line">
                    {!! Form::input('text', 'name', null, ['class' => 'form-control']) !!}
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
                <label class="form-label">Incident Date:</label>
                <div class="form-line">
                    {!! Form::input('text', 'position', null, ['class' => 'form-control']) !!}
                    @error('position')
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
                    {!! Form::input('text', 'address', null, ['class' => 'form-control']) !!}
                    @error('address')
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
                <input type="radio" name="type_of_event" value="Yes" class="ml-3"> Yes
                <input type="radio" name="type_of_event" value="No" class="ml-3"> No
           </div>
        </div>
    </div>
    <div class="col-xs-3">
        <div class="form-group form-float">
            <label class="form-label">Contractor</label>
            <div class="form-line">
                <input type="radio" name="type_of_event" value="Yes" class="ml-3"> Yes
                <input type="radio" name="type_of_event" value="No" class="ml-3"> No
           </div>
        </div>
    </div>
    <div class="col-xs-3">
        <div class="form-group form-float">
            <label class="form-label">Customer</label>
            <div class="form-line">
                <input type="radio" name="type_of_event" value="Yes" class="ml-3"> Yes
                <input type="radio" name="type_of_event" value="No" class="ml-3"> No
           </div>
        </div>
    </div>
    <div class="col-xs-3">
        <div class="form-group form-float">
            <label class="form-label">Pedestrian</label>
            <div class="form-line">
                <input type="radio" name="type_of_event" value="Yes" class="ml-3"> Yes
                <input type="radio" name="type_of_event" value="No" class="ml-3"> No
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
                {!! Form::input('text', 'location', null, ['class' => 'form-control  ', 'placeholder' => 'location']) !!}
                @error('location')
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
                <input type="radio" name="type_of_event" value="Yes" class="ml-3"> Yes
                <input type="radio" name="type_of_event" value="No" class="ml-3"> No
           </div>
        </div>
    </div>

    <div class="col-xs-4">
        <div class="form-group form-float">
            <label class="form-label">Date</label>
            <div class="form-line">
            {!! Form::date('date', null, ['class' => 'form-control', 'placeholder' => 'Start Time']) !!}
                @error('location')
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
            {!! Form::input('text', 'location', null, ['class' => 'form-control  ', 'placeholder' => 'location']) !!}
                @error('location')
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
                <input type="radio" name="type_of_event" value="Yes" class="ml-3"> Yes
                <input type="radio" name="type_of_event" value="No" class="ml-3"> No
           </div>
        </div>
    </div>

    <div class="col-xs-4">
        <div class="form-group form-float">
            <label class="form-label">Date Entered</label>
            <div class="form-line">
            {!! Form::date('date', null, ['class' => 'form-control', 'placeholder' => 'Start Time']) !!}
                @error('location')
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
            {!! Form::input('text', 'location', null, ['class' => 'form-control  ', 'placeholder' => 'location']) !!}
                @error('location')
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
                <input type="radio" name="type_of_event" value="Yes" class="ml-3"> Yes
                <input type="radio" name="type_of_event" value="No" class="ml-3"> No
           </div>
        </div>
    </div>

    <div class="col-xs-4">
        <div class="form-group form-float">
            <label class="form-label">Date Reported</label>
            <div class="form-line">
            {!! Form::date('date', null, ['class' => 'form-control', 'placeholder' => 'Start Time']) !!}
                @error('location')
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
            {!! Form::input('text', 'location', null, ['class' => 'form-control  ', 'placeholder' => 'location']) !!}
                @error('location')
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
                    {!! Form::input('text', 'name', null, ['class' => 'form-control']) !!}
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
                <label class="form-label">Department:</label>
                <div class="form-line">
                    {!! Form::input('text', 'position', null, ['class' => 'form-control']) !!}
                    @error('position')
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
                    {!! Form::input('text', 'address', null, ['class' => 'form-control']) !!}
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
                <label class="form-label">Investigation Assistant  Name:</label>
                <div class="form-line">
                    {!! Form::input('text', 'name', null, ['class' => 'form-control']) !!}
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
                <label class="form-label">Department:</label>
                <div class="form-line">
                    {!! Form::input('text', 'position', null, ['class' => 'form-control']) !!}
                    @error('position')
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
                    {!! Form::input('text', 'address', null, ['class' => 'form-control']) !!}
                    @error('address')
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
                <input type="radio" name="type_of_event" value="Yes" class="ml-3"> Yes
                <input type="radio" name="type_of_event" value="No" class="ml-3"> No
           </div>
        </div>
    </div>
    <div class="col-xs-4">
        <div class="form-group form-float">
            <label class="form-label">Are Witnesses Employees?</label>
            <div class="form-line">
                <input type="radio" name="type_of_event" value="Yes" class="ml-3"> Yes
                <input type="radio" name="type_of_event" value="No" class="ml-3"> No
           </div>
        </div>
    </div>
    <div class="col-xs-4">
        <div class="form-group form-float">
            <label class="form-label">Witnesses Statements Taken?</label>
            <div class="form-line">
                <input type="radio" name="type_of_event" value="Yes" class="ml-3"> Yes
                <input type="radio" name="type_of_event" value="No" class="ml-3"> No
           </div>
        </div>
    </div>
    <div class="col-xs-6">
        <div class="form-group form-float">
            <label class="form-label">Witness Name:</label>
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

    <div class="col-xs-6">
        <div class="form-group form-float">
            <label class="form-label">Contact Phone No:</label>
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
            <label class="form-label">Address:</label>
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

    <div class="col-xs-6">
        <div class="form-group form-float">
            <label class="form-label">Witness Name:</label>
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

    <div class="col-xs-6">
        <div class="form-group form-float">
            <label class="form-label">Contact Phone No:</label>
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
            <label class="form-label">Address:</label>
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
    <div class="col-xs-6">
        <div class="form-group form-float">
            <label class="form-label">Witness Name:</label>
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

    <div class="col-xs-6">
        <div class="form-group form-float">
            <label class="form-label">Contact Phone No:</label>
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
            <label class="form-label">Address:</label>
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
        <h4 style="text-align:center">
            <strong>Details of What Lead to the Incident (in brief)</strong>
        </h4>
        <div class="col-xs-12">
        <div class="form-group form-float">
            <div class="form-line">
                {!! Form::textArea("details",null,['class'=>'form-control summernote','placeholder'=>'Description'])!!}
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
                <input type="radio" name="type_of_event" value="Yes" class="ml-3"> Yes
                <input type="radio" name="type_of_event" value="No" class="ml-3"> No
           </div>
        </div>
    </div>
    <div class="col-xs-6">
        <div class="form-group form-float">
            <label class="form-label">Was First Aid Administered at Location?</label>
            <div class="form-line">
                <input type="radio" name="type_of_event" value="Yes" class="ml-3"> Yes
                <input type="radio" name="type_of_event" value="No" class="ml-3"> No
           </div>
        </div>
    </div>
    <div class="col-xs-12">
        <div class="form-group form-float">
            <label class="form-label">Name of First Aider:</label>
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
            <label class="form-label">Details of Injury:</label>
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
  
    <div class="col-xs-6">
        <div class="form-group form-float">
            <label class="form-label">Were Emergency Services Called?</label>
            <div class="form-line">
                <input type="radio" name="type_of_event" value="Yes" class="ml-3"> Yes
                <input type="radio" name="type_of_event" value="No" class="ml-3"> No
           </div>
        </div>
    </div>
    <div class="col-xs-6">
        <div class="form-group form-float">
            <label class="form-label">Was Person Involved Hospitalised?</label>
            <div class="form-line">
                <input type="radio" name="type_of_event" value="Yes" class="ml-3"> Yes
                <input type="radio" name="type_of_event" value="No" class="ml-3"> No
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
                <input type="checkBox" name="type_of_event" value="Yes" class="ml-3"> Noise
                </td>
                <td>
                {!! Form::input('text', 'location', null, ['class' => 'form-control  ', 'placeholder' => 'location']) !!}
                </td>
            </tr>
            <tr>
                <td>
                <input type="checkBox" name="type_of_event" value="Yes" class="ml-3"> Lighting
                </td>
                <td>
                {!! Form::input('text', 'location', null, ['class' => 'form-control  ', 'placeholder' => 'location']) !!}
                </td>
            </tr>
            <tr>
                <td>
                <input type="checkBox" name="type_of_event" value="Yes" class="ml-3"> Dust / Fumes
                </td>
                <td>
                {!! Form::input('text', 'location', null, ['class' => 'form-control  ', 'placeholder' => 'location']) !!}
                </td>
            </tr>
            <tr>
                <td>
                <input type="checkBox" name="type_of_event" value="Yes" class="ml-3"> Slip / Trip Hazard
                </td>
                <td>
                {!! Form::input('text', 'location', null, ['class' => 'form-control  ', 'placeholder' => 'location']) !!}
                </td>
            </tr>
            <tr>
                <td>
                <input type="checkBox" name="type_of_event" value="Yes" class="ml-3"> Layout / Design
                </td>
                <td>
                {!! Form::input('text', 'location', null, ['class' => 'form-control  ', 'placeholder' => 'location']) !!}
                </td>
            </tr>
            <tr>
                <td>
                <input type="checkBox" name="type_of_event" value="Yes" class="ml-3"> Vibration
                </td>
                <td>
                {!! Form::input('text', 'location', null, ['class' => 'form-control  ', 'placeholder' => 'location']) !!}
                </td>
            </tr>
            <tr>
                <td>
                <input type="checkBox" name="type_of_event" value="Yes" class="ml-3"> Damaged / Unstable Floor
                </td>
                <td>
                {!! Form::input('text', 'location', null, ['class' => 'form-control  ', 'placeholder' => 'location']) !!}
                </td>
            </tr>
            <tr>
                <td>
                <input type="checkBox" name="type_of_event" value="Yes" class="ml-3"> Weather
                </td>
                <td>
                {!! Form::input('text', 'location', null, ['class' => 'form-control  ', 'placeholder' => 'location']) !!}
                </td>
            </tr>
            <tr>
               <td class="checkbox-cell">
                <input type="checkBox" name="type_of_event" value="Yes" class="ml-3"> Other
                </td>
                <td>
                {!! Form::input('text', 'location', null, ['class' => 'form-control  ', 'placeholder' => 'location']) !!}
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
            <th>Hazard</th>
            <th>Details (in brief)</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>
                <input type="checkBox" name="type_of_event" value="Yes" class="ml-3"> Fatigue
                </td>
                <td>
                {!! Form::input('text', 'location', null, ['class' => 'form-control  ', 'placeholder' => 'location']) !!}
                </td>
            </tr>
            <tr>
                <td>
                <input type="checkBox" name="type_of_event" value="Yes" class="ml-3"> Lack of Communication
                </td>
                <td>
                {!! Form::input('text', 'location', null, ['class' => 'form-control  ', 'placeholder' => 'location']) !!}
                </td>
            </tr>
            <tr>
                <td>
                <input type="checkBox" name="type_of_event" value="Yes" class="ml-3"> Distractions


                </td>
                <td>
                {!! Form::input('text', 'location', null, ['class' => 'form-control  ', 'placeholder' => 'location']) !!}
                </td>
            </tr>
            <tr>
                <td>
                <input type="checkBox" name="type_of_event" value="Yes" class="ml-3">  Change of Routine


                </td>
                <td>
                {!! Form::input('text', 'location', null, ['class' => 'form-control  ', 'placeholder' => 'location']) !!}
                </td>
            </tr>
            <tr>
                <td>
                <input type="checkBox" name="type_of_event" value="Yes" class="ml-3"> Time / Production Pressure


                </td>
                <td>
                {!! Form::input('text', 'location', null, ['class' => 'form-control  ', 'placeholder' => 'location']) !!}
                </td>
            </tr>
            <tr>
                <td>
                <input type="checkBox" name="type_of_event" value="Yes" class="ml-3"> Procedure Not Followed
                </td>
                <td>
                {!! Form::input('text', 'location', null, ['class' => 'form-control  ', 'placeholder' => 'location']) !!}
                </td>
            </tr>
            <tr>
                <td>
                <input type="checkBox" name="type_of_event" value="Yes" class="ml-3"> Drugs or Alcohol
                </td>
                <td>
                {!! Form::input('text', 'location', null, ['class' => 'form-control  ', 'placeholder' => 'location']) !!}
                </td>
            </tr>
            <tr>
               <td class="checkbox-cell">
                <input type="checkBox" name="type_of_event" value="Yes" class="ml-3"> Other
                </td>
                <td>
                {!! Form::input('text', 'location', null, ['class' => 'form-control  ', 'placeholder' => 'location']) !!}
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
                <input type="checkBox" name="type_of_event" value="Yes" class="ml-3"> No Hazard Identified


                </td>
                <td>
                {!! Form::input('text', 'location', null, ['class' => 'form-control  ', 'placeholder' => 'location']) !!}
                </td>
            </tr>
            <tr>
                <td>
                <input type="checkBox" name="type_of_event" value="Yes" class="ml-3"> Inadequate Safe Procedure’s
                </td>
                <td>
                {!! Form::input('text', 'location', null, ['class' => 'form-control  ', 'placeholder' => 'location']) !!}
                </td>
            </tr>
            <tr>
                <td>
                <input type="checkBox" name="type_of_event" value="Yes" class="ml-3"> Inadequate Risk Assessment
                </td>
                <td>
                {!! Form::input('text', 'location', null, ['class' => 'form-control  ', 'placeholder' => 'location']) !!}
                </td>
            </tr>
            <tr>
                <td>
                <input type="checkBox" name="type_of_event" value="Yes" class="ml-3"> Inadequate Controls in Place
                </td>
                <td>
                {!! Form::input('text', 'location', null, ['class' => 'form-control  ', 'placeholder' => 'location']) !!}
                </td>
            </tr>
            <tr>
                <td>
                <input type="checkBox" name="type_of_event" value="Yes" class="ml-3"> Inadequate Training


                </td>
                <td>
                {!! Form::input('text', 'location', null, ['class' => 'form-control  ', 'placeholder' => 'location']) !!}
                </td>
            </tr>
            <tr>
                <td>
                <input type="checkBox" name="type_of_event" value="Yes" class="ml-3"> Lack of Supervision


                </td>
                <td>
                {!! Form::input('text', 'location', null, ['class' => 'form-control  ', 'placeholder' => 'location']) !!}
                </td>
            </tr>
            <tr>
               <td class="checkbox-cell">
                <input type="checkBox" name="type_of_event" value="Yes" class="ml-3"> Other
                </td>
                <td>
                {!! Form::input('text', 'location', null, ['class' => 'form-control  ', 'placeholder' => 'location']) !!}
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
                <input type="checkBox" name="type_of_event" value="Yes" class="ml-3"> Incorrect Equipment


                </td>
                <td>
                {!! Form::input('text', 'location', null, ['class' => 'form-control  ', 'placeholder' => 'location']) !!}
                </td>
            </tr>
            <tr>
                <td>
                <input type="checkBox" name="type_of_event" value="Yes" class="ml-3"> Equipment Failure
                </td>
                <td>
                {!! Form::input('text', 'location', null, ['class' => 'form-control  ', 'placeholder' => 'location']) !!}
                </td>
            </tr>
            <tr>
                <td>
                <input type="checkBox" name="type_of_event" value="Yes" class="ml-3">  Inadequate Maintenance
                </td>
                <td>
                {!! Form::input('text', 'location', null, ['class' => 'form-control  ', 'placeholder' => 'location']) !!}
                </td>
            </tr>
            <tr>
                <td>
                <input type="checkBox" name="type_of_event" value="Yes" class="ml-3"> Heavy or Awkward
                </td>
                <td>
                {!! Form::input('text', 'location', null, ['class' => 'form-control  ', 'placeholder' => 'location']) !!}
                </td>
            </tr>
            <tr>
                <td>
                <input type="checkBox" name="type_of_event" value="Yes" class="ml-3"> Inadequate Training


                </td>
                <td>
                {!! Form::input('text', 'location', null, ['class' => 'form-control  ', 'placeholder' => 'location']) !!}
                </td>
            </tr>
            <tr>
                <td>
                <input type="checkBox" name="type_of_event" value="Yes" class="ml-3"> Inadequate Guarding


                </td>
                <td>
                {!! Form::input('text', 'location', null, ['class' => 'form-control  ', 'placeholder' => 'location']) !!}
                </td>
            </tr>
            <tr>
               <td class="checkbox-cell">
                <input type="checkBox" name="type_of_event" value="Yes" class="ml-3"> Other
                </td>
                <td>
                {!! Form::input('text', 'location', null, ['class' => 'form-control  ', 'placeholder' => 'location']) !!}
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
                {!! Form::input('text', 'location', null, ['class' => 'form-control  ', 'placeholder' => 'location']) !!}
            </td>
            <td>
                {!! Form::input('text', 'location', null, ['class' => 'form-control  ', 'placeholder' => 'location']) !!}
            </td>
            <td>
                {!! Form::input('text', 'location', null, ['class' => 'form-control  ', 'placeholder' => 'location']) !!}
            </td>
            <td>
                {!! Form::input('text', 'location', null, ['class' => 'form-control  ', 'placeholder' => 'location']) !!}
            </td>
            <td>
                {!! Form::input('text', 'location', null, ['class' => 'form-control  ', 'placeholder' => 'location']) !!}
            </td>
            </tr>
            <tr>
                <td>
                {!! Form::input('text', 'location', null, ['class' => 'form-control  ', 'placeholder' => 'location']) !!}
            </td>
            <td>
                {!! Form::input('text', 'location', null, ['class' => 'form-control  ', 'placeholder' => 'location']) !!}
            </td>
            <td>
                {!! Form::input('text', 'location', null, ['class' => 'form-control  ', 'placeholder' => 'location']) !!}
            </td>
            <td>
                {!! Form::input('text', 'location', null, ['class' => 'form-control  ', 'placeholder' => 'location']) !!}
            </td>
            <td>
                {!! Form::input('text', 'location', null, ['class' => 'form-control  ', 'placeholder' => 'location']) !!}
            </td>
            </tr>
           
            <tr>
                <td>
                {!! Form::input('text', 'location', null, ['class' => 'form-control  ', 'placeholder' => 'location']) !!}
            </td>
            <td>
                {!! Form::input('text', 'location', null, ['class' => 'form-control  ', 'placeholder' => 'location']) !!}
            </td>
            <td>
                {!! Form::input('text', 'location', null, ['class' => 'form-control  ', 'placeholder' => 'location']) !!}
            </td>
            <td>
                {!! Form::input('text', 'location', null, ['class' => 'form-control  ', 'placeholder' => 'location']) !!}
            </td>
            <td>
                {!! Form::input('text', 'location', null, ['class' => 'form-control  ', 'placeholder' => 'location']) !!}
            </td>
            </tr>
           
            <tr>
                <td>
                {!! Form::input('text', 'location', null, ['class' => 'form-control  ', 'placeholder' => 'location']) !!}
            </td>
            <td>
                {!! Form::input('text', 'location', null, ['class' => 'form-control  ', 'placeholder' => 'location']) !!}
            </td>
            <td>
                {!! Form::input('text', 'location', null, ['class' => 'form-control  ', 'placeholder' => 'location']) !!}
            </td>
            <td>
                {!! Form::input('text', 'location', null, ['class' => 'form-control  ', 'placeholder' => 'location']) !!}
            </td>
            <td>
                {!! Form::input('text', 'location', null, ['class' => 'form-control  ', 'placeholder' => 'location']) !!}
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
                {!! Form::textArea("details",null,['class'=>'form-control summernote','placeholder'=>'Description'])!!}

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
                {!! Form::input('text', 'location', null, ['class' => 'form-control  ', 'placeholder' => 'location']) !!}
            </td>
            <td class="bold"> 
            Date Completed:
            </td>
            <td>
                {!! Form::input('text', 'location', null, ['class' => 'form-control  ', 'placeholder' => 'location']) !!}
            </td>
            </tr>
            <tr>
            <td class="bold"> 
            Signature: </td>
            <td>
                {!! Form::input('text', 'location', null, ['class' => 'form-control  ', 'placeholder' => 'location']) !!}
            </td>
            <td class="bold"> 
            Position:
             </td>
            <td>
                {!! Form::input('text', 'location', null, ['class' => 'form-control  ', 'placeholder' => 'location']) !!}
            </td>
            </tr>
        </tbody>
    </table>
    </div>

    <div class="col-xs-12 aligne-center contentbtn">
        <button class="btn btn-primary waves-effect" type="submit">Save</button>
    </div>
</div>
