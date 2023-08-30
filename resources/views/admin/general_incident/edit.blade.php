@extends('admin.layout.app')

@section('title')
    Update Accident Report
@endsection

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card-box">
                <h4 class="header-title m-t-0 m-b-30">Update Accident Report</h4>
                <a class="input-group-btn" href="{{ route('admin.incident.index') }}">
                    <button type="button" class="btn waves-effect waves-light btn-primary">back</button>
                </a>
                {!! Form::model($accident, [
                    'route' => ['admin.incident.update', $accident->id],
                    'method' => 'PATCH',
                    'enctype' => 'multipart/form-data',
                    'files' => true,
                    'id' => 'form',
                ]) !!}
                @include('admin.general_incident.form_edit')
                {!! Form::close() !!}
            </div>
        </div><!-- end col -->
    </div>
    <!-- end row -->
@endsection
@push('scripts')
    {!! JsValidator::formRequest(\App\Http\Requests\Dashboard\Accident\AccidentRequest::class, '#form') !!}
@endpush
