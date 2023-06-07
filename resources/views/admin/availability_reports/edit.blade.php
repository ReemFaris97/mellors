@extends('admin.layout.app')

@section('title','Add Second Status ')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card-box">
                <h4 class="header-title m-t-0 m-b-30">Add Second Status</h4>
              
                            {!!Form::model($items , ['route' => ['admin.availability_reports.update' , $id] ,
                             'method' => 'PATCH','enctype'=>"multipart/form-data",'files' => true,'id'=>'form']) !!}
                            @include('admin.availability_reports.form_edit')
                            {!!Form::close() !!}
            </div>
        </div><!-- end col -->
    </div>
    <!-- end row -->
@endsection
@push('scripts')
    {!! JsValidator::formRequest(\App\Http\Requests\Dashboard\Branch\BranchRequest::class, '#form'); !!}
@endpush
