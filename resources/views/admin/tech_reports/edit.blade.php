@extends('admin.layout.app')

@section('Update','update Technical  Report')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card-box">
                <h4 class="header-title m-t-0 m-b-30">Update Technical  Report </h4>
            
                            {!!Form::model($item , ['route' => ['admin.tech-reports.update' , $item->id] , 'method' => 'PATCH','enctype'=>"multipart/form-data",'files' => true,'id'=>'form']) !!}
                            @include('admin.health_and_safety_reports.edit_form')
                            {!!Form::close() !!}
            </div>
        </div><!-- end col -->
    </div>
    <!-- end row -->
@endsection
@push('scripts')
@endpush
