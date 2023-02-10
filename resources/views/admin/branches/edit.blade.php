@extends('admin.layout.app')

@section('title','update department '.$branch->name)

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card-box">
                <h4 class="header-title m-t-0 m-b-30">Update Branch {{ $branch->name }} </h4>
                <a class="input-group-btn" href="{{route('admin.departments.index')}}">
                    <button type="button" class="btn waves-effect waves-light btn-primary">back</button>
                </a>
                            {!!Form::model($branch , ['route' => ['admin.branches.update' , $branch->id] ,
                             'method' => 'PATCH','enctype'=>"multipart/form-data",'files' => true,'id'=>'form']) !!}
                            @include('admin.branches.form')
                            {!!Form::close() !!}
            </div>
        </div><!-- end col -->
    </div>
    <!-- end row -->
@endsection
@push('scripts')
    {!! JsValidator::formRequest(\App\Http\Requests\Dashboard\Branch\BranchRequest::class, '#form'); !!}
@endpush
