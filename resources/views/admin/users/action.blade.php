<div class="d-inline-flex">
    @can('user-edit')
        <a href="{{route('admin.users.edit',$id)}}">
            <button class="btn btn-warning">Edit</button>
        </a>
    @endcan
    @can('user-delete')
        <a onclick=" $('#delete-form-{{$id}}').submit();">
            <div class="btn btn-danger">Delete</div>
        </a>
        {!! Form::open(['route'=>['admin.users.destroy',$id],'method'=>'DELETE','id'=>'delete-form-'.$id]) !!}
        {!! Form::close() !!}
    @endcan
</div>
