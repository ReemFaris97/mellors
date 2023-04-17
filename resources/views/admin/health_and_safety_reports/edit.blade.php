@extends('admin.layout.app')

@section('Update','update Health And Safety Report')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card-box">
                <h4 class="header-title m-t-0 m-b-30">Update Health And Safety Report </h4>
                <a class="input-group-btn" href="{{route('admin.park_times.index')}}">
                    <button type="button" class="btn waves-effect waves-light btn-primary">back</button>
                </a>
                            {!!Form::model($item , ['route' => ['admin.health_and_safety_reports.update' , $id] , 'method' => 'PATCH','enctype'=>"multipart/form-data",'files' => true,'id'=>'form']) !!}
                            @include('admin.health_and_safety_reports.form')
                            {!!Form::close() !!}
            </div>
        </div><!-- end col -->
    </div>
    <!-- end row -->
@endsection
@push('scripts')
    {!! JsValidator::formRequest(\App\Http\Requests\Dashboard\InspectionList\PreopeningListRequest::class, '#form'); !!}
@endpush
