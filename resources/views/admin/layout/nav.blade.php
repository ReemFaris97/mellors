<li class="text-muted menu-title">main Menu</li>

<li>
    <a href="{{ route('admin.index') }}" class="waves-effect"><i class="zmdi zmdi-view-dashboard"></i>
        <span>Main Page </span>
    </a>
</li>
@if (!auth()->user()->hasRole('Client'))
    <li>
        <a href="{{ route('admin.statistics') }}" class="waves-effect"><i class="zmdi zmdi-view-dashboard"></i>
            <span>Statistics </span>
        </a>
    </li>
@endif

@if (auth()->user()->can('role-list') ||
        auth()->user()->can('role-create'))
    <li class="has_sub">
        <a href="javascript:void(0);" class="waves-effect"><i class="zmdi zmdi-view-week"></i> <span>Roles and Permissions
            </span>
            <span class="menu-arrow"></span></a>
        <ul class="list-unstyled">
            @can('role-list')
                <li><a href="{{ route('admin.roles.index') }}">All Roles</a></li>
            @endcan
            @can('role-create')
                <li><a href="{{ route('admin.roles.create') }}">Add New Role</a></li>
            @endcan
        </ul>
    </li>
@endif

@if (auth()->user()->can('departments-list') ||
        auth()->user()->can('departments-create'))
    <li class="has_sub">
        <a href="javascript:void(0);" class="waves-effect"><i class="zmdi zmdi-view-list"></i><span> Departments </span>
            <span class="menu-arrow"></span></a>
        <ul class="list-unstyled">
            @can('departments-list')
                <li><a href="{{ route('admin.departments.index') }}">All Departments</a></li>
            @endcan
            @can('departments-create')
                <li><a href="{{ route('admin.departments.create') }}">Add New Department</a></li>
            @endcan


        </ul>
    </li>
@endif

@if (auth()->user()->can('branches-list') ||
        auth()->user()->can('branches-create'))
    <li class="has_sub">
        <a href="javascript:void(0);" class="waves-effect"><i class="fa-solid fa-code-branch"></i><span>Branches </span>
            <span class="menu-arrow"></span></a>
        <ul class="list-unstyled">
            @can('branches-list')
                <li><a href="{{ route('admin.branches.index') }}">All Branches</a></li>
            @endcan
            @can('branches-create')
                <li><a href="{{ route('admin.branches.create') }}">Add New Branch</a></li>
            @endcan

        </ul>
    </li>
@endif



@if (auth()->user()->can('parks-list') ||
        auth()->user()->can('parks-create'))
    <li class="has_sub">
        <a href="javascript:void(0);" class="waves-effect"><i class="zmdi zmdi-local-parking"></i><span>Parks </span>
            <span class="menu-arrow"></span></a>
        <ul class="list-unstyled">
            @can('parks-list')
                <li><a href="{{ route('admin.parks.index') }}">All Parks</a></li>
            @endcan
            @can('parks-create')
                <li><a href="{{ route('admin.parks.create') }}">Add New Park</a></li>
            @endcan

        </ul>
    </li>
@endif
@if (auth()->user()->can('inspection_lists-list') ||
        auth()->user()->can('inspection_lists-create'))
    <li class="has_sub">
        <a href="javascript:void(0);" class="waves-effect"><i class="zmdi zmdi-traffic"></i><span>Ride Inspection
                Elements
            </span><span class="menu-arrow"></span></a>
        <ul class="list-unstyled">
            @can('inspection_lists-list')
                <li><a href="{{ route('admin.inspection_lists.index') }}">Add Inspection Elements</a></li>
            @endcan
            @can('inspection_lists-create')
                <li><a href="{{ route('admin.ride_inspection_lists.index') }}">Assign Inspection Elements To Ride</a></li>
            @endcan

        </ul>
    </li>
@endif

@if (auth()->user()->can('zones-list') ||
        auth()->user()->can('zones-create'))
    <li class="has_sub">
        <a href="javascript:void(0);" class="waves-effect"><i class="fa-solid fa-list"></i><span>Zones
            </span><span class="menu-arrow"></span></a>
        <ul class="list-unstyled">
            @can('zones-list')
                <li><a href="{{ route('admin.zones.index') }}">All Zones</a></li>
            @endcan
            @can('zones-create')
                <li><a href="{{ route('admin.zones.create') }}">Add New Zone</a></li>
            @endcan

        </ul>
    </li>
@endif

@if (auth()->user()->can('users-list') ||
        auth()->user()->can('users-create'))
    <li class="has_sub">
        <a href="javascript:void(0);" class="waves-effect"><i class="fa-solid fa-users"></i><span> Users </span>
            <span class="menu-arrow"></span></a>
        <ul class="list-unstyled">
            @can('users-list')
                <li><a href="{{ route('admin.users.index') }}">All Users</a></li>
            @endcan
            @can('users-create')
                <li><a href="{{ route('admin.users.create') }}">Add New User</a></li>
            @endcan

        </ul>
    </li>
