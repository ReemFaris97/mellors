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
                               <input type="hidden" name="question[]" class="question" value="How many RSR's submitted today?">

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
                    park_time_id: park_time_id
                },
                success: function(response)
                {
                    if(response.success){
                        alert('Tech Report Added successfully');
                    }else {
                        console.log('error');
                    }

                }
            });

        });
    });
    </script>
    @endpush
