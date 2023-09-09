@extends('admin.layout.app')

@section('title')
  Add New RSR Report
@endsection

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card-box">
                <h4 class="header-title m-t-0 m-b-30"> Add New RSR Report</h4>
                        {!!Form::open( ['route' => 'admin.rsr_reports.store' ,'class'=>'form phone_validate', 'method' => 'Post', 'enctype'=>"multipart/form-data",'class'=>'form-horizontal','files' => true]) !!}
                        @csrf
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
