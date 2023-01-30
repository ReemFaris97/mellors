@extends('admin.layout.app')

@section('title','Update Ride Open and Close time')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card-box">
                <h4 class="header-title m-t-0 m-b-30">Update Ride Open and Close time </h4>
                <a class="input-group-btn" href="{{route('admin.park_times.index')}}">
                    <button type="button" class="btn waves-effect waves-light btn-primary">back</button>
                </a>
                {!!Form::model($time , ['route' => 'admin.game_times.store'  , 'method' => 'post','enctype'=>"multipart/form-data",'files' => true,'id'=>'form']) !!}
                @include('admin.game_times.form')
                {!!Form::close() !!}
            </div>
        </div><!-- end col -->
    </div>
    <!-- end row -->
@endsection
@push('scripts')
    {!! JsValidator::formRequest(\App\Http\Requests\Dashboard\GameTime\GameTimeRequest::class, '#form'); !!}
@endpush
