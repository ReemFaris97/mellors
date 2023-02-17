@extends('admin.layout.app')


@section('content')

    <div class="row">
        <div class="col-sm-12">
            <div class="card-box">
                <h4 class="header-title m-t-0 m-b-30">Add Stoppage Notes</h4>
                <a class="input-group-btn" href="{{route('admin.rides-stoppages.index')}}">
                    <button type="button" class="btn waves-effect waves-light btn-primary">back</button>
                </a>
                {!!Form::model($item , ['route' => ['admin.rides-stoppages.update' , $item->id] , 'method' => 'PATCH','enctype'=>"multipart/form-data",'files' => true,'id'=>'form']) !!}
                @include('admin.rides_stoppages.form')
                {!!Form::close() !!}
            </div>
        </div><!-- end col -->
    </div>
    <!-- end row -->
@endsection
@push('scripts')
    {!! JsValidator::formRequest(\App\Http\Requests\Dashboard\Ride\RideStoppageRequest::class, '#form'); !!}
@endpush
