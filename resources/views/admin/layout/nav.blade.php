<li class="text-muted menu-title">main Menu</li>

<li>
    <a href="{{route('admin.index')}}" class="waves-effect"><i class="zmdi zmdi-view-dashboard"></i>
        <span>Main Page </span>
    </a>
</li>

  @if(auth()->user()->can('role-list') ||auth()->user()->can('role-create'))
    <li class="has_sub">
        <a href="javascript:void(0);" class="waves-effect"><i class="zmdi zmdi-view-week"></i> <span>Roles and Permissions </span>
            <span class="menu-arrow"></span></a>
        <ul class="list-unstyled">
              @can('role-list')
                <li><a href="{{route('admin.roles.index')}}">All Roles</a></li>
             @endcan
            @can('role-create')
                <li><a href="{{route('admin.roles.create')}}">Add New Role</a></li>
            @endcan
        </ul>
    </li>
@endif

@if(auth()->user()->can('departments-list')|| auth()->user()->can('departments-create'))

  <li class="has_sub">
      <a href="javascript:void(0);" class="waves-effect"><i
              class="zmdi zmdi-view-list"></i><span> Departments </span> <span
              class="menu-arrow"></span></a>
      <ul class="list-unstyled">
                     @can('departments-list')

          <li><a href="{{route('admin.departments.index')}}">All Departments</a></li>
                     @endcan
                         @can('departments-create')

          <li><a href="{{route('admin.departments.create')}}">Add New Department</a></li>
                         @endcan


      </ul>
  </li>
@endif

@if(auth()->user()->can('branches-list')|| auth()->user()->can('branches-create'))
  <li class="has_sub">
      <a href="javascript:void(0);" class="waves-effect"><i
              class="zmdi zmdi-view-list"></i><span>Branches </span> <span class="menu-arrow"></span></a>
      <ul class="list-unstyled">
          <li><a href="{{route('admin.branches.index')}}">All Branches</a></li>
          <li><a href="{{route('admin.branches.create')}}">Add New Branch</a></li>

      </ul>
  </li>
@endif



@if(auth()->user()->can('parks-list')|| auth()->user()->can('parks-create'))
  <li class="has_sub">
      <a href="javascript:void(0);" class="waves-effect"><i
              class="zmdi zmdi-local-parking"></i><span>Parks </span> <span class="menu-arrow"></span></a>
      <ul class="list-unstyled">
          <li><a href="{{route('admin.parks.index')}}">All Parks</a></li>
          <li><a href="{{route('admin.parks.create')}}">Add New Park</a></li>
      </ul>
  </li>
  @endif
@if(auth()->user()->can('inspection_lists-list')|| auth()->user()->can('inspection_lists-create'))
    <li class="has_sub">
        <a href="javascript:void(0);" class="waves-effect"><i
                    class="zmdi zmdi-traffic"></i><span>Ride Inspection Elements </span><span class="menu-arrow"></span></a>
        <ul class="list-unstyled">
            <li><a href="{{route('admin.inspection_lists.index')}}">Add Inspection Elements</a></li>
            <li><a href="{{route('admin.ride_inspection_lists.index')}}">Assign Inspection Elements To Ride</a></li>


        </ul>
    </li>
@endif

@if(auth()->user()->can('zones-list')|| auth()->user()->can('zones-create'))
  <li class="has_sub">
      <a href="javascript:void(0);" class="waves-effect"><i
              class="zmdi zmdi-traffic"></i><span>Zones & Preoppening List </span><span class="menu-arrow"></span></a>
      <ul class="list-unstyled">
          <li><a href="{{route('admin.zones.index')}}">All Zones</a></li>
          <li><a href="{{route('admin.zones.create')}}">Add New Zone</a></li>

      </ul>
  </li>
@endif

@if(auth()->user()->can('users-list')|| auth()->user()->can('users-create'))
    <li class="has_sub">
        <a href="javascript:void(0);" class="waves-effect"><i
                    class="zmdi zmdi-assignment-returned"></i><span> Users </span> <span class="menu-arrow"></span></a>
        <ul class="list-unstyled">
            @can('users-list')
                <li><a href="{{route('admin.users.index')}}">All Users</a></li>
            @endcan
            @can('users-create')
                <li><a href="{{route('admin.users.create')}}">Add New User</a></li>
            @endcan

        </ul>
    </li>
@endif
@if(auth()->user()->can('park_times-list')|| auth()->user()->can('park_times-create'))
    <li class="has_sub">
        <a href="javascript:void(0);" class="waves-effect"><i
                    class="zmdi zmdi-calendar-check"></i><span>Parks Time Slot </span> <span
                    class="menu-arrow"></span></a>
        <ul class="list-unstyled">
            <li><a href="{{route('admin.park_times.index')}}">All Parks</a></li>
            <li><a href="{{route('admin.park_times.create')}}">Add Park Time Slot</a></li>
            {{--<li><a href="{{route('admin.game_times.index')}}">Update Ride open and close times</a></li>--}}

        </ul>
    </li>
