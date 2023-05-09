@extends('admin.layout.app')

@section('Update','update Preopening List')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card-box">
                <h4 class="header-title m-t-0 m-b-30">Update Preopening List </h4>
                            {!!Form::model($ride, ['route' => ['admin.preopening_lists.update' , $ride->id] , 'method' => 'PATCH','enctype'=>"multipart/form-data",'files' => true,'id'=>'form']) !!}
                            @include('admin.preopening_lists.form_edit')
                            {!!Form::close() !!}
            </div>
        </div><!-- end col -->
    </div>
    <!-- end row -->
@endsection
@push('scripts')
    {!! JsValidator::formRequest(\App\Http\Requests\Dashboard\InspectionList\PreopeningListRequest::class, '#form'); !!}
@endpush
