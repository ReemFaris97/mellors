{{--@include('admin.common.errors')--}}
<div class="row">

    <div class="col-xs-12 col-sm-12 col-md-12">

        <div class="form-group">



            <div class="row">
                <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap">
                    <thead>
                    <tr role="row">
                        <th class="sorting_asc" tabindex="0" aria-controls="datatable-buttons" rowspan="1"
                            colspan="1" aria-sort="ascending"> Health and Safety Daily report
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
                               How many incident reports were created ?
                               <input type="hidden" name="question[]" class="question" value="How many incident reports were created?">

                           </td>
                           <td>
                          <label>
                              {{$incidents}}
                              <input type="hidden" name="answer[]" class="answer" value="{{$incidents}}">
                          </label>
                           </td>
                           <td>
                               {!! Form::textArea('comment[]',null, array('class' => 'form-control comment summernote')) !!}

                           </td>
                       </tr>

                       <tr>
                           <td>
                               How many witness statements were taken ?
                               <input type="hidden" name="question[]" class="question" value="How many witness statements were taken?">

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
                               How many near misses/accidents were reported ?
                               <input type="hidden" name="question[]" class="question" value="How many near misses/accidents were reported?">

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
                               Any first aids required for Staff ?
                               <input type="hidden" name="question[]" class="question" value="Any first aids required for Staff?">

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
                               Any first aids required for Customers ?
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
                               Have we had any abnormal evacuations? (time, medics etc)?
                               <input type="hidden" name="question[]" class="question" value="Have we had any abnormal evacuations? (time, medics etc)?">

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
                               HSE Obsevation report completed ?
                               <input type="hidden" name="question[]" class="question" value="HSE Obsevation report completed?">

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
                               Any regulatory bodies visited the site i.e. police , ambulance , EHO etc ?
                               <input type="hidden" name="question[]" class="question" value="Any regulatory bodies visited the site i.e. police , ambulance , EHO etc?">

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
                               Has TUV undertaken any equipment inspections (harness, chains etc) or any assessments on plant been done ?
                               <input type="hidden" name="question[]" class="question"
                                      value="Has TUV undertaken any equipment inspections (harness, chains etc) or any assessments on plant been done?">

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
                               Has the information above been stored and uploaded to the server ?
                               <input type="hidden" name="question[]" class="question" value="Has the information above been stored and uploaded to the server?">

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
                               Any trip or fall hazard reported ?
                               <input type="hidden" name="question[]" class="question" value="Any trip or fall hazard reported?">

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
                               Any report of ill heath (COVID 19) etc?
                               <input type="hidden" name="question[]" class="question" value="Any report of ill heath (COVID 19) etc?">

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
                               Do we require any medical supplies for the first aid bags ?
                               <input type="hidden" name="question[]" class="question" value="Do we require any medical supplies for the first aid bags?">

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
                               How many permits have been completed ?
                               <input type="hidden" name="question[]" class="question" value="How many permits have been completed?">

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
                               Staff team on duty including times :
                               <input type="hidden" name="question[]" class="question" value="Staff team on duty including times:">

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
                               Any training/toolbox talks undertaken with the staff ?
                               <input type="hidden" name="question[]" class="question" value="Any training/toolbox talks undertaken with the staff?">

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
                               Was any training programmes undertaken ?
                               <input type="hidden" name="question[]" class="question" value="Was any training programmes undertaken?">

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
                               How many staff were trained (training programmes) ?
                               <input type="hidden" name="question[]" class="question" value="How many staff were trained (training programmes)?">

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
                               Has the training been inputed into the LMS system (Frog) ?
                               <input type="hidden" name="question[]" class="question" value="Has the training been inputed into the LMS system (Frog)?">

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
                               How many Competency Assessments were undertaken ?
                               <input type="hidden" name="question[]" class="question" value="How many Competency Assessments were undertaken?">

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
                               Additional comments :
                               <input type="hidden" name="question[]" class="question" value="Additional comments:">

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
                url: "{{ route('admin.health_and_safety_reports.store') }}",
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
                        alert('Health And Safety Report Added successfully');
                    }else {
                        console.log('error');
                    }

                }
            });

        });
    });
    </script>
    @endpush