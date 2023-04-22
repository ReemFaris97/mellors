@extends('admin.layout.app')

@section('Update','update Health And Safety Report')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card-box">
                <h4 class="header-title m-t-0 m-b-30">Update Health And Safety Report</h4>
                <a class="input-group-btn" href="{{route('admin.health_and_safety_reports.index')}}">
                    <button type="button" class="btn waves-effect waves-light btn-primary">back</button>
                </a>
                {!!Form::model($item , ['route' => ['admin.health_and_safety_reports.update' , $item->id] ,
                     'method' => 'PATCH','enctype'=>"multipart/form-data",'files' => true,'id'=>'form']) !!}
                <div class="row">
                                  
                    <div class="col-xs-12">
                        <div class="form-group form-float">
                            <label class="form-label">Question</label>
                            <div class="form-line">
                                {!! Form::text("question",null,['class'=>'form-control'])!!}
                                @error('question')
                                <div class="invalid-feedback" style="color: #ef1010">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="col-xs-12">
                        <div class="form-group form-float">
                            <label class="form-label">Answer</label>
                            <div class="form-line">
                                {!! Form::text("answer",null,['class'=>'form-control'])!!}
                                @error('answer')
                                <div class="invalid-feedback" style="color: #ef1010">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12">
                        <div class="form-group form-float">
                            <label class="form-label">Comment</label>
                            <div class="form-line">
                                {!! Form::textArea("comment",null,['class'=>'form-control summernote','placeholder'=>'Comment'])!!}
                                @error('comment')
                                <div class="invalid-feedback" style="color: #ef1010">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12">
                        <div class="form-group form-float">
                            <label class="form-label">Date</label>
                            <div class="form-line">
                                {!! Form::date("date",null,['class'=>'form-control'])!!}
                                @error('date')
                                <div class="invalid-feedback" style="color: #ef1010">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="park_id" value="{{$item->park_id}}">
                    <input type="hidden" name="park_time_id" value="{{$item->park_time_id}}">
                    <div class="col-xs-12 aligne-center contentbtn">
                    <button class="btn btn-primary waves-effect" type="submit">Save</button>
                    </div>
                    </div>
                                        
                    {!!Form::close() !!}
            </div>
        </div><!-- end col -->
    </div>
    <!-- end row -->
@endsection

