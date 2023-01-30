<div class="d-inline-flex">
    @can('game_cats-edit')
    <a  href="{{route('admin.game_cats.edit',$id)}}"><button class="btn btn-warning">Edit</button></a>
    @endcan
    @can('game_cats-delete')
    <a onclick=" $('#delete-form-{{$id}}').submit();" ><div class="btn btn-danger">Delete</div></a>
    {!! Form::open(['route'=>['admin.game_cats.destroy',$id],'method'=>'DELETE','id'=>'delete-form-'.$id]) !!}
    {!! Form::close() !!}
        @endcan
</div>
