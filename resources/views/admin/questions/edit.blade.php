@extends('admin.layout.app')

@section('title','update inspection element '.$question->question)

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card-box">
                <h4 class="header-title m-t-0 m-b-30">Update question {{ $question->question }} </h4>
                <a class="input-group-btn" href="{{route('admin.questions.index')}}">
                    <button type="button" class="btn waves-effect waves-light btn-primary">back</button>
                </a>
                            {!!Form::model($question , ['route' => ['admin.questions.update' , $question->id] , 'method' => 'PATCH','enctype'=>"multipart/form-data",'files' => true,'id'=>'form']) !!}
                            @include('admin.questions.form')
                            {!!Form::close() !!}
            </div>
        </div><!-- end col -->
    </div>
    <!-- end row -->
@endsection
@push('scripts')
    {!! JsValidator::formRequest(\App\Http\Requests\Dashboard\Questions\QuestionRequest::class, '#form'); !!}
@endpush
