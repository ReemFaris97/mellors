<tr>
    <td>
        <input type="file" name="images[{{ $x }}][file]" class="form-control">
    </td>

    <td>
        <input type="text" name="images[{{ $x }}][comment]" class="form-control">

    </td>

    <td>
        <a onclick="$(this).parent().parent().remove();" data-toggle="tooltip" data-original-title="حذف"
           class="btn btn-danger"><i class="fa fa-trash-o"></i></a>
    </td>
</tr>



