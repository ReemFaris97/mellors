@extends('admin.layout.app')

@section('Update','update Preopening List'.$item->rides->name)

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card-box">
                <h4 class="header-title m-t-0 m-b-30">Update Preopening List To  {{ $item->rides->name }} </h4>
                <a class="input-group-btn" href="{{route('admin.preopening_lists.index')}}">
                    <button type="button" class="btn waves-effect waves-light btn-primary">back</button>
                </a>
                            {!!Form::model($item , ['route' => ['admin.preopening_lists.update' , $item->id] , 'method' => 'PATCH','enctype'=>"multipart/form-data",'files' => true,'id'=>'form']) !!}
                            @include('admin.preopening_lists.form')
                            {!!Form::close() !!}
            </div>
        </div><!-- end col -->
    </div>
    <!-- end row -->
@endsection
@push('scripts')
    {!! JsValidator::formRequest(\App\Http\Requests\Dashboard\InspectionList\PreopeningListRequest::class, '#form'); !!}
@endpush
