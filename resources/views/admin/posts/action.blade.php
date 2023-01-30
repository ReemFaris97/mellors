<div class="d-inline-flex">
    @can('post-edit')
    <a  href="{{route('admin.posts.edit',$id)}}"><button class="btn btn-warning">Edit</button></a>
    @endcan
    @can('post-delete')
    <a onclick=" $('#delete-form-{{$id}}').submit();" ><div class="btn btn-danger">Delete</div></a>
    {!! Form::open(['route'=>['admin.posts.destroy',$id],'method'=>'DELETE','id'=>'delete-form-'.$id]) !!}
    {!! Form::close() !!}
        @endcan
</div>
