@extends('admin.layout.app')

@section('title')
  Add New Observation
@endsection

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card-box">
                <h4 class="header-title m-t-0 m-b-30">  Add New Observation</h4>
                        {!!Form::open( ['route' => 'admin.observations.store' ,'class'=>'form phone_validate', 'method' => 'Post', 'enctype'=>"multipart/form-data",'class'=>'form-horizontal','files' => true]) !!}
                        @csrf
                        @include('admin.observations.form')
                        <div class="form-group">
                        <label for="name"> Upload Image </label>
                        {!! Form::file('image' , [
                                                "class" => "form-control  file_upload_preview",
                                                "multiple" => "multiple",
                                                "data-preview-file-type" => "text"
                                                            ]) !!}
                       </div>
                        <input type="hidden" name="ride_id" value="{{$ride_id}}">
                        <div class="col-xs-12 aligne-center contentbtn">
                        <button class="btn btn-primary waves-effect" type="submit">Save</button>
                        </div>
                        </div>
                        {!!Form::close() !!}
            </div>
        </div><!-- end col -->
    </div>
    <!-- end row -->
@endsection
@push('scripts')
{!! JsValidator::formRequest(\App\Http\Requests\Dashboard\Observation\ObservationRequest::class, '#form'); !!}
@endpush
