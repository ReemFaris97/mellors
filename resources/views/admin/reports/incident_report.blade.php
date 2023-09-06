@extends('admin.layout.app')

@section('title')
Health & Safety Report
@endsection

@section('content')

    <div class="card-box">
    <form class="formSection" action="{{url('/show-incident-report/')}}" method="GET">
            @csrf
        <div class="row">
    <div class='col-md-5'>
        <div class="form-group">
            <label for="last_name">Select Park</label>
            {!! Form::select('park_id',$parks,null, array('class' => 'form-control park','id'=>'park','placeholder'=>'Choose Park') ) !!}
        </div>
    </div>
    <div class='col-md-5'>
        <div class="form-group">
            <label for="last_name">Select Report Type (Optional)</label>
            <select name="type"  class="form-control ">
                <option value="" > Choose...</option>
                <option value="incident">Incident /Accident QMS-F-13 </option>
                <option value="investigation">Incident Investigation QMS-F-14</option>
            </select>
        </div>
    </div>

    <div class='col-md-5'>
        <div class="form-group">
            <label for="middle_name">Time Slot Date From </label>
            {!! Form::date('from',null,['class'=>'form-control','id'=>'date']) !!}
        </div>
    </div> 
    <div class='col-md-5'>
        <div class="form-group">
            <label for="middle_name">Time Slot Date To </label>
            {!! Form::date('to',null,['class'=>'form-control','id'=>'date']) !!}
        </div>
    </div>
    <div class='col-md-2 mtButton'>
        <div class="input-group-btn">
            <button type="submit" class="btn btn-primary save_btn waves-effect">Show</button>
        </div>
    </div>
</div>
            {!!Form::close() !!}
    </div>
    @if(isset($items))

        <br><br>
        <div id="datatable-buttons_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
            <div class="row">
                                 
                    <div class="col-xs-12">
                    <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap">
                        <thead>
                            <tr role="row">
                                <th class="sorting_asc" tabindex="0" aria-controls="datatable-buttons" rowspan="1"
                                    colspan="1" aria-sort="ascending">ID
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1"
                                    colspan="1">
                                    Location
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1"
                                    colspan="1">
                                    Date
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1"
                                    colspan="1">
                                    Report Type 
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1"
                                colspan="1">
                                Witness statement
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1"
                                    colspan="1">
                                    Status
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1"
                                    colspan="1">
                                    Show /Print
                                </th>
                            </tr>
                        </thead>

                        <tbody>

                            @foreach ($items as $item)
                                <tr role="row" class="odd" id="row-{{ $item->id }}">
                                    <td tabindex="0" class="sorting_1">{{ $item->id }}</td>
                                    <td>{{ $item->park->name }} / {{ $item->ride->name ?? $item->text }} </td>
                                    <td>{{ $item->date }}</td>
                                    <td>{{ $item->type =='incident' ? 'Incident /Accident QMS-F-13' :'Incident Investigation QMS-F-14' }}</td>
                                    <td>
                                        <a href="{{ url('show_statment/' . $item->id) }}"
                                           class="btn btn-primary"><i class="fa fa-plus"></i>  Witness Statment </a>
                                      </td>
                                    @if(auth()->user()->hasRole('Health & Safety Manager') || auth()->user()->hasRole('Super Admin')||
                                     auth()->user()->hasRole('Park Admin') || auth()->user()->hasRole('Branch Admin'))
                                    <td>
                                        @if($item->status=='pending')
                                        <a href="{{url('investigation/'.$item->id.'/approve')}}"
                                        class="btn btn-xs btn-danger"><i class="fa fa-check"></i> Approve</a>
                                        @endif
                                        @if($item->status=='approved')
                                          <span>Verified</span>
                                        @endif
                                    </td>
                                    @endif
                                    <td>
                                        @if ($item->type =='incident')
                                        <a href="{{ route('admin.incident.show', $item->id) }}" class="btn btn-info">show</a>
                                        @else
                                        <a href="{{ route('admin.investigation.show', $item->id) }}" class="btn btn-info">show</a>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>

                    </div>
                </div>
            </div>
        @endif
    </div>
@endsection
@push('scripts')

<script type="text/javascript">
    $("#park").change(function() {
        $.ajax({
            url: "{{ route('admin.getParkRides') }}?park_id=" + $(this).val(),
            method: 'GET',
            success: function(data) {
                $('#ride').html(data.html);
            }
        });
    });
</script>
@endpush
@section('footer')
    @include('admin.datatable.scripts')
@endsection




