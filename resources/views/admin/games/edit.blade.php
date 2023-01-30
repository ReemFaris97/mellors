@extends('admin.layout.app')

@section('title','Update Ride '.$game->name)

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card-box">
                <h4 class="header-title m-t-0 m-b-30">update ride {{ $game->name }} </h4>

                            {!!Form::model($game , ['route' => ['admin.games.update' , $game->id] , 'method' => 'PATCH','enctype'=>"multipart/form-data",'files' => true,'id'=>'form']) !!}
                            @include('admin.games.form')
                            {!!Form::close() !!}
            </div>
        </div><!-- end col -->
    </div>
    <!-- end row -->
@endsection
@push('scripts')
    {!! JsValidator::formRequest(\App\Http\Requests\Dashboard\Game\GameRequest::class, '#form'); !!}
@endpush
