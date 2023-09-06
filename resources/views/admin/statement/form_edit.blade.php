<div class="row">
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
            <label class="form-label">Date Of Accident</label>
            <div class="form-line">
                {!! Form::date('date', date('Y-m-d', strtotime($accident->date)), ['class' => 'form-control', 'placeholder' => 'Start Time']) !!}
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
                {!! Form::datetimeLocal('witness_statement', $accident->value['witness_statement'], ['class' => 'form-control', 'placeholder' => 'Start Time']) !!}
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
                {!! Form::time('time', $accident->value['time'], ['class' => 'form-control', 'placeholder' => 'Start Time']) !!}
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
                {!! Form::input('text', 'witness_name', $accident->value['witness_name'], [
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
                {!! Form::input('number', 'witness_phone', $accident->value['witness_phone'], [
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
                {!! Form::input('text', 'witness_position', $accident->value['witness_position'], [
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
                {!! Form::textArea('statement', $accident->value['statement'], ['class' => 'form-control summernote', 'placeholder' => 'Description']) !!}
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
