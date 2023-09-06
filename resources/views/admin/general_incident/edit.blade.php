@extends('admin.layout.app')

@section('title')
    Update Accident / Incident
@endsection

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card-box">
                <h4 class="header-title m-t-0 m-b-30">Update Accident / Incident  </h4>
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
    <script>
        $('#park').click(function () {
            $('#parks').show();
           // $('#zones').hide();
            $('#rides').hide();
            $('#text').show();
        })
      //  $('#zone').click(function () {
       //     $('#parks').show();
         //   $('#zones').show();
       //     $('#rides').hide();
       //     $('#text').hide();
       // })
        $('#ride').click(function () {
            $('#parks').show();
           // $('#zones').show();
            $('#rides').show();
            $('#text').hide();
        })
        $('#general').click(function () {
            $('#parks').hide();
         //   $('#zones').hide();
            $('#rides').hide();
            $('#text').show();
        })
        $(".Parks").change(function(){
            $.ajax({
                url: "{{ route('admin.getRides') }}?park_id=" + $(this).val(),
                method: 'GET',
                success: function(data) {
                    $('.Rides').html(data.html);
                }
            });
        });
    </script>
@endpush