@endif
@if(auth()->user()->can('game_cats-list')|| auth()->user()->can('game_cats-create'))
  <li class="has_sub">
      <a href="javascript:void(0);" class="waves-effect"><i
              class="zmdi zmdi-view-list"></i><span>Rides Category </span> <span class="menu-arrow"></span></a>
      <ul class="list-unstyled">
          <li><a href="{{route('admin.game_cats.index')}}">All categories</a></li>
          <li><a href="{{route('admin.game_cats.create')}}">Add new category</a></li>

      </ul>
  </li>
@endif


@if(auth()->user()->can('rides-list')|| auth()->user()->can('rides-create'))

    <li class="has_sub">
        <a href="javascript:void(0);" class="waves-effect"><i
                class="zmdi zmdi-collection-text"></i><span>Stoppages Categories </span> <span class="menu-arrow"></span></a>
        <ul class="list-unstyled">
            <li><a href="{{route('admin.stoppage-category.index')}}"> Stoppage Categories</a></li>
            <li><a href="{{route('admin.stoppage-sub-category.index')}}"> Stoppage sub Categories</a></li>
        </ul>
    </li>
@endif

@if(auth()->user()->can('rides-list')|| auth()->user()->can('rides-create'))

  <li class="has_sub">
  <a href="javascript:void(0);" class="waves-effect"><i
          class="zmdi zmdi-playstation"></i><span>Rides Data </span> <span class="menu-arrow"></span></a>
  <ul class="list-unstyled">
      <li><a href="{{route('admin.rides.index')}}">All Rides</a></li>
  </ul>
</li>
@endif

@if(auth()->user()->can('rides-stoppages-list')|| auth()->user()->can('rides-stoppages-create'))

  <li class="has_sub">
  <a href="javascript:void(0);" class="waves-effect"><i
          class="zmdi zmdi-collection-text"></i><span>Ride Operations </span> <span class="menu-arrow"></span></a>
  <ul class="list-unstyled">
      <li><a href="{{route('admin.rides-stoppages.index')}}"> Rides Stoppages</a></li>
      <li><a href="{{route('admin.rides-cycles.index')}}"> Rides Cycles</a></li>
      <li><a href="{{route('admin.queues.index')}}">Rides Queues</a></li>

  </ul>
</li>
@endif
@if(auth()->user()->can('rsr_reports-list')|| auth()->user()->can('rsr_reports-create'))
    <li class="has_sub">
        <a href="javascript:void(0);" class="waves-effect"><i
                    class="zmdi zmdi-view-list"></i><span>RSR Reports </span> <span class="menu-arrow"></span></a>
        <ul class="list-unstyled">
            @can('rsr_reports-list')
            <li><a href="{{route('admin.rsr_reports.index')}}">All RSR Reports</a></li>
                @endcan
                @can('rsr_reports-list')
                <li><a href="{{route('admin.rsr_reports.create')}}">Add RSR Report Witout Stoppage</a></li>
                @endcan
        </ul>
    </li>
@endif
@if(auth()->user()->can('customer_feedbacks-list')|| auth()->user()->can('customer_feedbacks-create'))

<li class="has_sub">
  <a href="javascript:void(0);" class="waves-effect"><i
              class="zmdi zmdi-collection-text"></i><span>Customer Feedback</span> <span class="menu-arrow"></span></a>
  <ul class="list-unstyled">
      <li><a href="{{route('admin.customer_feedbacks.index')}}"> Show Customer Feedback</a></li>
      <li><a href="{{route('admin.customer_feedbacks.create')}}"> Add Customer Feedback</a></li>

  </ul>
</li>
@endif
@if(auth()->user()->can('rides-list')|| auth()->user()->can('rides-create'))

    <li class="has_sub">
        <a href="javascript:void(0);" class="waves-effect"><i
                class="zmdi zmdi-playstation"></i><span>Reports </span> <span class="menu-arrow"></span></a>
        <ul class="list-unstyled">
            <li><a href="{{route('admin.reports.rideStatus')}}">Ride Availability Report</a></li>
           
            {{--<li><a href="{{route('admin.questions.index')}}"> Reports Questions</a></li>--}}
        </ul>
    </li>
@endif

@if(auth()->user()->can('rides-list')|| auth()->user()->can('rides-create'))

    <li class="has_sub">
        <a href="javascript:void(0);" class="waves-effect"><i
                class="zmdi zmdi-playstation"></i><span>Duty Report </span> <span class="menu-arrow"></span></a>
        <ul class="list-unstyled">
            <li><a href="{{route('admin.health_and_safety_reports.index')}}">Health & safety</a></li>
            <li><a href="{{route('admin.ride-ops-reports.index')}}"> Ride Ops</a></li>
            <li><a href="{{route('admin.maintenance_reports.index')}}"> Maintenance</a></li>
            <li><a href="{{route('admin.tech-reports.index')}}"> Teach Services</a></li>
            <li><a href="{{route('admin.skill_game_reports.index')}}"> Skill Games</a></li>
            <li><a href="{{route('admin.health_and_safety_reports.index')}}"> Duty Summary</a></li>
        </ul>
    </li>
@endif



