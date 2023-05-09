@extends('admin.layout.app')

@section('title')
  Add New Inspection List To Ride
@endsection

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card-box">
                <h4 class="header-title m-t-0 m-b-30"> Add New Inspection List To Ride</h4>
                        {!!Form::open( ['route' => 'admin.ride_inspection_lists.store' ,'class'=>'form phone_validate', 'method' => 'Post', 'enctype'=>"multipart/form-data",'class'=>'form-horizontal','files' => true]) !!}
                        @csrf
                        @include('admin.ride_inspection_lists.form')
                        {!!Form::close() !!}
            </div>
        </div><!-- end col -->
    </div>
    <!-- end row -->
@endsection
@push('scripts')
    {!! JsValidator::formRequest(\App\Http\Requests\Dashboard\InspectionList\RideInspectionListRequest::class, '#form'); !!}
@endpush
