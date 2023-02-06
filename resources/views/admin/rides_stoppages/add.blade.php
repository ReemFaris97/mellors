@extends('admin.layout.app')

@section('title')
  Add Stoppage Operation
@endsection

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card-box">
                <h4 class="header-title m-t-0 m-b-30">  Add Stoppage Operation</h4>
                        {!!Form::open( ['route' => 'admin.uploadStoppagesExcleFile' ,'class'=>'form phone_validate', 'method' => 'Post', 'enctype'=>"multipart/form-data",'class'=>'form-horizontal','files' => true,'id'=>'form']) !!}
                        @csrf
                        @include('admin.rides_stoppages.exce_upload')
                        {!!Form::close() !!}
            </div>
        </div>
        <div class="col-sm-12">
            <div class="card-box">
                <h4 class="header-title m-t-0 m-b-30">  Add Stoppage Operation</h4>
                        {!!Form::open( ['route' => 'admin.rides-stoppages.store' ,'class'=>'form phone_validate', 'method' => 'Post', 'enctype'=>"multipart/form-data",'class'=>'form-horizontal','files' => true,'id'=>'form']) !!}
                        @csrf
                        @include('admin.rides_stoppages.form')
                        {!!Form::close() !!}
            </div>
        </div><!-- end col -->
    </div>
    <!-- end row -->
@endsection
@push('scripts')
    {!! JsValidator::formRequest(\App\Http\Requests\Dashboard\Ride\RideRequest::class, '#form'); !!}
@endpush
