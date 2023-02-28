{{--@include('admin.common.errors')--}}
<div class="row">

    <div class="col-xs-12 col-sm-12 col-md-12">

        <div class="form-group">



            <div class="row">
                <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap">
                    <thead>
                    <tr role="row">
                        <th class="sorting_asc" tabindex="0" aria-controls="datatable-buttons" rowspan="1"
                            colspan="1" aria-sort="ascending"> Skill games Daily report
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
                           Any HB staff shortages ?
                           <input type="hidden" name="question[]" class="question" value="Any HB staff shortages?">

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
                               HB staff late ?
                               <input type="hidden" name="question[]" class="question" value="HB staff late?">

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
                               HB staff unavailable ?
                               <input type="hidden" name="question[]" class="question" value="Any first aids required for Customers?">

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
                               Any incidents with staff ?
                               <input type="hidden" name="question[]" class="question" value="Any incidents with staff?">

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
                               Any theft ?
                               <input type="hidden" name="question[]" class="question" value="Any theft?">

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
                               Any Card reader issues ?
                               <input type="hidden" name="question[]" class="question" value="Any Card reader issues?">

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
                           How Many ?
                           <input type="hidden" name="question[]" class="question" value="How Many Card reader issues?">

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
                                Any Credit card issues  ?
                               <input type="hidden" name="question[]" class="question" value="Any Credit card issues?">

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
                           How Many ?
                           <input type="hidden" name="question[]" class="question" value="How Many Credit card issues?">

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
                               Any complaints received ?
                               <input type="hidden" name="question[]" class="question" value="Any complaints received?">

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
                           How Many complaints received ?
                           <input type="hidden" name="question[]" class="question" value="How Many complaints received?">

                       </td>
                       <td>
                           {{$complaints}}
                           <input type="hidden" name="answer[]" class="answer" value="{{$complaints}}">
                       </td>
                       <td>
                           {!! Form::textArea('comment[]',null, array('class' => 'form-control comment summernote')) !!}

                       </td>
                   </tr>

                       <tr>
                           <td>
                               Any uniform issues ?
                               <input type="hidden" name="question[]" class="question" value="Any uniform issues?">

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
                               Additionl comments ( hows the day been ? Any isssues / Observations? ) ?
                               <input type="hidden" name="question[]" class="question" value="Additionl comments ( hows the day been ? Any isssues / Observations? )?">

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

            $.ajax({
                url: "{{ route('admin.skill_game_reports.store') }}",
                type: 'POST',
                data:{
                    "_token":"{{ csrf_token() }}",
                    answer: answer,
                    question: question,
                    comment: comment
                },
                success: function(response)
                {
                    if(response.success){
                        alert('Skill Games Report Added successfully');
                    }else {
                        console.log('error');
                    }

                }
            });

        });
    });
    </script>
    @endpush