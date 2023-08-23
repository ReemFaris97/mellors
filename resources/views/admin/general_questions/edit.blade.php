@extends('admin.layout.app')

@section('title')
    Edit Attraction Audit Check Form
@endsection

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card-box">
                <h4 class="header-title m-t-0 m-b-30"> Edit Attraction Audit Check Form</h4>
                {!! Form::open([
                    'route' => ['admin.update_questions', $id],
                    'class' => 'form phone_validate',
                    'method' => 'Post',
                    'enctype' => 'multipart/form-data',
                    'class' => 'form-horizontal',
                    'files' => true,
                ]) !!}
                @csrf
                <div class="row">

                    <div class="col-xs-12 col-sm-12 col-md-12">

                        <div class="form-group">
                            @if (isset($items) && count($items) > 0)
                                <div class="row">
                                    <table id="datatable-buttons"
                                        class="table table-striped table-bordered dt-responsive nowrap">
                                        <thead>
                                            <tr role="row" class="type-header">
                                                <th style="text-align: center;">Sections</th>
                                                <th>Any Issues?</th>
                                                <th>Comments</th>
                                                <th>Corrective Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $groupedItems = $items->groupBy('question.type');
                                            @endphp

                                            @foreach ($groupedItems as $questionType => $group)
                                                <tr>
                                                    <td colspan="4" class="type-header">
                                                        <strong>Section{{ $loop->iteration }} - {{ $questionType }}</strong>
                                                    </td>
                                                </tr>
                                                @foreach ($group as $value)
                                                    <tr>
                                                        <td>
                                                            {{ $value->question->name ?? '' }}
                                                        </td>
                                                        <td>
                                                            <label>
                                                                <select name="status[]" id="element_id"
                                                                    class="form-control element-id">
                                                                    <option default value=""> None</option>
                                                                    <option value="yes"
                                                                        @if ($value->status == 'yes') selected @endif>
                                                                        Yes</option>
                                                                    <option value="no"
                                                                        @if ($value->status == 'no') selected @endif>No
                                                                    </option>
                                                                </select>
                                                                <input type="hidden" name="question_id[]" class="ele_id"
                                                                    value="{{ $value->general_question_id }}">
                                                            </label>
                                                        </td>
                                                        <td>
                                                            {!! Form::textArea('note[]', $value->note, ['class' => 'form-control comment', 'rows' => '1']) !!}

                                                        </td>
                                                        <td>
                                                            {!! Form::textArea('corrective_action[]', $value->corrective_action, [
                                                                'class' => 'form-control comment',
                                                                'rows' => '1',
                                                            ]) !!}

                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @endforeach

                                        </tbody>
                                    </table>

                                    <div class="col-xs-12 aligne-center contentbtn">
                                        <button class="btn btn-primary save_btn waves-effect" type="submit">Save</button>
                                    </div>
                                </div>
                            @else
                                <label>No questions</label>
                            @endif


                        </div>
                    </div>
                </div> {!! Form::close() !!}
            </div>
        </div><!-- end col -->
    </div>
    <!-- end row -->
@endsection
