@extends('admin.layout.app')

@section('title')
  Show Customer Feedback
@endsection

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card-box">
                <h4 class="header-title m-t-0 m-b-30"> Show Customer Feedback</h4>

                <div class="col-xs-12">
                    <div class="form-group form-float">
                        <label class="form-label">Ride :{{$items->rides->name}}</label>
                    </div>

                    <div class="form-group form-float">
                        <label class="form-label">Type :{{$items->type}}</label>
                    </div>
                    <div class="form-group form-float">
                        <label class="form-label">Comment :</label>
                        <p>{!! $items->comment !!}</p>
                    </div>
                </div>
                <div class="form-group">
                    @if (isset($images))
                        <div class="form-group">
                            <label class="form-label">Images :</label>
                            <div class="form-line row">
                                @foreach ($images as $item)
                                    <div class="col-sm-3">
                                        <div class="flex-img">
                                            <a download href="{{ url('../storage/app/public/'.$item->image)}}">
                                                <img class="img-preview"
                                                     src="{{ url('../storage/app/public/'.$item->image) }}" style="height: 200px; width: 200px"></a>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif
                </div>

            </div>
        </div><!-- end col -->
    </div>
    <!-- end row -->
@endsection

