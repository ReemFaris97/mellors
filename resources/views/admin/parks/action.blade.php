<div class="d-inline-flex">
    @can('parks-edit')
    <a  href="{{route('admin.parks.edit',$id)}}"><button class="btn btn-warning">Edit</button></a>
    @endcan
    @can('parks-delete')
    <a onclick=" $('#delete-form-{{$id}}').submit();" ><div class="btn btn-danger">Delete</div></a>
    {!! Form::open(['route'=>['admin.parks.destroy',$id],'method'=>'DELETE','id'=>'delete-form-'.$id]) !!}
    {!! Form::close() !!}
        @endcan
</div>
