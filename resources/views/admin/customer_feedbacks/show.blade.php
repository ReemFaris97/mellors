@extends('admin.layout.app')

@section('title')
Show Customer Feedback
@endsection

@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="card-box">
            <h4 class="header-title m-t-0 m-b-30"> Show Customer Feedback</h4>
            <div class='row'>
                <div class="col-xs-12 col-md-6">
                    <div class="form-group form-float">
                        <span class='title bold'>Ride :</span>
                        <span class='textTitle'>{{$items->rides->name}}</span>
                        <!-- <label class="form-label"></label> -->
                    </div>
                </div>
                <div class="col-xs-12 col-md-6">
                    <span class='title bold'>Type :</span>
                    <span class='textTitle'>{{$items->type}}</span>
                </div>


            </div>
            <div class="form-group form-float">
                <span class="title  bold form-label">Customer Feedback :</span>
                <div class='contentP-comment'>
                    <p class='p-comment'>{!! ( $items->complaint_id != null )? $items->complaint->name : $items->comment !!}
                    </p>
                </div>

            </div>
            <div class="form-group form-float">
                <span class="title  bold form-label">Park :</span>
                <div class='contentP-comment'>
                    <p class='p-comment'>{{ $items->rides->park->name }}</p>
                </div>

            </div>
            <div class="form-group form-float">
                <span class="title  bold form-label">Zone :</span>
                <div class='contentP-comment'>
                    <p class='p-comment'>{{ $items->rides->zone->name }}</p>
                </div>

            </div>
            <div class="form-group">
                @if (isset($images))
                <div class="form-group">
                    <label class=" bold title">Images :</label>
                    <div class="form-line row">
                        @foreach ($images as $item)
                        <div class="col-sm-3">
                            <div class="flex-img">
                                <a >
                                <img class="img-preview" src="{{ Storage::disk('s3')->temporaryUrl('images/'.baseName($item->image),now()->addMinutes(30)) }}"
                                    style="height: 300px; width: 300px"></a>
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