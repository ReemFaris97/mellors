@extends('admin.layout.app')

@section('title','Update Park '.$park->name)

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card-box">
                <h4 class="header-title m-t-0 m-b-30">update park {{ $park->name }} </h4>
                <a class="input-group-btn" href="{{route('admin.parks.index')}}">
                    <button type="button" class="btn waves-effect waves-light btn-primary">back</button>
                </a>
                            {!!Form::model($park , ['route' => ['admin.parks.update' , $park->id] , 'method' => 'PATCH','enctype'=>"multipart/form-data",'files' => true,'id'=>'form']) !!}
                            @include('admin.parks.form')
                            {!!Form::close() !!}
            </div>
        </div><!-- end col -->
    </div>
    <!-- end row -->
@endsection
@push('scripts')
    {!! JsValidator::formRequest(\App\Http\Requests\Dashboard\park\ParkRequest::class, '#form'); !!}
@endpush
