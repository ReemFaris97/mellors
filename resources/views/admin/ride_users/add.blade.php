@extends('admin.layout.app')

@section('title')
  Assign Rides To User 
@endsection

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card-box">
                <h4 class="header-title m-t-0 m-b-30"> Assign Rides To User </h4>
                        {!!Form::open( ['route' => 'admin.ride_users.store' ,'class'=>'form phone_validate', 'method' => 'Post', 'enctype'=>"multipart/form-data",'class'=>'form-horizontal','files' => true]) !!}
                        @csrf
                        @include('admin.ride_users.form')
                        {!!Form::close() !!}
            </div>
        </div><!-- end col -->
    </div>
    <!-- end row -->
@endsection
@push('scripts')
    {!! JsValidator::formRequest(\App\Http\Requests\Dashboard\User\UserParkRequest ::class, '#form'); !!}
@endpush
