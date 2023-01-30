@extends('admin.layout.app')

@section('title','Update Zone '.$zone->name)

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card-box">
                <h4 class="header-title m-t-0 m-b-30">update Zone {{ $zone->name }} </h4>
                <a class="input-group-btn" href="{{route('admin.zones.index')}}">
                    <button type="button" class="btn waves-effect waves-light btn-primary">back</button>
                </a>
                            {!!Form::model($zone , ['route' => ['admin.zones.update' , $zone->id] , 'method' => 'PATCH','enctype'=>"multipart/form-data",'files' => true,'id'=>'form']) !!}
                            @include('admin.zones.form')
                            {!!Form::close() !!}
            </div>
        </div><!-- end col -->
    </div>
    <!-- end row -->
@endsection
@push('scripts')
    {!! JsValidator::formRequest(\App\Http\Requests\Dashboard\Zone\ZoneRequest::class, '#form'); !!}
@endpush
