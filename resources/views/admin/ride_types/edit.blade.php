@extends('admin.layout.app')

@section('title','update ride types '.$ride_types->name)

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card-box">
                <h4 class="header-title m-t-0 m-b-30">Update Ride Type {{ $ride_types->name }} </h4>
                <a class="input-group-btn" href="{{route('admin.ride_types.index')}}">
                    <button type="button" class="btn waves-effect waves-light btn-primary">back</button>
                </a>
                            {!!Form::model($ride_types , ['route' => ['admin.ride_types.update' , $ride_types->id] ,
                             'method' => 'PATCH','enctype'=>"multipart/form-data",'files' => true,'id'=>'form']) !!}
                            @include('admin.ride_types.form')
                            {!!Form::close() !!}
            </div>
        </div><!-- end col -->
    </div>
    <!-- end row -->
@endsection
@push('scripts')
{!! JsValidator::formRequest(\App\Http\Requests\Dashboard\RideType\RideTypeRequest::class, '#form'); !!}
@endpush
