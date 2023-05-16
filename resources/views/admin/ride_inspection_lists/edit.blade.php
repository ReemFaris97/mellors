@extends('admin.layout.app')
@section('Update','update Ride Inspection  List'.$ride->name)

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card-box">
                <h4 class="header-title m-t-0 m-b-30">Update Ride Inspection List </h4>
                <a class="input-group-btn" href="{{route('admin.ride_inspection_lists.index')}}">
                    <button type="button" class="btn waves-effect waves-light btn-primary">back</button>
                </a>
                            {!!Form::model($ride, ['route' => ['admin.updatRideInspectionLists' , $ride->id] , 'method' => 'post','enctype'=>"multipart/form-data",'files' => true,'id'=>'form']) !!}
                            @include('admin.ride_inspection_lists.form')
                            {!!Form::close() !!}
            </div>
        </div><!-- end col -->
    </div>
    <!-- end row -->
@endsection
@push('scripts')
    {!! JsValidator::formRequest(\App\Http\Requests\Dashboard\InspectionList\PreopeningListRequest::class, '#form'); !!}
@endpush
