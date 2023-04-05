<div>
    <li class="menu-title" key="t-menu">Menu</li>
    <li>
        <a href="{{ route('user.dashboard') }}" class="waves-effect">
            <i class="fa fa-home"></i>
            <span key="t-dashboards">Dashboard</span>
        </a>
    </li>
    @hasanyrole('superadmin')
    <li class="nav-item dropdown">
        <a href="#" class="nav-link">
            <i class="fa fa-tasks"></i>
            <span key="t-dashboards">Softawer Setting</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="topnav-dashboard">
            <a href="{{ route('user.setting.softwaresetting') }}" class="nav-link">
                <i class="fa fa-check"></i>
                <span key="t-dashboards">Setting</span>
            </a>
            <a href="{{ route('user.setting.menu') }}" class="nav-link">
                <i class="fa fa-check"></i>
                <span key="t-dashboards">Menu</span>
            </a>
        </div>
    </li>
    @endhasanyrole
    @foreach ($menus as $menu)
        @if (count($menu->Parent) > 0)
            @ucan($menu->Parent->pluck('permission_name')->toArray())
                <x-template::menu-li :name="$menu->name" :icon="$menu->icon">
                    <x-slot name="sub">
                        @foreach ($menu->Parent as $sub)
                            @ucan($sub->permission_name, $sub->Module->name)
                                <x-template::menu-li :route="$sub->route_name" :name="$sub->name" :icon="$sub->icon" />
                            @enducan
                        @endforeach
                    </x-slot>
                </x-template::menu-li>
            @enducan
        @elseif($menu->route_name)
            @ucan($menu->permission_name, $menu->Module->name)
                <x-template::menu-li :route="$menu->route_name" :name="$menu->name" :icon="$menu->icon" />
            @enducan
        @else
            <x-template::menu-li :name="$menu->name" :icon="$menu->icon" />
        @endif
    @endforeach
</div>
