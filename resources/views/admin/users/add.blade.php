@extends('admin.layout.app')
@section('title')
    add User
@stop
@section('content')

    <div class="row">
        <div class="col-sm-12">
            <div class="card-box">
                <h4 class="header-title m-t-0 m-b-30">add User </h4>

                        {!!Form::open( ['route' => 'admin.users.store' ,'class'=>'form phone_validate', 'method' => 'Post', 'enctype'=>"multipart/form-data",'class'=>'form-horizontal','files' => true,'id'=>'form']) !!}
                        @include('admin.users.form')
                        {!!Form::close() !!}
            </div>
        </div><!-- end col -->
    </div>
    <!-- end row -->

@endsection
@push('scripts')
    {!! JsValidator::formRequest(\App\Http\Requests\Dashboard\User\StoreRequest::class, '#form'); !!}
@endpush
