@extends('admin.layout.app')

@section('title','update inspection element '.$inspection_list->name)

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card-box">
                <h4 class="header-title m-t-0 m-b-30">update inspection element {{ $inspection_list->name }} </h4>
                <a class="input-group-btn" href="{{route('admin.inspection_lists.index')}}">
                    <button type="button" class="btn waves-effect waves-light btn-primary">back</button>
                </a>
                            {!!Form::model($inspection_list , ['route' => ['admin.inspection_lists.update' , $inspection_list->id] , 'method' => 'PATCH','enctype'=>"multipart/form-data",'files' => true,'id'=>'form']) !!}
                            @include('admin.inspection_lists.form')
                            {!!Form::close() !!}
            </div>
        </div><!-- end col -->
    </div>
    <!-- end row -->
@endsection
@push('scripts')
    {!! JsValidator::formRequest(\App\Http\Requests\Dashboard\InspectionList\InspectionListRequest::class, '#form'); !!}
@endpush