@endif
@if (auth()->user()->can('park_times-list') ||
        auth()->user()->can('park_times-create'))
    <li class="has_sub">
        <a href="javascript:void(0);" class="waves-effect"><i class="fa-regular fa-clock"></i><span>Parks Time Slot
            </span> <span class="menu-arrow"></span></a>
        <ul class="list-unstyled">
            @can('park_times-list')
                <li><a href="{{ route('admin.park_times.index') }}">All Parks Time Slot</a></li>
            @endcan
            @can('park_times-create')
                <li><a href="{{ route('admin.park_times.create') }}">Add Time Slot</a></li>
            @endcan

        </ul>
    </li>
@endif
@if (auth()->user()->can('ride_types-list') ||
        auth()->user()->can('ride_types-create'))
    <li class="has_sub">
        <a href="javascript:void(0);" class="waves-effect"><i class="zmdi zmdi-view-list"></i><span>Ride Types </span>
            <span class="menu-arrow"></span></a>
        <ul class="list-unstyled">
            @can('ride_types-list')
                <li><a href="{{ route('admin.ride_types.index') }}">All Ride Types</a></li>
            @endcan
            @can('ride_types-create')
                <li><a href="{{ route('admin.ride_types.create') }}">Add Ride Type</a></li>
            @endcan

        </ul>
    </li>
@endif


@if (auth()->user()->can('stoppage-category-list') ||
        auth()->user()->can('stoppage-category-create'))
    <li class="has_sub">
        <a href="javascript:void(0);" class="waves-effect"><i class="zmdi zmdi-collection-text"></i><span>Stoppages
                Categories </span> <span class="menu-arrow"></span></a>
        <ul class="list-unstyled">
            @can('stoppage-category-list')
                <li><a href="{{ route('admin.stoppage-category.index') }}"> Stoppage Categories</a></li>
            @endcan
            @can('stoppage-category-create')
                <li><a href="{{ route('admin.stoppage-sub-category.index') }}"> Stoppage Sub Categories</a></li>
            @endcan

        </ul>
    </li>
@endif

@if (auth()->user()->can('rides-list') ||
        auth()->user()->can('rides-create'))
    <li class="has_sub">
        <a href="javascript:void(0);" class="waves-effect"><i class="fa-solid fa-database"></i><span>Rides </span>
            <span class="menu-arrow"></span></a>
        <ul class="list-unstyled">
            @can('rides-list')
                <li><a href="{{ route('admin.rides.index') }}">All Rides</a></li>
            @endcan
            @can('rides-create')
                <li><a href="{{ route('admin.rides.create') }}">Add New Rides</a></li>
            @endcan

        </ul>
    </li>
@endif

@if (auth()->user()->can('uploadStoppagesExcleFile') ||
        auth()->user()->can('uploadQueueExcleFile') ||
        auth()->user()->can('uploadCycleExcleFile'))
    <li class="has_sub">
        <a href="javascript:void(0);" class="waves-effect"><i class="zmdi zmdi-collection-text"></i><span>Upload Rides
                Operations
            </span> <span class="menu-arrow"></span></a>
        <ul class="list-unstyled">
            <!--   <li><a href="{{ route('admin.rides-stoppages.index') }}"> Rides Stoppages</a></li>
        <li><a href="{{ route('admin.rides-cycles.index') }}"> Rides Cycles</a></li>
        <li><a href="{{ route('admin.queues.index') }}">Rides Queues</a></li> -->
            @can('uploadStoppagesExcleFile')
                <li><a href="{{ route('admin.rides-stoppages.create') }}"> Upload Stoppages</a></li>
            @endcan
            @can('uploadCycleExcleFile')
                <li><a href="{{ route('admin.rides-cycles.create') }}"> Upload Cycles</a></li>
            @endcan
            @can('uploadQueueExcleFile')
                <li><a href="{{ route('admin.queues.create') }}">Upload Queues</a></li>
            @endcan

        </ul>
    </li>
@endif
@if (auth()->user()->can('rsr_reports-list') ||
        auth()->user()->can('rsr_reports-create'))
    <li class="has_sub">
        <a href="javascript:void(0);" class="waves-effect"><i class="zmdi zmdi-collection-text"></i><span>RSR Reports
            </span>
            <span class="menu-arrow"></span></a>
        <ul class="list-unstyled">
            @can('rsr_reports-list')
                <li><a href="{{ route('admin.rsr_reports.index') }}">All RSR Reports</a></li>
            @endcan
            @can('rsr_reports-create')
                <li><a href="{{ route('admin.rsr_reports.create') }}">Add RSR Report Witout Stoppage</a></li>
            @endcan
        </ul>
    </li>
