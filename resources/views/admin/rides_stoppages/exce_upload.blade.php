@extends('admin.layout.app')

@section('title')
    Upload Ride Cycle Operation
@endsection
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card-box">
                <h4 class="header-title m-t-0 m-b-30">  Add Stoppage Operation</h4>
                        {!!Form::open( ['route' => 'admin.uploadStoppagesExcleFile' ,'class'=>'form phone_validate', 'method' => 'Post', 'enctype'=>"multipart/form-data",'class'=>'form-horizontal','files' => true]) !!}
                        @csrf
<div class="row">
    @if($errors->any())
        <div class="alert alert-danger">
            <p><strong>Opps Something went wrong</strong></p>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="form-group">
        <label for="name"> Upload Stoppages Report With File  </label>
        {!! Form::file("file",['class'=>'form-control','required'])!!}
    </div>
    @if ($errors->has('file'))
        <span class="help-block">
                <span class="help-block">
                    <strong>{{ $errors->first('file') }}</strong>
                </span>
            @endif

    <div class="col-xs-12 aligne-center contentbtn">
        <button class="btn btn-primary waves-effect" type="submit">Save</button>
    </div>
</div>
{!!Form::close() !!}
            </div>
        </div>
        @endsection
@push('scripts')
    {!! JsValidator::formRequest(\App\Http\Requests\Dashboard\Ride\RideStoppageRequest::class, '#form'); !!}
@endpush
