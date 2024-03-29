{{--@include('admin.common.errors')--}}
<div class="row">

    <div class="col-xs-12 col-sm-12 col-md-12">

        <div class="form-group">



            <div class="row">
                <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap">
                    <thead>
                    <tr role="row">
                        <th class="sorting_asc" tabindex="0" aria-controls="datatable-buttons" rowspan="1"
                            colspan="1" aria-sort="ascending"> Ride OPS report
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
                           Is weather monitoring equipment working correctly?
                           <input type="hidden" name="question[]" class="question" value="Is weather monitoring equipment working correctly?">

                       </td>
                       <td>
                           <label>
                               <select name="answer[]" i
                               d="answer_id" class="form-control answer">
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
                               Number of complaints received?
                               <input type="hidden" name="question[]" class="question" value="Number of complaints received?">

                           </td>
                           <td>
                               <label>
                               <input type="number" name="answer[]" class="answer" value="{{$data['Number of complaints received?']}}">

                               </label>
                                          
                           </td>
                           <td>
                               {!! Form::textArea('comment[]',null, array('class' => 'form-control comment summernote')) !!}

                           </td>
                       </tr>

                       <tr>
                           <td>
                               Any medical assistance required?
                               <input type="hidden" name="question[]" class="question" value="Any medical assistance required?">

                           </td>
                           <td>
                               <label>
                                   <select name="answer[]" id="answer_id" class="form-control answer">
                                       <option disabled> Choose...</option>
                                       @if($data['Any medical assistance required?'] > 0)
                                       <option value="yes">Yes</option>
                                       <option value="no">No</option>
                                       @else
                                       <option value="no">No</option>
                                       <option value="yes">Yes</option>
                                       @endif
                                   </select>
                               </label>
                           </td>
                           <td>
                               {!! Form::textArea('comment[]',null, array('class' => 'form-control comment summernote')) !!}

                           </td>
                       </tr>
                       <tr>
                       <td>
                           How many medical assistance required?
                           <input type="hidden" name="question[]" class="question" value="medical assistance required?">

                       </td>
                       <td>
                           <label>
                               <input type="number" name="answer[]" class="answer" value="{{$data['Any medical assistance required?']}}">
                           </label>
                                      
                       </td>
                       <td>
                           {!! Form::textArea('comment[]',null, array('class' => 'form-control comment summernote')) !!}

                       </td>
                   </tr>
                       <tr>
                           <td>
                               Any issues with ride scanners?
                               <input type="hidden" name="question[]" class="question" value="Any issues with ride scanners?">

                           </td>
                           <td>
                               <label>
                                   <select name="answer[]" id="answer_id" class="form-control answer">
                                       <option disabled> Choose...</option>
                                       <option value="no">No</option>
                                       <option value="yes">Yes</option>
                                   </select>
                               </label>
                           </td>
                           <td>
                               {!! Form::textArea('comment[]',null, array('class' => 'form-control comment summernote')) !!}
                           </td>
                       </tr>
                       <tr>
                           <td>
                               HOE Staff Late?
                               <input type="hidden" name="question[]" class="question" value="HOE Staff Late?">

                           </td>
                           <td>
                               <label>
                                   <select name="answer[]" id="answer_id" class="form-control answer">
                                       <option disabled> Choose...</option>
                                       <option value="no">No</option>
                                       <option value="yes">Yes</option>

                                   </select>
                               </label>
                                          
                           </td>
                           <td>
                               {!! Form::textArea('comment[]',null, array('class' => 'form-control comment summernote')) !!}

                           </td>
                       </tr>

                       <tr>
                           <td>
                               HOE Staff Unavailable
                               <input type="hidden" name="question[]" class="question" value="HOE Staff Unavailable?">

                           </td>
                           <td>
                               <label>
                                   <select name="answer[]" id="answer_id" class="form-control answer">
                                       <option disabled> Choose...</option>
                                       <option value="no">No</option>
                                       <option value="yes">Yes</option>
                                   </select>
                               </label>
                                          
                           </td>
                           <td>
                               {!! Form::textArea('comment[]',null, array('class' => 'form-control comment summernote')) !!}

                           </td>
                       </tr>
                   <tr>
                       <td>
                           How many unavailable rides?
                           <input type="hidden" name="question[]" class="question" value="How many unavailable rides?">

                       </td>
                       <td>
                           <label>
                               <input type="number" name="answer[]" class="answer" value="{{$data['How many unavailable rides?']}}">
                           </label>
                                      
                       </td>
                       <td>
                           {!! Form::textArea('comment[]',null, array('class' => 'form-control comment summernote')) !!}

                       </td>
                   </tr>
                   <tr>
                       <td>
                           How many rides Broke down?
                           <input type="hidden" name="question[]" class="question" value="How many rides Broke down?">

                       </td>
                       <td>
                           <label>
                               <input type="number" name="answer[]" class="answer" value="{{ $data['How many rides Broke down?'] }}">
                           </label>
                                      
                       </td>
                       <td>
                           {!! Form::textArea('comment[]',null, array('class' => 'form-control comment summernote')) !!}

                       </td>
                   </tr>
                   <tr>
                       <td>
                           Total Breakdowns
                           <input type="hidden" name="question[]" class="question" value="Total Breakdowns">

                       </td>
                       <td>
                           <label>
                               <input type="number" name="answer[]" class="answer" value="{{$data['Total Breakdowns']}}">
                           </label>
                                      
                       </td>
                       <td>
                           {!! Form::textArea('comment[]',null, array('class' => 'form-control comment summernote')) !!}

                       </td>
                   </tr>
                   <tr>
                       <td>
                           How many Evacuations?
                           <input type="hidden" name="question[]" class="question" value="How many Evacuations?">

                       </td>
                       <td>
                           <label>
                               <input type="number" name="answer[]" class="answer" value="{{$data['How many Evacuations?']}}">
                           </label>
                                      
                       </td>
                       <td>
                           {!! Form::textArea('comment[]',null, array('class' => 'form-control comment summernote')) !!}

                       </td>
                   </tr>
                   <tr>
                       <td>
                           How many stoppages?
                           <input type="hidden" name="question[]" class="question" value="How many stoppages?">

                       </td>
                       <td>
                           <label>
                               <input type="number" name="answer[]" class="answer" value="{{$data['How many stoppages?'] }}">
                           </label>
                                      
                       </td>
                       <td>
                           {!! Form::textArea('comment[]',null, array('class' => 'form-control comment summernote')) !!}

                       </td>
                   </tr>
                   <tr>
                       <td>
                           How many swipper Issues?
                           <input type="hidden" name="question[]" class="question" value="How many swipper Issues?">

                       </td>
                       <td>
                           <label>
                               <input type="number" name="answer[]" class="answer" value="{{$data['How many swipper Issues?']}}">
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
          
            var park_id = $("#park-id").val();
            var park_time_id = $("#park-time-id").val();
            $.ajax({
                url: "{{ route('admin.ride-ops-reports.store') }}",
                type: 'POST',
                data:{
                    "_token":"{{ csrf_token() }}",
                    answer: answer,
                    question: question,
                    comment: comment,
                    park_id: park_id,
                    park_time_id: park_time_id,
                    ride: ride,
                    issue: issue
                },
                success: function(response)
                {
                    if(response.success){
                    swal({
                         title: "Ride Ops Report Added successfully",
                         icon: "success",
                         buttons: ["Ok"]
                          }); 
                          window.location.href = "{{route('admin.park_times.index')}}";

                    }else {
                        swal({
                         title: "Ride Ops Report Already Exist !",
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
