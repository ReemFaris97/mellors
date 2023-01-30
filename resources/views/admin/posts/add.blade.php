@extends('admin.layout.app')
@section('title')
    إضافة  مدونة جديدة
@stop
@section('content')

    <div class="row">
        <div class="col-sm-12">
            <div class="card-box">
                <h4 class="header-title m-t-0 m-b-30">Add new Post </h4>
                <a class="input-group-btn" href="{{route('admin.posts.index')}}">
    <button type="submit" class="btn waves-effect waves-light btn-primary">رجوع</button>
</a>
                        {!!Form::open( ['route' => 'admin.posts.store' ,'class'=>'form phone_validate', 'method' => 'Post', 'enctype'=>"multipart/form-data",'class'=>'form-horizontal','files' => true,'id'=>'form']) !!}
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
