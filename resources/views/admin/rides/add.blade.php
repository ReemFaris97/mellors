@extends('admin.layout.app')

@section('title')
    Add Stoppage Operation
@endsection

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card-box">
                <h4 class="header-title m-t-0 m-b-30"> Upload Multiple Rides With File</h4>
                {!!Form::open( ['route' => 'admin.uploadExcleFile' ,'class'=>'form phone_validate', 'method' => 'Post', 'enctype'=>"multipart/form-data",'class'=>'form-horizontal','files' => true,'id'=>'form']) !!}
                @csrf
                @include('admin.rides.form')
                {!!Form::close() !!}
            </div>

            <div class="card-box">
                <h4 class="header-title m-t-0 m-b-30"> Add Rides With Form </h4>
                {!!Form::open( ['route' => 'admin.rides.store' ,'class'=>'form phone_validate', 'method' => 'Post', 'enctype'=>"multipart/form-data",'class'=>'form-horizontal','files' => true,'id'=>'form']) !!}
                @csrf
                @include('admin.games.form')
                {!!Form::close() !!}
            </div>
        </div><!-- end col -->
    </div>
    <!-- end row -->
@endsection
@push('scripts')
    {!! JsValidator::formRequest(\App\Http\Requests\Dashboard\Ride\RideRequest::class, '#form'); !!}
@endpush
