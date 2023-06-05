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
                               {{ $value->inspection_list->name ??''}}
                           </td>
                           <td>
                          <label>
                          <select name="status[]" id="element_id" class="form-control element-id">
                            @if($value->status =='yes')
                          <option value="yes">Yes</option>
                          <option value="no">No</option>
                          @else
                          <option value="no">No</option>
                          <option value="yes">Yes</option>
                          @endif
                           </select>
                             
                              <input type="hidden" name="inspection_list_id[]" class="ele_id" value="{{ $value->inspection_list_id }}" >
                          </label>
                           </td>
                           <td>
                               {!! Form::textArea('comment[]',$value->comment, array('class' => 'form-control comment', 'rows'=>"1")) !!}
                               <input name="ride_id" type="hidden" id="ride-id" class="ride-id" value={{$ride_id}}>
                               <input name="park_time_id" type="hidden" id="park-time-id" class="park-time-id" value={{$park_time_id}}>
                               <input name="created_date" type="hidden" id="created_date" class="created_date" value={{$created_date}}>
                               
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
            const park_time_id=[];
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
            });  $('.park-time-id').each(function () {
                park_time_id.push($(this).val());
            });
            var ride = $("#ride-id").val();
            var created_date = $("#created_date").val();

            $.ajax({
                url: "{{ route('admin.updatePreopeningList',['ride_id' => $ride, 'created_date' => $created_date]) }}",
                type: 'POST',
                data:{
                    "_token":"{{ csrf_token() }}",
                    status: status,
                    inspection_list_id: element_id,
                    comment: comment,
                    ride_id: ride_id,
                    park_time_id:park_time_id
                },
                success: function(response)
                {
                    if(response.success){
                    swal({
                         title: "Preopening List Updted successfully",
                         icon: "success",
                         buttons: ["Ok"]
                          }); 
                          window.location.href = "{{route('admin.park_times.index')}}";

                    }else {
                        swal({
                         title: "Preopening List Already Exist !",
                         icon: "danger",
                         buttons: ["Ok"]
                         
                          }); 
                          window.location.href = "{{route('admin.park_times.index')}}";

                    }
                }
            });

        });
    });
    </script>
    @endpush