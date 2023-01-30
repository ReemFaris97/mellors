<div class="d-inline-flex">
    @can('zones-edit')
    <a  href="{{route('admin.zones.edit',$id)}}"><button class="btn btn-warning">Edit</button></a>
    @endcan
    @can('zones-delete')
    <a onclick=" $('#delete-form-{{$id}}').submit();" ><div class="btn btn-danger">Delete</div></a>
    {!! Form::open(['route'=>['admin.zones.destroy',$id],'method'=>'DELETE','id'=>'delete-form-'.$id]) !!}
    {!! Form::close() !!}
        @endcan
</div>
