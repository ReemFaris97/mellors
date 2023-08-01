@extends('admin.layout.app')

@section('title')
    all notifications
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
                                    colspan="1" aria-sort="ascending">No.
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1"
                                    colspan="1">
                                    Message
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1"
                                    colspan="1">
                                    Date
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (isset($notifications))
                                @foreach ($notifications as $item)
                                    <tr role="row" class="odd" id="row-{{ $item->id }}">
                                        <td tabindex="0" class="sorting_1">{{ $loop->iteration }}</td>
                                        <td>{{  data_get($item->data, 'title')  }}</td>
                                        <td>  {{ $item->created_at }}
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
@endsection


@section('footer')
    @include('admin.datatable.scripts')
@endsection
