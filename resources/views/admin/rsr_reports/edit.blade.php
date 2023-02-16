@extends('admin.layout.app')

@section('title')
    Update RSR Report
@endsection

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card-box">
                <h4 class="header-title m-t-0 m-b-30">Update RSR Report </h4>
                <a class="input-group-btn" href="{{route('admin.rsr_reports.index')}}">
                    <button type="button" class="btn waves-effect waves-light btn-primary">back</button>
                </a>
                            {!!Form::model($rsrReport , ['route' => ['admin.rsr_reports.update' , $rsrReport->id] ,
                             'method' => 'PATCH','enctype'=>"multipart/form-data",'files' => true,'id'=>'form']) !!}
                            @include('admin.rsr_reports.form')
                            {!!Form::close() !!}
            </div>
        </div><!-- end col -->
    </div>
    <!-- end row -->
@endsection
@push('scripts')
    {!! JsValidator::formRequest(\App\Http\Requests\Dashboard\Ride\RsrReportRequest::class, '#form'); !!}

@endpush
