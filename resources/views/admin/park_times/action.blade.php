<div class="d-inline-flex">
    @can('park_times-edit')
    <a  href="{{route('admin.park_times.edit',$id)}}"><button class="btn btn-warning">Edit</button></a>
    @endcan
    @can('park_times-delete')
    <a onclick=" $('#delete-form-{{$id}}').submit();" ><div class="btn btn-danger">Delete</div></a>
    {!! Form::open(['route'=>['admin.park_times.destroy',$id],'method'=>'DELETE','id'=>'delete-form-'.$id]) !!}
    {!! Form::close() !!}
        @endcan
</div>
