<button class="btn btn-primary waves-effect" id="add_another_image" type="button">
    New Image
</button>
<table class="table table-bordered table-striped table-hover dataTable js-exportable" id="images_table">
    <thead>
        <tr>
            <th>Image</th>
            <th>Comment</th>
            <th>العمليات</th>
        </tr>
    </thead>
    <tbody>

    </tbody>
</table>

@push('scripts')
<script>
    $("#add_another_image").click(
            function () {
                var trCount = $('#images_table tr').length;
                $.ajax({
                    type: "post",
                    url: "{{route('admin.getImage')}}",
                    data: {'_token': "{{@csrf_token()}}",'trCount':trCount},
                    success: function (data) {
                        $("#images_table").append(data);
                    }
                });


            });
    </script>
@endpush
