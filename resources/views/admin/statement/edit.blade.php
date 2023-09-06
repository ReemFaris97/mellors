@extends('admin.layout.app')

@section('title')
    Update statement
@endsection

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card-box">
                <h4 class="header-title m-t-0 m-b-30">Update statement  </h4>
                <a class="input-group-btn" href="{{ route('admin.statement.index') }}">
                    <button type="button" class="btn waves-effect waves-light btn-primary">back</button>
                </a>
                {!! Form::model($accident, [
                    'route' => ['admin.statement.update', $accident->id],
                    'method' => 'PATCH',
                    'enctype' => 'multipart/form-data',
                    'files' => true,
                    'id' => 'form',
                ]) !!}
                @include('admin.statement.form_edit')
                {!! Form::close() !!}
            </div>
        </div><!-- end col -->
    </div>
    <!-- end row -->
@endsection
@push('scripts')
    <script>

@endpush
