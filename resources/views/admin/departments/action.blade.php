<div class="d-inline-flex">
    @can('departments-edit')
    <a  href="{{route('admin.departments.edit',$id)}}"><button class="btn btn-warning">Edit</button></a>
    @endcan
    @can('departments-delete')
    <a onclick=" $('#delete-form-{{$id}}').submit();" ><div class="btn btn-danger">Delete</div></a>
    {!! Form::open(['route'=>['admin.departments.destroy',$id],'method'=>'DELETE','id'=>'delete-form-'.$id]) !!}
    {!! Form::close() !!}
        @endcan
</div>
