@extends('admin.layout.app')

@section('title')
    Edit User -
    {{ $user->name }}
@stop
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card-box">
                <h4 class="header-title m-t-0 m-b-30">Edit User - {{ $user->name }} </h4>

                        {!!Form::model($user , ['route' => ['admin.users.update' , $user->id] , 'method' => 'PATCH','enctype'=>"multipart/form-data",'class'=>'form-horizontal','files' => true,'id'=>'form']) !!}
                        @include('admin.users.form')
                        {!!Form::close() !!}
            </div>
        </div><!-- end col -->
    </div>
    <!-- end row -->
@endsection

@push('scripts')
    {!! JsValidator::formRequest(\App\Http\Requests\Dashboard\User\UpdateRequest::class, '#form'); !!}
@endpush
