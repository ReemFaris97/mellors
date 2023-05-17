{{--@include('admin.common.errors')--}}
<div class="row">

    <div class="col-xs-12 col-sm-12 col-md-12">

        <div class="form-group">

            <div class="row">
                <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap">
                    <thead>
                    <tr role="row">
                        <th class="sorting_asc" tabindex="0" aria-controls="datatable-buttons" rowspan="1"
                            colspan="1" aria-sort="ascending"> Questions
                        </th>
                        <th class="sorting_asc" tabindex="0" aria-controls="datatable-buttons" rowspan="1"
                            colspan="1" aria-sort="ascending">Answer
                        </th>
                        <th class="sorting_asc" tabindex="0" aria-controls="datatable-buttons" rowspan="1"
                            colspan="1" aria-sort="ascending">Comments
                        </th>
                   </thead>
                   <tbody>
                   <tr>
                       <td>
                           Was ride availabilty reports submitted on time?
                           <input type="hidden" name="question[]" class="question" value="Was ride availabilty reports submitted on time?">

                       </td>
                       <td>
                           <label>
                               <select name="answer[]" id="answer_id" class="form-control answer">
                                   <option disabled> Choose...</option>
                                   <option value="yes">Yes</option>
                                   <option value="no">No</option>
                               </select>
                           </label>
                                      
                       </td>
                       <td>
                           {!! Form::textArea('comment[]',null, array('class' => 'form-control comment summernote')) !!}

                       </td>
                   </tr>
                       <tr>
                           <td>
                               How many RSR's submitted today?
                               <input type="hidden" name="question[]" class="question" value="How many RSR submitted today?">

                           </td>
                           <td>
                               <label>
                                   <input type="number" name="answer[]" class="answer" value="{{$data['rsr_count']}}">
                               </label>
                                          
                           </td>
                           <td>
                               {!! Form::textArea('comment[]',null, array('class' => 'form-control comment summernote')) !!}

                           </td>
                       </tr>

                       <tr>
                           <td>
                               How many rides down all day?
                               <input type="hidden" name="question[]" class="question" value="How many rides down all day?">

                           </td>
                           <td>
                               <label>
                                   <input type="number" name="answer[]" class="answer" value="{{$data['ride_down_all_day']}}">
                               </label>
                                          
                           </td>
                           <td>
                               {!! Form::textArea('comment[]',null, array('class' => 'form-control comment summernote')) !!}

                           </td>
                       </tr>
                       <tr>
                           <td>
                               How many rides are down due to maintenance?
                               <input type="hidden" name="question[]" class="question" value="How many rides are down due to maintenance?">

                           </td>
                           <td>
                               <label>
                                   <input type="number" name="answer[]" class="answer" value="{{$data['ride_due_to_maintenance']}}">
                               </label>
                                          
                           </td>
                           <td>
                               {!! Form::textArea('comment[]',null, array('class' => 'form-control comment summernote')) !!}

                           </td>
                       </tr>
                       <tr>
                           <td>
                               How many rides are down due to awaiting parts?
                               <input type="hidden" name="question[]" class="question" value="How many rides are down due to awaiting parts?">

                           </td>
                           <td>
                               <label>
                                   <input type="number" name="answer[]" class="answer" value="">
                               </label>
                                          
                           </td>
                           <td>
                               {!! Form::textArea('comment[]',null, array('class' => 'form-control comment summernote')) !!}

                           </td>
                       </tr>

                       <tr>
                           <td>
                               How many rides awaiting on approvals?
                               <input type="hidden" name="question[]" class="question" value="How many rides awaiting on approvals?">

                           </td>
                           <td>
                               <label>
                                   <input type="number" name="answer[]" class="answer" value="">
                               </label>
                                          
                           </td>
                           <td>
                               {!! Form::textArea('comment[]',null, array('class' => 'form-control comment summernote')) !!}

                           </td>
                       </tr>
                   <tr>
                       <td>
                           How many rides have delayed opening?
                           <input type="hidden" name="question[]" class="question" value="How many rides have delayed opening?">

                       </td>
                       <td>
                           <label>
                               <input type="number" name="answer[]" class="answer" value="">
                           </label>
                                      
                       </td>
                       <td>
                           {!! Form::textArea('comment[]',null, array('class' => 'form-control comment summernote')) !!}
                           <input type="hidden" name="park_id[]" id="park-id" value="{{$park_id}}">
                       <input type="hidden" name="park_time_id[]" id="park-time-id" value="{{$park_time_id}}">


                       </td>
                   </tr>
                   <tr>
                        <td colspan="4" tabindex=" 0" class="sorting_1 redflagTd">
                            <h3>Red Flags</h3>
                        </td>
                        </tr>
                        <tr>
                           <td>
                             1
                           </td>
                           <td>
                               <label>
                               {!! Form::text('ride[]',null, array('class' => 'form-control ride')) !!}
                               </label>
                           </td>
                           <td>
                           {!! Form::textArea('issue[]',null, array('class' => 'form-control issue summernote')) !!}

                           </td>
                       </tr>
                       <tr>
                           <td>
                             2
                           </td>
                           <td>
                               <label>
                               {!! Form::text('ride[]',null, array('class' => 'form-control ride')) !!}
                               </label>
                           </td>
                           <td>
                           {!! Form::textArea('issue[]',null, array('class' => 'form-control issue summernote')) !!}

                           </td>
                       </tr>
                       <tr>
                           <td>
                             3
                           </td>
                           <td>
                               <label>
                               {!! Form::text('ride[]',null, array('class' => 'form-control ride')) !!}
                               </label>
                           </td>
                           <td>
                           {!! Form::textArea('issue[]',null, array('class' => 'form-control issue summernote')) !!}

                           </td>
                       </tr>
                       <tr>
                           <td>
                             4
                           </td>
                           <td>
                               <label>
                               {!! Form::text('ride[]',null, array('class' => 'form-control ride')) !!}
                               </label>
                           </td>
                           <td>
                           {!! Form::textArea('issue[]',null, array('class' => 'form-control issue summernote')) !!}

                           </td>
                       </tr>
                       <tr>
                           <td>
                             5
                           </td>
                           <td>
                               <label>
                               {!! Form::text('ride[]',null, array('class' => 'form-control ride')) !!}
                               </label>
                           </td>
                           <td>
                           {!! Form::textArea('issue[]',null, array('class' => 'form-control issue summernote')) !!}

                           </td>
                       </tr>
                


                   </tbody>
               </table>

               <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap">
                    <thead>
                    <tr>
                    <td colspan="4" tabindex=" 0" class="sorting_1 redflagTd">
                            <h3>Rides Dwon</h3>
                        </td>
                    </tr>
                    <tr role="row">
                       
                        <th class="sorting_asc" tabindex="0" aria-controls="datatable-buttons" rowspan="1"
                            colspan="1" aria-sort="ascending"> Rides 
                        </th>
                        <th class="sorting_asc" tabindex="0" aria-controls="datatable-buttons" rowspan="1"
                            colspan="1" aria-sort="ascending">Is Down ?
                        </th>
                        <th class="sorting_asc" tabindex="0" aria-controls="datatable-buttons" rowspan="1"
                            colspan="1" aria-sort="ascending">Date Expected Open
                        </th>
                        <th class="sorting_asc" tabindex="0" aria-controls="datatable-buttons" rowspan="1"
                            colspan="1" aria-sort="ascending">Lead Name
                        </th>
                        <th class="sorting_asc" tabindex="0" aria-controls="datatable-buttons" rowspan="1"
                            colspan="1" aria-sort="ascending">Comments
                        </th>
                   </thead>
                   <tbody>
                   @foreach ($rides_down as $item)
                            <tr role="row" class="odd" id="row-{{ $item->id }}">
                            
                           <td>
                           {{$item->name }}
                               <input type="hidden" name="ride_down_id[]" class="ride-down-id" value="{{ $item->id }}">

                           </td>
                           <td>
                          <label>
                                   <select name="is_down[]" id="is_down" class="form-control is-down">
                                       <option disabled> Choose...</option>
                                       <option value="no">No</option>
                                       <option value="yes">Yes</option>
                                   </select>
                               
                                </label>
                           </td>
                           <td>
                               <label>
                               {!! Form::date('date_expected_open[]',null, array('class' => 'form-control date-expected-open')) !!}
                               </label>
                           </td>
                           <td>
                               {!! Form::text('lead_name[]',null, array('class' => 'form-control lead-name')) !!}
                           </td>
                           <td>
                               {!! Form::textArea('ride_down_comment[]',null, array('class' => 'form-control ride-down-comment summernote')) !!}
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
            const question = [];
            const comment = [];
            const answer = [];
            const ride = [];
            const issue = [];
            const ride_down_id = [];
            const is_down = [];
            const lead_name = [];
            const date = [];
            const ride_down_comment = [];
           
            $('.answer').each(function () {
                if($(this).change){
                    answer.push($(this).val());

                }
            });
            $('.question').each(function () {
                question.push($(this).val());
            });

            $('.comment').each(function () {
                comment.push($(this).val());
            });
            $('.ride').each(function () {
                ride.push($(this).val());
            });
            $('.issue').each(function () {
                issue.push($(this).val());
            });
            $('.ride-down-id').each(function () {
                ride_down_id.push($(this).val());
            });
            $('.is-down').each(function () {
                is_down.push($(this).val());
            });
            $('.date-expected-open').each(function () {
                date.push($(this).val());
            });
            $('.lead-name').each(function () {
                lead_name.push($(this).val());
            });
            $('.ride-down-comment').each(function () {
                ride_down_comment.push($(this).val());
            });
            var park_id = $("#park-id").val();
            var park_time_id = $("#park-time-id").val();
            $.ajax({
                url: "{{ route('admin.tech-reports.store') }}",
                type: 'POST',
                data:{
                    "_token":"{{ csrf_token() }}",
                    answer: answer,
                    question: question,
                    comment: comment,
                    park_id: park_id,
                    park_time_id: park_time_id,
                    ride: ride,
                    issue: issue,
                    ride_down_id: ride_down_id,
                    is_down: is_down,
                    date: date,
                    ride_down_comment: ride_down_comment,
                    lead_name: lead_name

                },
                success: function(response)
                {
                    if(response.success){
                    swal({
                         title: "Tech Report Added successfully",
                         icon: "success",
                         buttons: ["Ok"]
                          }); 
                          window.location.href = "{{route('admin.park_times.index')}}";

                    }else {
                        swal({
                         title: "Tech Report Already Exist !",
                         icon: "danger",
                         buttons: ["Ok"],
                         
                          }); 
                          window.location.href = "{{route('admin.park_times.index')}}";

                    }

                }
            });

        });
    });
    </script>
    @endpush
