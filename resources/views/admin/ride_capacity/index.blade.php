@extends('admin.layout.app')

@section('title')
    Ride Capacity
@endsection

@section('content')

    <div class="card-box">
        <div class="card-box">
            <form class="formSection" action="{{ url('/ride_capacity/') }}" method="GET">

                <div class="row">
                    <div class='col-md-5'>
                        <div class="form-group">
                            <label for="last_name">Select Ride</label>
                            {!! Form::select('ride_id', $rides, null, [
                                'class' => 'form-control park',
                                'id' => 'Ride',
                                'placeholder' => 'Choose Ride',
                            ]) !!}
                        </div>
                    </div>
                    <div class='col-md-2 mtButton'>
                        <div class="input-group-btn">
                            <button type="submit" class="btn btn-primary save_btn waves-effect">Show</button>
                        </div>
                    </div>
                </div>
                {!! Form::close() !!}
        </div>
        <br><br>
        <div id="datatable-buttons_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
            <div class="row">
                <div class="col-sm-12">
                    <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap">
                        <thead>
                            <tr role="row">
                                <th class="sorting_asc" tabindex="0" aria-controls="datatable-buttons" rowspan="1"
                                    colspan="1" aria-sort="ascending">ID
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1"
                                    colspan="1">
                                    Ride
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1"
                                    colspan="1">
                                    Availabilty Capacity
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1"
                                    colspan="1">
                                    Preopening checkList Capacity
                                </th>

                                <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1"
                                    colspan="1">
                                    Final Capacity
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1"
                                    colspan="1">
                                    Date
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1"
                                    colspan="1">
                                    Process
                                </th>
                            </tr>
                        </thead>

                        <tbody>
                            @if (isset($items))
                                @foreach ($items as $item)
                                    <tr role="row" class="odd" id="row-{{ $item->id }}">
                                        <td tabindex="0" class="sorting_1">{{ $loop->iteration }}</td>
                                        <td>{{ $item->ride->name ?? '' }}</td>
                                        <td>{{ $item->ride_availablity_capacity ?? 'Not yet' }}</td>

                                        <td>
                                            {{ $item->preopening_capacity ?? 'Not yet' }}
                                        </td>
                                        <td>
                                            {{ $item->final_capacity ?? 'Not yet' }}
                                        </td>
                                        {{-- <td>{{ $item->created_by->name ??''}}</td> --}}
                                        <td>{{ $item->date }}</td>
                                        {!! Form::open([
                                            'route' => ['admin.rsr_reports.destroy', $item->id],
                                            'id' => 'delete-form' . $item->id,
                                            'method' => 'Delete',
                                        ]) !!}
                                        {!! Form::close() !!}
                                        <td>
                                            @php
                                                $final = $item->final_capacity;
                                                $id = $item->id;
                                          @endphp
                                            @if ($item->preopening_capacity)
                                                <button type="button" class="btn btn-primary final_capacity"
                                                    data-toggle="modal" data-target="#exampleModal"
                                                    onclick="myFunction('{{ $final }}','{{ $id }}')">
                                                    Update Final Capacity
                                                </button>
                                            @else
                                                Not Yet
                                            @endif
                                        </td>

                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="">
                    <h5 class="modal-title" id="exampleModalLabel">Update Capacity</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('admin.rideCapacity.update') }}" method="post">
                    @csrf
                    <div class="modal-body">
                        <label>Final Capacity</label>
                        <input type="number" name="final_capacity" value="" id="capacity" class="form-control">
                        <input type="hidden" name="id" id="capacity_id">
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        function myFunction(capacity, id) {

            $('#capacity_id').val(id);
            $('#capacity').val(capacity);
        }
    </script>
@endpush

@section('footer')
    @include('admin.datatable.scripts')
@endsection
