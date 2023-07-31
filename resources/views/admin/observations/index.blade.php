@extends('admin.layout.app')

@section('title')
Observations
@endsection

@section('content')

    <div class="card-box">

        <div id="datatable-buttons_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
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
                                Date Reported
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1">
                                Snag
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1">
                                Picture
                            </th>

                            <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1">
                                Process
                            </th>
                           <!--  <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1">
                                Date Resolved
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1">
                                Maintenance FeedBack
                            </th><th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1">
                                RF Number
                            </th>
                            </th><th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1">
                                Reported On Tech Sheet
                            </th>
                            </th><th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1">
                                Department
                            </th> -->
                        </tr>
                        </thead>

                        <tbody>

                        @foreach ($items as $item)
                            <tr role="row" class="odd" id="row-{{ $item->id }}">
                                <td tabindex="0" class="sorting_1">{{ $item->id }}</td>
                                <td>{{ $item->ride->name }}</td>
                                <td>{{ $item->date_reported }}</td>
                                <td>{{ $item->snag }}</td>
                                <td>
                                <a >
                                    <img class="img-preview"
                                    src="{{ Storage::disk('s3')->temporaryUrl('images/'.baseName($item->image),now()->addMinutes(30)) }}"
                                    style="height: 40px; width: 40px"></a>
                                </td>

                                <td>
                                    @if(auth()->user()->can('branches-edit'))
                                        <a href="{{ route('admin.observations.edit', $item->id) }}"
                                           class="btn btn-info">Resolve</a>
                                    @endif
                                </td>

                            </tr>

                        @endforeach

                        </tbody>
                    </table>


                </div>
            </div>

        </div>
    </div>


@endsection
@section('footer')
    @include('admin.datatable.scripts')
@endsection



