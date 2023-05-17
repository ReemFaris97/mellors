@extends('admin.layout.app')

@section('Update','Update  Ride Ops Report')

@section('content')
{!!Form::open( ['route' => 'admin.updateRideOps' ,'class'=>'form phone_validate', 'method' => 'Post', 'enctype'=>"multipart/form-data",'class'=>'form-horizontal','files' => true]) !!}
                        @csrf
    <div class="row">
        <div class="col-sm-12">
            <div class="card-box">
                <h4 class="header-title m-t-0 m-b-30">Update  Ride Ops Report</h4>
                <a class="input-group-btn" href="{{route('admin.park_times.index')}}">
                    <button type="button" class="btn waves-effect waves-light btn-primary">back</button>
                </a>
            <div class="row">
            <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap">
                <thead>
                <tr role="row">
                    <th class="sorting_asc" tabindex="0" aria-controls="datatable-buttons" rowspan="1"
                        colspan="1" aria-sort="ascending"> Ride Ops Daily Report
                    </th>
                    <th class="sorting_asc" tabindex="0" aria-controls="datatable-buttons" rowspan="1"
                        colspan="1" aria-sort="ascending">Answer
                    </th>
                    <th class="sorting_asc" tabindex="0" aria-controls="datatable-buttons" rowspan="1"
                        colspan="1" aria-sort="ascending">Comments
                    </th>
               </thead>
               <tbody>
               @if(isset($items))
                        @foreach ($items as $item)
                   <tr>
                       <td>
                           {{$item->question}}
                           <input type="hidden" name="question[]" class="question" value="{{$item->question}}">

                       </td>
                       <td>
                      <label>
                      @if($item->answer ==='yes' || $item->answer ==='no')
                        <label>
                         <select name="answer[]" id="answer_id" class="form-control answer">
                                @if($item->answer =='yes')
                                <option value="yes">Yes</option>
                                <option value="no">No</option>
                                @else
                                <option value="no">No</option>
                                <option value="yes">Yes</option>
                                @endif
                         </select>                                         
                        @else
                          <input type="number" name="answer[]" class="answer" value="{{$item->answer}}">
                      @endif
                        </label>
                                 
                       </td>
                       <td>
                           {!! Form::textArea('comment[]',$item->comment, array('class' => 'form-control comment summernote')) !!}
                       </td>
                   </tr>
                   @endforeach
                @endif
                   <tr>
                        <td colspan="4" tabindex=" 0" class="sorting_1 redflagTd">
                            <h3>Red Flags</h3>
                        </td>
                        </tr>
                        @if(isset($redFlags))
                        @foreach ($redFlags as $item)
                        <tr>
                           <td>
                           {{ $loop->iteration }}
                           </td>
                           <td>
                               <label>
                               {!! Form::text('ride[]',$item->ride, array('class' => 'form-control ride')) !!}
                               </label>
                           </td>
                           <td>
                           {!! Form::textArea('issue[]',$item->issue, array('class' => 'form-control issue summernote')) !!}

                           </td>
                       </tr>
                       @endforeach
                       @endif
                       <tr>
                           <td>
                             *
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
                             *
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
                             *
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
                             *
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
                   <input type="hidden" name="park_time_id" id="park-time-id" value="{{$park_time_id}}">
               </tbody>
            </table>
            
            </div>
            <button class="btn btn-primary waves-effect" type="submit">Save</button>
            {!!Form::close() !!}

        </div><!-- end col -->
    </div>
    <!-- end row -->
@endsection
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
            
            var park_time_id = $("#park-time-id").val();
            $.ajax({
                url: "{{ route('admin.updateRideOps') }}",
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
                         title: "Ride Ops Report Updated successfully",
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
