@extends('admin.layout.app')

@section('title')
    Edit Post
@stop
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card-box">
                <h4 class="header-title m-t-0 m-b-30">Edit Post  </h4>

                        {!!Form::model($post , ['route' => ['admin.posts.update' , $post->id] , 'method' => 'PATCH','enctype'=>"multipart/form-data",'class'=>'form-horizontal','files' => true,'id'=>'form']) !!}
                        @include('admin.posts.form')
                        {!!Form::close() !!}
            </div>
        </div><!-- end col -->
    </div>
    <!-- end row -->
@endsection
@push('scripts')
    {!! JsValidator::formRequest(\App\Http\Requests\Dashboard\Post\PostRequest::class, '#form'); !!}
@endpush
