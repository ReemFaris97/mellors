@extends('admin.layout.app')

@section('title','Update User Parks ')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card-box">
                <h4 class="header-title m-t-0 m-b-30">Update  User Parks </h4>
               
                            {!!Form::model($user , ['route' => ['admin.user_parks.update' , $user->id] ,
                             'method' => 'PATCH','enctype'=>"multipart/form-data",'files' => true,'id'=>'form']) !!}
                            @include('admin.user_parks.form')
                            {!!Form::close() !!}
            </div>
        </div><!-- end col -->
    </div>
    <!-- end row -->
@endsection
@push('scripts')
{!! JsValidator::formRequest(\App\Http\Requests\Dashboard\User\UserZoneRequest ::class, '#form'); !!}
@endpush
