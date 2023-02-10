@extends('admin.layout.app')

@section('title')
    Add Queue to ride
@endsection

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card-box">
                <h4 class="header-title m-t-0 m-b-30">  Add Queue Operation</h4>
                {!!Form::open( ['route' => 'admin.uploadQueueExcleFile' ,'class'=>'form phone_validate', 'method' => 'Post', 'enctype'=>"multipart/form-data",'class'=>'form-horizontal','files' => true,'id'=>'form']) !!}
                @csrf
                @include('admin.queues.exce_upload')
                {!!Form::close() !!}
            </div>
        </div>
        <div class="col-sm-12">
            <div class="card-box">
                <h4 class="header-title m-t-0 m-b-30"> Add Queue to ride</h4>
                {!!Form::open( ['route' => 'admin.queues.store' ,'class'=>'form phone_validate', 'method' => 'Post', 'enctype'=>"multipart/form-data",'class'=>'form-horizontal','files' => true]) !!}
                @csrf
                @include('admin.queues.form')
                {!!Form::close() !!}
            </div>
        </div><!-- end col -->
    </div>
    <!-- end row -->
@endsection
@push('scripts')
    {!! JsValidator::formRequest(\App\Http\Requests\Dashboard\Queue\QueueRequest::class, '#form'); !!}
@endpush
