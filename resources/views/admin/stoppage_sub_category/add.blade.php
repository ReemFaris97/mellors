@extends('admin.layout.app')

@section('title')
  Add New stoppage sub category
@endsection

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card-box">
                <h4 class="header-title m-t-0 m-b-30">  Add New stoppage sub category</h4>
                        {!!Form::open( ['route' => 'admin.stoppage-sub-category.store' ,'class'=>'form phone_validate', 'method' => 'Post', 'enctype'=>"multipart/form-data",'class'=>'form-horizontal','files' => true]) !!}
                        @csrf
                        @include('admin.stoppage_sub_category.form')
                        {!!Form::close() !!}
            </div>
        </div><!-- end col -->
    </div>
    <!-- end row -->
@endsection
@push('scripts')
    {!! JsValidator::formRequest(\App\Http\Requests\Dashboard\Ride\StoppageSubCategoryRequest::class, '#form'); !!}
@endpush
