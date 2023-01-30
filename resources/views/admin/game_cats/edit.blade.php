@extends('admin.layout.app')

@section('title','update department '.$game_cats->name)

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card-box">
                <h4 class="header-title m-t-0 m-b-30">update department {{ $game_cats->name }} </h4>
                <a class="input-group-btn" href="{{route('admin.game_cats.index')}}">
                    <button type="button" class="btn waves-effect waves-light btn-primary">back</button>
                </a>
                            {!!Form::model($game_cats , ['route' => ['admin.game_cats.update' , $game_cats->id] , 'method' => 'PATCH','enctype'=>"multipart/form-data",'files' => true,'id'=>'form']) !!}
                            @include('admin.game_cats.form')
                            {!!Form::close() !!}
            </div>
        </div><!-- end col -->
    </div>
    <!-- end row -->
@endsection
@push('scripts')
    {!! JsValidator::formRequest(\App\Http\Requests\Dashboard\GameCategory\GameCategoryRequest::class, '#form'); !!}
@endpush
