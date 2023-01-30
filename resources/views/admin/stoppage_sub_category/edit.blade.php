@extends('admin.layout.app')

@section('title','Update stoppage sub category '.$item->name)

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card-box">
                <h4 class="header-title m-t-0 m-b-30">update  stoppage sub category {{ $item->name }} </h4>
                <a class="input-group-btn" href="{{route('admin.stoppage-sub-category.index')}}">
                    <button type="button" class="btn waves-effect waves-light btn-primary">back</button>
                </a>
                            {!!Form::model($item , ['route' => ['admin.stoppage-sub-category.update' , $item->id] , 'method' => 'PATCH','enctype'=>"multipart/form-data",'files' => true,'id'=>'form']) !!}
                            @include('admin.stoppage_sub_category.form')
                            {!!Form::close() !!}
            </div>
        </div><!-- end col -->
    </div>
    <!-- end row -->
@endsection
@push('scripts')
    {!! JsValidator::formRequest(\App\Http\Requests\Dashboard\Zone\ZoneRequest::class, '#form'); !!}
@endpush
