@extends('admin.layout.app')

@section('title','Update Ride '.$ride->name)

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card-box">
                <h4 class="header-title m-t-0 m-b-30">Update Ride {{ $ride->name }} </h4>
                <a class="input-group-btn" href="{{route('admin.rides.index')}}">
                    <button type="button" class="btn waves-effect waves-light btn-primary">back</button>
                </a>
                            {!!Form::model($ride , ['route' => ['admin.rides.update' , $ride->id] , 'method' => 'PATCH','enctype'=>"multipart/form-data",'files' => true,'id'=>'form']) !!}
                            @include('admin.games.form')
                            {!!Form::close() !!}
            </div>
        </div><!-- end col -->
    </div>
    <!-- end row -->
@endsection
@push('scripts')
{!! JsValidator::formRequest(\App\Http\Requests\Dashboard\Ride\RideRequest::class, '#form'); !!}
@endpush
