@extends('admin.layout.app')

@section('title','Resolve Ride Issue')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card-box">
                <h4 class="header-title m-t-0 m-b-30">Resolve Ride Issue </h4>
                
                            {!!Form::model($observation , ['route' => ['admin.observations.update' , $observation->id] ,
                             'method' => 'PATCH','enctype'=>"multipart/form-data",'files' => true,'id'=>'form']) !!}
                            <div class="col-xs-12">
                            <div class="form-group form-float">
                                <label class="form-label">Ride Name</label>
                                <div class="form-line">
                                    {!! Form::text("",$observation->ride->name,['class'=>'form-control','readonly'])!!}
                                </div>
                            </div>
                            </div>
                            @include('admin.observations.form')
                            <div class="col-xs-12">
                            <div class="form-group form-float">
                                <label class="form-label"> Date Resolved</label>
                                <div class="form-line">
                                    {!! Form::date('date_resolved', \Carbon\Carbon::now()->toDateString(), ['class' => 'form-control']) !!}
                                    @error('date_resolved')
                                    <div class="invalid-feedback" style="color: #ef1010">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12">
                            <div class="form-group form-float">
                                <label class="form-label">Maintenance Feed Back</label>
                                <div class="form-line">
                                    {!! Form::textArea("maintenance_feedback",null,['class'=>'form-control','placeholder'=>' Maintenance Feed Back'])!!}
                                    @error('maintenance_feedback')
                                    <div class="invalid-feedback" style="color: #ef1010">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            </div>
                            <div class="col-xs-12">
                            <div class="form-group form-float">
                                <label class="form-label">RF Number</label>
                                <div class="form-line">
                                    {!! Form::number("rf_number",null,['class'=>'form-control'])!!}
                                    @error('rf_number')
                                    <div class="invalid-feedback" style="color: #ef1010">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            </div>
                            <div class="col-xs-12">
                            <div class="form-group form-float">
                                <label class="form-label">Reported On Tech Sheet</label>
                                <div class="form-line">
                                {!! Form::select('reported_on_tech_sheet', ['yes' => 'Yes', 'no' => 'No'], null, ['class' => 'form-control']) !!}
                                    @error('reported_on_tech_sheet')
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
                            {!!Form::close() !!}
            </div>
        </div><!-- end col -->
    </div>
    <!-- end row -->
@endsection
@push('scripts')
    {!! JsValidator::formRequest(\App\Http\Requests\Dashboard\Observation\ObservationRequest::class, '#form'); !!}
@endpush