@endif
@if (auth()->user()->can('rsr_reports-list') ||
        auth()->user()->can('rsr_reports-create'))
    <li class="has_sub">
        <a href="javascript:void(0);" class="waves-effect"><i class="zmdi zmdi-collection-text"></i><span>Availability Reports
            </span>
            <span class="menu-arrow"></span></a>
        <ul class="list-unstyled">
            @can('rsr_reports-list')
                <li><a href="{{ route('admin.availability_reports.all') }}">All Ride availability Reports</a></li>
            @endcan
            @can('rsr_reports-create')
                <li><a href="{{ route('admin.parks.index') }}">Add Ride availability Report</a></li>
            @endcan
        </ul>
    </li>
@endif
@if (auth()->user()->can('customer_feedbacks-list') ||
        auth()->user()->can('customer_feedbacks-create'))
    <li class="has_sub">
        <a href="javascript:void(0);" class="waves-effect"><i class="fa-solid fa-comment-dots"></i><span>Customer
                Feedback</span> <span class="menu-arrow"></span></a>
        <ul class="list-unstyled">
            @can('customer_feedbacks-list')
                <li><a href="{{ route('admin.customer_feedbacks.index') }}"> Show Customer Feedback</a></li>
            @endcan
            @can('customer_feedbacks-create')
                <li><a href="{{ route('admin.customer_feedbacks.create') }}"> Add Customer Feedback</a></li>
            @endcan

        </ul>
    </li>
@endif

@if (auth()->user()->can('customer_feedbacks-list') ||
        auth()->user()->can('customer_feedbacks-create'))
    <li class="has_sub">
        <a href="javascript:void(0);" class="waves-effect"><i class="fas fa-tools"></i><span>Maintenance
            </span> <span class="menu-arrow"></span></a>
        <ul class="list-unstyled">
            @can('customer_feedbacks-list')
                <li><a href="{{ route('admin.observations.index') }}"> Show Observations</a></li>
            @endcan 

        </ul>
    </li>
@endif

@if (auth()->user()->can('accidents-list') ||
        auth()->user()->can('accidents-create'))
    <li class="has_sub">
        <a href="javascript:void(0);" class="waves-effect"><i class="glyphicon glyphicon-heart"></i><span>Health & Safety
            </span> <span class="menu-arrow"></span></a>
        <ul class="list-unstyled">
            @can('accidents-list')
            <li><a href="{{ route('admin.incident.index') }}">Accident & Incident</a></li>
            <li><a href="{{ route('admin.investigation.index') }}">Investigation Incident</a></li>
            @endcan 
        </ul>
    </li>
@endif
@if (auth()->user()->can('duty-report-list') ||
        auth()->user()->can('stoppagesReport') ||
        auth()->user()->can('inspectionListReport') ||
        auth()->user()->can('rideStatus') || auth()->user()->hasRole('Client'))
    <li class="has_sub">
        <a href="javascript:void(0);" class="waves-effect"><i class="fa-regular fa-folder-open"></i><span>Reports
            </span>
            <span class="menu-arrow"></span></a>
        <ul class="list-unstyled">
            @if (auth()->user()->can('duty-report-list') || auth()->user()->hasRole('Client'))

                <li><a href="{{ route('admin.duty-report.index') }}">Duty Report</a></li>
            @endif
            @can('stoppagesReport')
                <li><a href="{{ route('admin.reports.stoppagesReport') }}">Stoppages Report</a></li>
            @endcan
            @can('inspectionListReport')
            <li><a href="{{ route('admin.reports.inspectionListReport') }}">Inspection Lists Report</a></li>
            <li><a href="{{ route('admin.reports.auditReport') }}">Attraction Audit Check Report</a></li>
            @endcan
            @can('duty-report-list')
                <li><a href="{{ route('admin.reports.operatorTimeReport') }}">Operator Time Report</a></li>
            @endcan
            @can('rideStatus')
                <li><a href="{{ route('admin.availability_reports.index') }}">Ride Availability Report</a></li>
            @endcan
            @if (!auth()->user()->hasRole('Client'))
            <li><a href="{{ route('admin.reports.observationReport') }}">Observation Report</a></li>
            @endif
            @if(auth()->user()->hasRole('Health & Safety Manager') || auth()->user()->hasRole('Super Admin')||
            auth()->user()->hasRole('Park Admin') || auth()->user()->hasRole('Branch Admin'))
             <li><a href="{{ route('admin.reports.incidentReport') }}">Health & Safety Report</a></li>
            @endif

        </ul>
    </li>
@endif
