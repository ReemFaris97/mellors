@extends('admin.layout.app')

@section('title','update Role '.$role->name)

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card-box">
                <h4 class="header-title m-t-0 m-b-30">update Role {{ $role->name }} </h4>
                <a class="input-group-btn" href="{{route('admin.roles.index')}}">
                    <button type="button" class="btn waves-effect waves-light btn-primary">رجوع</button>
                </a>
                            {!!Form::model($role , ['route' => ['admin.roles.update' , $role->id] , 'method' => 'PATCH','enctype'=>"multipart/form-data",'files' => true,'id'=>'form']) !!}
                            @include('admin.roles.form')
                            {!!Form::close() !!}
            </div>
        </div><!-- end col -->
    </div>
    <!-- end row -->
@endsection
@push('scripts')
    {!! JsValidator::formRequest(\App\Http\Requests\Dashboard\Role\RoleRequest::class, '#form'); !!}
@endpush
