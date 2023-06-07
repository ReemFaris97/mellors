{{--@include('admin.common.errors')--}}
<div class="row">
<div class="col-sm-12">
                    <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap">
                        <thead>
                        <tr role="row">
                            <th class="sorting_asc" tabindex="0" aria-controls="datatable-buttons" rowspan="1"
                                colspan="1" aria-sort="ascending">ID
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1">
                                Ride
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1">
                            First Status
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1">
                            Second Status
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1">
                            No Of Gondolas
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1">
                            No Of Seats
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1">
                            Comment
                            </th>
                        </tr>
                        </thead>
                   <tbody>
             @foreach ($rides as $item)

             <tr role="row" class="odd" id="row-{{ $item->id }}">
                 <td tabindex="0" class="sorting_1">{{ $item->id }}</td> 
                 <td> {{$item->name}}
                 <input type="hidden" name="ride_id[]" value=" {{$item->id}}" >
                 <input type="hidden" name="park_id[]" value=" {{$item->park_id}}" >
                 </td>
                <td>
                <label>
                    <select name="first_status[]" id="element_id" class="form-control element-id">
                        <option default value="">  </option>
                        <option value="yes">Yes</option>
                        <option value="no">No</option>
                </select>
                </label>
                </td>
                <td><label>
                    <select name="second_status[]" id="element_id" class="form-control element-id" hidden>
                        <option default value="">  </option>
                        <option value="yes">Yes</option>
                        <option value="no">No</option>
                </select>
                </label></td>
                <td> {!! Form::number("no_of_gondolas[]",$item->no_of_gondolas,['class'=>'form-control','placeholder'=>' number_of_gondolas'])!!}</td>
                <td> {!! Form::number("no_of_seats[]",$item->number_of_seats,['class'=>'form-control','placeholder'=>' number_of_seats'])!!}</td>
                <td> {!! Form::textArea("comment[]",null,['class'=>'form-control summernote','placeholder'=>'Comment'])!!}
                </td>

            </tr>
            @endforeach
</tbody>
</table>
</div>

<div class="col-xs-12 aligne-center contentbtn">
    <button class="btn btn-primary waves-effect" type="submit">Save</button>
</div>
</div>
