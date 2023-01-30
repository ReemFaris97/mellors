<div class="d-inline-flex">
    @can('role-edit')
    <a  href="{{route('admin.roles.edit',$id)}}"><button class="btn btn-warning">Edit</button></a>
    @endcan
    @can('role-delete')
    <a onclick=" $('#delete-form-{{$id}}').submit();" ><div class="btn btn-danger">Delete</div></a>
    {!! Form::open(['route'=>['admin.roles.destroy',$id],'method'=>'DELETE','id'=>'delete-form-'.$id]) !!}
    {!! Form::close() !!}
        @endcan
</div>
