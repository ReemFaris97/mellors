@if(auth()->user()->can('users-list')|| auth()->user()->can('users-create'))
    <li class="has_sub">
        <a href="javascript:void(0);" class="waves-effect"><i
                    class="zmdi zmdi-collection-text"></i><span>Branches </span> </a>
        <ul class="list-unstyled">
            <li><a href="{{route('admin.branches.index')}}">All Branches</a></li>
            <li><a href="{{route('admin.branches.create')}}">Add New Branch</a></li>

        </ul>
    </li>
@endif
@if(auth()->user()->can('users-list')|| auth()->user()->can('users-create'))
    <li class="has_sub">
        <a href="javascript:void(0);" class="waves-effect"><i
                    class="zmdi zmdi-collection-text"></i><span>Parks </span> </a>
        <ul class="list-unstyled">
            <li><a href="{{route('admin.parks.index')}}">All Parks</a></li>
            <li><a href="{{route('admin.parks.create')}}">Add New Park</a></li>
        </ul>
    </li>
@endif
@if(auth()->user()->can('users-list')|| auth()->user()->can('users-create'))
    <li class="has_sub">
        <a href="javascript:void(0);" class="waves-effect"><i
                    class="zmdi zmdi-collection-text"></i><span>Zones </span> </a>
        <ul class="list-unstyled">
            <li><a href="{{route('admin.zones.index')}}">All Zones</a></li>
            <li><a href="{{route('admin.zones.create')}}">Add New Zone</a></li>

        </ul>
    </li>
@endif
@if(auth()->user()->can('users-list')|| auth()->user()->can('users-create'))
    <li class="has_sub">
        <a href="javascript:void(0);" class="waves-effect"><i
                    class="zmdi zmdi-collection-text"></i><span>Open & Close Time </span> </a>
        <ul class="list-unstyled">
            <li><a href="{{route('admin.park_times.index')}}">All Parks</a></li>
            <li><a href="{{route('admin.park_times.create')}}">Add Park open and close times</a></li>

        </ul>
    </li>@endif
@if(auth()->user()->can('users-list')|| auth()->user()->can('users-create'))
    <li class="has_sub">
        <a href="javascript:void(0);" class="waves-effect"><i
                    class="zmdi zmdi-collection-text"></i><span>Games Category </span> </a>
        <ul class="list-unstyled">
            <li><a href="{{route('admin.game_cats.index')}}">All categories</a></li>
            <li><a href="{{route('admin.game_cats.create')}}">Add new category</a></li>

        </ul>
    </li>
@endif
<li class="has_sub">
    <a href="javascript:void(0);" class="waves-effect"><i
                class="zmdi zmdi-collection-text"></i><span>Games </span> </a>
    <ul class="list-unstyled">
        <li><a href="{{route('admin.games.index')}}">All Games</a></li>
        <li><a href="{{route('admin.games.create')}}">Add new Game</a></li>

    </ul>
</li>
