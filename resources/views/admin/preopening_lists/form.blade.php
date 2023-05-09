{{--@include('admin.common.errors')--}}
<div class="row">

    <div class="col-xs-12 col-sm-12 col-md-12">

        <div class="form-group">

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
                   @foreach($inspections as $value)
                       <tr>
                           <td>
                               {{ $value->inspection_list->name??'' }}
                           </td>
                           <td>
                          <label>
                              <select name="inspection_element[]" id="element_id" class="form-control element-id">
                                  <option disabled> Choose...</option>
                                  <option value="yes">Yes</option>
                                  <option value="no">No</option>
                           </select>
                              <input type="hidden" name="inspection_element_id[]" class="ele_id" value="{{ $value->inspection_list->id }}" >
                          </label>
                           </td>
                           <td>
                               {!! Form::textArea('comment[]',null, array('class' => 'form-control comment', 'rows'=>"1")) !!}
                               <input name="ride_id" type="hidden" class="ride-id" value={{$id}}>

                           </td>
                       </tr>
                   @endforeach

                   </tbody>
               </table>

    <div class="col-xs-12 aligne-center contentbtn">
        <button class="btn btn-primary save_btn waves-effect" type="submit">Save</button>
    </div>
</div>
        </div>
    </div>
</div>
@push('scripts')
    <script>
    $(document).ready(function () {
        $('.save_btn').on('click',function (e) {
            e.preventDefault();
            const element_id = [];
            const comment = [];
            const status = [];
            const ride_id=[];
            $('.element-id').each(function () {
                if($(this).change){
                    status.push($(this).val());

                }
            });
            $('.ele_id').each(function () {
                element_id.push($(this).val());
            });

            $('.comment').each(function () {
                comment.push($(this).val());
            });
            $('.ride-id').each(function () {
                ride_id.push($(this).val());
            });
            $.ajax({
                url: "{{ route('admin.preopening_lists.store') }}",
                type: 'POST',
                data:{
                    "_token":"{{ csrf_token() }}",
                    status: status,
                    inspection_list_id: element_id,
                    comment: comment,
                    ride_id: ride_id
                },
                success: function(response)
                {
                    if(response.success){
                    swal({
                         title: "Preopening List Report Added successfully",
                         icon: "success",
                         buttons: ["Ok"]
                          }); 
                          window.location.href = "{{route('admin.zones.index')}}";

                    }else {
                        swal({
                         title: "Preopening List Already Exist !",
                         icon: "danger",
                         buttons: ["Ok"],
                         
                          }); 
                          window.location.href = "{{route('admin.zones.index')}}";

                    }
                }
            });

        });
    });
    </script>
    @endpush