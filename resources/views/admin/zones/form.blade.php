{{--@include('admin.common.errors')--}}
<div class="row">
<div class="col-xs-12">
<div class="form-group form-float">
    <label class="form-label">Zone Name</label>
    <div class="form-line">
        {!! Form::text("name",null,['class'=>'form-control','placeholder'=>' Zone name'])!!}
        @error('name')
        <div class="invalid-feedback" style="color: #ef1010">
            {{ $message }}
        </div>
        @enderror
    </div>
</div>
</div>
    <div class="col-xs-12">

    <div class="form-group">
        <label >Branch :</label>
        {!! Form::select('branch_id', @$branches?$branches:null,null, array('class' => 'form-control select2','id'=>'branch')) !!}
    </div>
    <div class="form-group">
        <label > Park :</label>
        {!! Form::select('park_id',@$parks?$parks:null,null, array('class' => 'form-control select2','id'=>'park')) !!}
    </div>
    </div>

<div class="col-xs-12 aligne-center contentbtn">
    <button class="btn btn-primary waves-effect" type="submit">Save</button>
</div>
</div>
@push('scripts')
    <script type="text/javascript">
        $("#branch").change(function(){
            $.ajax({
                url: "{{ route('admin.parks.get_by_branch') }}?branch_id=" + $(this).val(),
                method: 'GET',
                success: function(data) {
                    $('#park').html(data.html);
                }
            });
        });
    </script>
@endpush