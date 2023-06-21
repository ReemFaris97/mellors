@extends('admin.layout.app')

@section('title','Update User Rides ')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card-box">
                <h4 class="header-title m-t-0 m-b-30">Update  User Rides </h4>
               
                            {!!Form::model($user , ['route' => ['admin.ride_users.update' , $user->id] ,
                             'method' => 'PATCH','enctype'=>"multipart/form-data",'files' => true,'id'=>'form']) !!}
                            @include('admin.ride_users.form')
                            {!!Form::close() !!}
            </div>
        </div><!-- end col -->
    </div>
    <!-- end row -->
@endsection
@push('scripts')
{!! JsValidator::formRequest(\App\Http\Requests\Dashboard\User\UserZoneRequest ::class, '#form'); !!}
@endpush
