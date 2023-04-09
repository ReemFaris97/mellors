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
                           <label>
                          <select name="color[]" id="color_id" class="form-control color">
                                       <option disabled> Choose...</option>
                                       <option value="yes" style="background-color: green;" >green</option>
                                       <option value="no" style="background-color: red;">red</option>
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
                               <input type="hidden" name="question[]" class="question" value="How many RSR's submitted today?">

                           </td>
                           <td>
                               <label>
                                   <input type="number" name="answer[]" class="answer" value="{{$data['rsr_count']}}">
                               </label>
                               <label>
                          <select name="color[]" id="color_id" class="form-control color">
                                       <option disabled> Choose...</option>
                                       <option value="yes" style="background-color: green;" >green</option>
                                       <option value="no" style="background-color: red;">red</option>
                                   </select>
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
                               <label>
                          <select name="color[]" id="color_id" class="form-control color">
                                       <option disabled> Choose...</option>
                                       <option value="yes" style="background-color: green;" >green</option>
                                       <option value="no" style="background-color: red;">red</option>
                                   </select>
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
                               <label>
                          <select name="color[]" id="color_id" class="form-control color">
                                       <option disabled> Choose...</option>
                                       <option value="yes" style="background-color: green;" >green</option>
                                       <option value="no" style="background-color: red;">red</option>
                                   </select>
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
                               <label>
                          <select name="color[]" id="color_id" class="form-control color">
                                       <option disabled> Choose...</option>
                                       <option value="yes" style="background-color: green;" >green</option>
                                       <option value="no" style="background-color: red;">red</option>
                                   </select>
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
                               <label>
                          <select name="color[]" id="color_id" class="form-control color">
                                       <option disabled> Choose...</option>
                                       <option value="yes" style="background-color: green;" >green</option>
                                       <option value="no" style="background-color: red;">red</option>
                                   </select>
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
                           <label>
                          <select name="color[]" id="color_id" class="form-control color">
                                       <option disabled> Choose...</option>
                                       <option value="yes" style="background-color: green;" >green</option>
                                       <option value="no" style="background-color: red;">red</option>
                                   </select>
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
            const color = [];
           

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
            $('.color').each(function () {
                color.push($(this).val());
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
                    color: color

                },
                success: function(response)
                {
                    if(response.success){
                        alert('Tech Report Added successfully');
                    }else {
                        alert('Tech Report Report Already Exist !');

                        console.log('error');
                    }

                }
            });

        });
    });
    </script>
    @endpush
