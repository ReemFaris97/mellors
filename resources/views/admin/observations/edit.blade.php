@extends('admin.layout.app')

@section('title','Resolve Ride Issue')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card-box">
                <h4 class="header-title m-t-0 m-b-30">Resolve Ride Issue </h4>
                
                            {!!Form::model($observation , ['route' => ['admin.observations.update' , $observation->id] ,
                             'method' => 'PATCH','enctype'=>"multipart/form-data",'files' => true,'id'=>'form']) !!}
                            @include('admin.observations.form')
                            {!!Form::close() !!}
            </div>
        </div><!-- end col -->
    </div>
    <!-- end row -->
@endsection
@push('scripts')
    {!! JsValidator::formRequest(\App\Http\Requests\Dashboard\Observation\ObservationRequest::class, '#form'); !!}
@endpush
