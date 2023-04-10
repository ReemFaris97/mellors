{{--@include('admin.common.errors')--}}
<div class="row">

    <div class="col-xs-12 col-sm-12 col-md-12">

        <div class="form-group">
            <div class="row">
                <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap">
                    <thead>
                    <tr role="row">
                        <th class="sorting_asc" tabindex="0" aria-controls="datatable-buttons" rowspan="1"
                            colspan="1" aria-sort="ascending">Maintenance Daily report
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
                       Are all rides working for operations?
                           <input type="hidden" name="question[]" class="question" value="Are all rides working for operations?">

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
                           Any concerns found during routine maintenace ?
                               <input type="hidden" name="question[]" class="question" value="Any concerns found during routine maintenace?">

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
                           Any new routine preventative maintenance checks added to Opera ?
                               <input type="hidden" name="question[]" class="question" value="Any new routine preventative maintenance checks added to Opera?">

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
                           Any issues with Maintenance App ?
                               <input type="hidden" name="question[]" class="question" value="Any issues with Maintenance App?">

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
                           Any evacuations during operation ?
                               <input type="hidden" name="question[]" class="question" value="Any evacuations during operation?">

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
                               Additionl comments  ?
                               <input type="hidden" name="question[]" class="question" value="Additionl comments?">

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
                           <input type="hidden" name="park_id[]" id="park-id" value="{{$park_id}}">
                       <input type="hidden" name="park_time_id[]" id="park-time-id" value="{{$park_time_id}}">

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
                            <h3>Ride status</h3>
                        </td>
                    </tr>
                    <tr role="row">
                       
                        <th class="sorting_asc" tabindex="0" aria-controls="datatable-buttons" rowspan="1"
                            colspan="1" aria-sort="ascending">Ride
                        </th>
                        <th class="sorting_asc" tabindex="0" aria-controls="datatable-buttons" rowspan="1"
                            colspan="1" aria-sort="ascending">Status
                        </th>
                        <th class="sorting_asc" tabindex="0" aria-controls="datatable-buttons" rowspan="1"
                            colspan="1" aria-sort="ascending">Comments
                        </th>
                   </thead>
                   <tbody>
                   @foreach ($rides as $item)
                            <tr role="row" class="odd" id="row-{{ $item->id }}">
                            
                           <td>
                           {{$item->name }}
                               <input type="hidden" name="ride_id[]" class="ride-id" value="{{ $item->id }}">

                           </td>
                           <td>
                          <label>
                          {!! Form::text('status[]',null, array('class' => 'form-control status')) !!}
                          </label>
                           </td>
                           <td>
                               {!! Form::textArea('ride_comment[]',null, array('class' => 'form-control ride-comment summernote')) !!}

                           </td>
                       </tr>
                        @endforeach

                   </tbody>
               </table>
               </div>
    
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
            const ride_id = [];
            const status =[];
            const ride_comment =[];
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

            $('.ride-id').each(function () {
                ride_id.push($(this).val());
            });
            $('.status').each(function () {
                status.push($(this).val());
            });
            $('.ride-comment').each(function () {
                ride_comment.push($(this).val());
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
                url: "{{ route('admin.maintenance_reports.store') }}",
                type: 'POST',
                data:{
                    "_token":"{{ csrf_token() }}",
                    answer: answer,
                    question: question,
                    comment: comment,

                    ride_id: ride_id,
                    status: status,
                    ride_comment: ride_comment,
                
                    park_id: park_id,
                    park_time_id: park_time_id,
                    ride: ride,
                    issue: issue,
                    color: color

                },
                success: function(response)
                {
                    if(response.success){
                        alert('Maintenance Report Added successfully');
                    }else {
                        alert('Maintenance Report Already Exist !');

                        console.log('error');
                    }

                }
            });

        });
    });
    </script>
    @endpush