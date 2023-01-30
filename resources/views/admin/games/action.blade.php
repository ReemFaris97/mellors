<div class="d-inline-flex">
    @can('games-edit')
    <a  href="{{route('admin.games.edit',$id)}}"><button class="btn btn-warning">Edit</button></a>
    @endcan
    @can('games-delete')
    <a onclick=" $('#delete-form-{{$id}}').submit();" ><div class="btn btn-danger">Delete</div></a>
    {!! Form::open(['route'=>['admin.games.destroy',$id],'method'=>'DELETE','id'=>'delete-form-'.$id]) !!}
    {!! Form::close() !!}
        @endcan
</div>
