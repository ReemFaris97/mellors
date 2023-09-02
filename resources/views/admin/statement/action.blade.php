<div class="d-inline-flex">
    @can('branches-edit')
    <a  href="{{route('admin.branches.edit',$id)}}"><button class="btn btn-warning">Edit</button></a>
    @endcan
    @can('branches-delete')
    <a onclick=" $('#delete-form-{{$id}}').submit();" ><div class="btn btn-danger">Delete</div></a>
    {!! Form::open(['route'=>['admin.branches.destroy',$id],'method'=>'DELETE','id'=>'delete-form-'.$id]) !!}
    {!! Form::close() !!}
        @endcan
</div>
