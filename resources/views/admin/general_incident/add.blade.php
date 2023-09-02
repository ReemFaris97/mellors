@extends('admin.layout.app')

@section('title')
    Add New Accident / Incident
@endsection

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card-box">
                <h4 class="header-title m-t-0 m-b-30"> Add New Accident / Incident </h4>
                {!! Form::open([
                    'route' => 'admin.incident.store',
                    'class' => 'form phone_validate',
                    'method' => 'Post',
                    'enctype' => 'multipart/form-data',
                    'class' => 'form-horizontal',
                    'files' => true,
                ]) !!}
                @csrf
                @include('admin.general_incident.form')
                {!! Form::close() !!}
            </div>
        </div><!-- end col -->
    </div>
    <!-- end row -->
@endsection
@push('scripts')
    {!! JsValidator::formRequest(\App\Http\Requests\Dashboard\Accident\IncidentRequest::class, '#form') !!}

    <script>
        $('#park').click(function () {
            $('#parks').show();
            $('#zones').hide();
            $('#rides').hide();
            $('#text').hide();
        })
        $('#zone').click(function () {
            $('#parks').show();
            $('#zones').show();
            $('#rides').hide();
            $('#text').hide();
        })
        $('#ride').click(function () {
            $('#parks').show();
            $('#zones').show();
            $('#rides').show();
            $('#text').hide();
        })
        $('#general').click(function () {
            $('#parks').hide();
            $('#zones').hide();
            $('#rides').hide();
            $('#text').show();
        })
        $(".Parks").change(function(){
            $.ajax({
                url: "{{ route('admin.getZones') }}?bark_id=" + $(this).val(),
                method: 'GET',
                success: function(data) {
                    $('.Zones').html(data.html);
                }
            });
        });
        $(".Zones").change(function(){
            $.ajax({
                url: "{{ route('admin.getRides') }}?zone_id=" + $(this).val(),
                method: 'GET',
                success: function(data) {
                    $('.Rides').html(data.html);
                }
            });
        });
    </script>
@endpush
