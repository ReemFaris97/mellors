@extends('admin.layout.app')

@section('title')
Update Incident Investigation Form QMS-F-14
@endsection

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card-box">
                <h4 class="header-title m-t-0 m-b-30">Update Incident Investigation Form QMS-F-14</h4>
                <a class="input-group-btn" href="{{ route('admin.investigation.index') }}">
                    <button type="button" class="btn waves-effect waves-light btn-primary">back</button>
                </a>
                {!! Form::model($accident, [
                    'route' => ['admin.investigation.update', $accident->id],
                    'method' => 'PATCH',
                    'enctype' => 'multipart/form-data',
                    'files' => true,
                    'id' => 'form',
                ]) !!}
                @include('admin.investigation.form_edit')
                {!! Form::close() !!}
            </div>
        </div><!-- end col -->
    </div>
    <!-- end row -->
@endsection
@push('scripts')
    {!! JsValidator::formRequest(\App\Http\Requests\Dashboard\Accident\InvestigationRequest::class, '#form') !!}
    <script>
        $('#park').click(function () {
            $('#parks').show();
        //    $('#zones').hide();
            $('#rides').hide();
            $('#text').hide();
        })
     /*    $('#zone').click(function () {
            $('#parks').show();
            $('#zones').show();
            $('#rides').hide();
            $('#text').hide();
        }) */
        $('#ride').click(function () {
            $('#parks').show();
        //    $('#zones').show();
            $('#rides').show();
            $('#text').hide();
        })
        $('#general').click(function () {
            $('#parks').hide();
        //    $('#zones').hide();
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
   /*      $(".Zones").change(function(){
            $.ajax({
                url: "{{ route('admin.getRides') }}?zone_id=" + $(this).val(),
                method: 'GET',
                success: function(data) {
                    $('.Rides').html(data.html);
                }
            });
        }); */
    </script>
    @endpush
