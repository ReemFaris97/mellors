@extends('admin.layout.app')

@section('title')
Add New Incident Investigation Form QMS-F-14 
@endsection

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card-box">
                <h4 class="header-title m-t-0 m-b-30"> Add New Incident Investigation Form QMS-F-14 </h4>
                {!! Form::open([
                    'route' => 'admin.investigation.store',
                    'class' => 'form phone_validate',
                    'method' => 'Post',
                    'enctype' => 'multipart/form-data',
                    'class' => 'form-horizontal',
                    'files' => true,
                ]) !!}
                @csrf
                @include('admin.investigation.form')
                {!! Form::close() !!}
            </div>
        </div><!-- end col -->
    </div>
    <!-- end row -->
@endsection
@push('scripts')
    {!! JsValidator::formRequest(\App\Http\Requests\Dashboard\Accident\IncidentRequest::class, '#form') !!}
@endpush
