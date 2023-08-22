{{-- @include('admin.common.errors') --}}
<div class="row">

    <div class="col-xs-12 col-sm-12 col-md-12">

        <div class="form-group">
            @if (isset($questions))
                <div class="row">
                    <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap">
                        <thead>
                            <tr role="row">
                                <th class="sorting_asc" tabindex="0" aria-controls="datatable-buttons" rowspan="1"
                                    colspan="1" aria-sort="ascending"> Description of Check Required
                                </th>
                                <th class="sorting_asc" tabindex="0" aria-controls="datatable-buttons" rowspan="1"
                                    colspan="1" aria-sort="ascending">Any Issues ?
                                </th>
                                <th class="sorting_asc" tabindex="0" aria-controls="datatable-buttons" rowspan="1"
                                    colspan="1" aria-sort="ascending">Comments
                                </th>
                        </thead>
                        <tbody>
                            @foreach ($questions as $value)
                                <tr>
                                    <td>
                                        {{ $value->name ?? '' }}
                                    </td>
                                    <td>
                                        <label>
                                            <select name="status[]" id="element_id" class="form-control element-id">
                                                <option default value=""> None</option>
                                                <option value="yes">Yes</option>
                                                <option value="no">No</option>
                                            </select>
                                            <input type="hidden" name="question_id[]" class="ele_id"
                                                value="{{ $value->id }}">
                                        </label>
                                    </td>
                                    <td>
                                        {!! Form::textArea('note[]', null, ['class' => 'form-control comment', 'rows' => '1']) !!}


                                    </td>
                                </tr>
                            @endforeach
                            <input name="ride_id" type="hidden" class="ride-id" value={{ $ride_id }}>
                            <input name="park_time_id" type="hidden" id="park-time-id" class="park-time-id"
                                value={{ $park_time_id }}>
                        </tbody>
                    </table>

                    <div class="col-xs-12 aligne-center contentbtn">
                        <button class="btn btn-primary save_btn waves-effect" type="submit">Save</button>
                    </div>
                </div>
            @else
                <label>No questions</label>
            @endif


        </div>
    </div>
</div>
@push('scripts')
    <script>
        $(document).ready(function() {
            $('.save_btn').on('click', function(e) {
                e.preventDefault();
                const element_id = [];
                const comment = [];
                const status = [];
                const ride_id = $('.ride-id').val();
                const park_time_id = $('.park-time-id').val();
                $('.element-id').each(function() {
                    if ($(this).change) {
                        status.push($(this).val());

                    }
                });
                $('.ele_id').each(function() {
                    element_id.push($(this).val());
                });

                $('.comment').each(function() {
                    comment.push($(this).val());
                });
                // $('.ride-id').each(function() {
                //     ride_id.push($(this).val());
                // });
                // $('.park-time-id').each(function() {
                //     park_time_id.push($(this).val());
                // });
                var zone_id = $("#zone-id").val();

                $.ajax({
                    url: "{{ route('admin.store_questions') }}",
                    type: 'POST',
                    data: {
                        "_token": "{{ csrf_token() }}",
                        status: status,
                        element_ids: element_id,
                        comment: comment,
                        ride_id: ride_id,
                        park_time_id: park_time_id
                    },
                    success: function(response) {
                        if (response.success) {
                            swal({
                                title: "Question List Report Added successfully",
                                icon: "success",
                                buttons: ["Ok"]
                            });
                            window.location.href = "{{ route('admin.park_times.index') }}";

                        } else {
                            swal({
                                title: "Error !",
                                icon: "danger",
                                buttons: ["Ok"],

                            });
                            window.location.href = "{{ route('admin.park_times.index') }}";

                        }
                    }
                });

            });
        });
    </script>
@endpush
