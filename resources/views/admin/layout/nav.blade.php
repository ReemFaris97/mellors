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
              class="zmdi zmdi-view-list"></i><span>Users Departments </span> <span
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

@if(auth()->user()->can('park_times-list')|| auth()->user()->can('park_times-create'))
  <li class="has_sub">
      <a href="javascript:void(0);" class="waves-effect"><i
              class="zmdi zmdi-calendar-check"></i><span>Open & Close Time </span> <span
              class="menu-arrow"></span></a>
      <ul class="list-unstyled">
          <li><a href="{{route('admin.park_times.index')}}">All Parks</a></li>
          <li><a href="{{route('admin.park_times.create')}}">Add Park open and close times</a></li>
          {{--<li><a href="{{route('admin.game_times.index')}}">Update Ride open and close times</a></li>--}}

      </ul>
  </li>
@endif
@if(auth()->user()->can('zones-list')|| auth()->user()->can('zones-create'))
  <li class="has_sub">
      <a href="javascript:void(0);" class="waves-effect"><i
              class="zmdi zmdi-traffic"></i><span>Zones </span><span class="menu-arrow"></span></a>
      <ul class="list-unstyled">
          <li><a href="{{route('admin.zones.index')}}">All Zones</a></li>
          <li><a href="{{route('admin.zones.create')}}">Add New Zone</a></li>
          <li><a href="{{route('admin.inspection_lists.index')}}">Zone Inspection Elements</a></li>


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

@if(auth()->user()->can('rides-list')|| auth()->user()->can('rides-create'))

  <li class="has_sub">
  <a href="javascript:void(0);" class="waves-effect"><i
          class="zmdi zmdi-collection-text"></i><span>Ride Operations </span> <span class="menu-arrow"></span></a>
  <ul class="list-unstyled">
      <li><a href="{{route('admin.rides-stoppages.index')}}"> Rides Stoppages</a></li>
      <li><a href="{{route('admin.rides-cycles.index')}}"> Rides Cycles</a></li>
      <li><a href="{{route('admin.queues.create')}}">Add Queues</a></li>
      <li><a href="{{route('admin.queues.index')}}">show Rides Queues</a></li>
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

