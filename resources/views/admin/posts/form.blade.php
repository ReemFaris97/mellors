<div class="form-group">
    <label for="name">description post</label>
    {!! Form::textarea('description',null,['class'=>'form-control','id'=>'name','placeholder'=>'add post  description']) !!}
</div>

@if (isset($post->image))
    <div class="form-group">
        <label for="name">  recent post image</label>
        <a data-fancybox="gallery" href="{{$post->image}}">
            <img src="{{$post->image}}" width="70" height="70"
                 class="img-thumbnail" alt="adv_img">
        </a>
    </div>
@endif

<div class="form-group">
    <label for="name">   post image</label>
            {!! Form::file("image",['class'=>'form-control'])!!}

        </div>
<div class="card-footer">
    <button type="submit" class="btn btn-primary">Submit</button>
</div>
