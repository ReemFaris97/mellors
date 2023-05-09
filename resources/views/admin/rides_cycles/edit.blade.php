@extends('admin.layout.app')

@section('title','Update Ride Cycle '.$time->parks->name)

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card-box">
                <h4 class="header-title m-t-0 m-b-30">update park {{ $time->parks->name }} </h4>
                <a class="input-group-btn" href="{{route('admin.park_times.index')}}">
                    <button type="button" class="btn waves-effect waves-light btn-primary">back</button>
                </a>
                            {!!Form::model($time , ['route' => ['admin.park_times.update' , $time->id] , 'method' => 'PATCH','enctype'=>"multipart/form-data",'files' => true,'id'=>'form']) !!}
                            @include('admin.park_times.form')
                            {!!Form::close() !!}
            </div>
        </div><!-- end col -->
    </div>
    <!-- end row -->
@endsection
@push('scripts')
    {!! JsValidator::formRequest(\App\Http\Requests\Dashboard\ParkTime\ParkTimeRequest::class, '#form'); !!}
@endpush
