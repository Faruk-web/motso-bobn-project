
<ul class="navbar-nav">
    <style>
        @media screen and (max-width:1370px) {
                .faruk {
                    font-size:14px!important;
                    margin-top: -3%;
                }
            }
            <style>
                .faruk_h{
                    color:#fff;font-size:20px;
                }
                .other{
                    color:#f1fffb44c;font-size: 20px;
                }
            @media screen and (max-width:700px) {
                    .faruk_h {
                        color:#2777f4;
                    }
                    .topnav .navbar-nav .nav-link i {
                    color: #2777f4!important;
                    }
                }
        </style>
    @hasanyrole('superadmin')
    <li class="nav-item">
        <a href="{{ route('user.dashboard') }}" class="nav-link" >
            <i class="fa fa-home faruk faruk_h"></i>
            <span key="t-dashboards" class="faruk faruk_h">Dashboard</span>
        </a>
    </li>
        <li class="nav-item dropdown">
            <a href="#" class="nav-link" class="faruk faruk_h" >
                <i class="fa fa-tasks faruk"></i>
                <span key="t-dashboards " class="faruk faruk_h other" >Software Setting</span>
                <div class="arrow-down faruk_h"></div>
            </a>
            <div class="dropdown-menu faruk_h" aria-labelledby="topnav-dashboard" style="color:black">
                <a href="{{ route('user.setting.softwaresetting') }}" class="nav-link" style="color:black;font-size: 20px;">
                    <i class="fa fa-check faruk faruk_h"></i>
                    <span key="t-dashboards" >Setting</span>
                </a>
                <a href="{{ route('user.setting.menu') }}" class="nav-link" style="color:black;font-size: 20px;">
                    <i class="fa fa-check faruk faruk_h"></i>
                    <span key="t-dashboards">Menu</span>
                </a>
            </div>
        </li>
    @endhasanyrole
    @hasanyrole('admin')
    <li class="nav-item">
        <a href="{{ route('user.dashboard') }}" class="nav-link faruk_h" style="color:#fff">
            <i class="fa fa-home faruk faruk_h"></i>
            <span key="t-dashboards" class="faruk faruk_h" style="color:#fff;font-size: 20px;">Dashboard</span>
        </a>
    </li>
    @endhasanyrole
    @foreach ($menus as $menu)
        @if (count($menu->Parent) > 0)
            @ucan($menu->Parent->pluck('permission_name')->toArray())
                <x-template::menu-li-h :name="$menu->name" :icon="$menu->icon">
                    <x-slot name="sub">
                        @foreach ($menu->Parent as $sub)
                            @ucan($sub->permission_name, $sub->Module->name)
                                <a href="{{ route($sub->route_name) }}" class="nav-link dropdown-item" key="t-default" style="color:black;font-size: 20px;">
                                    @isset($attributes['icon'])
                                        <i class="{{ $attributes['icon'] }}"></i>
                                    @endisset
                                    <span key="t-default">{{ $sub->name }}</span>
                                </a>
                            @enducan
                        @endforeach
                    </x-slot>
                </x-template::menu-li-h>
            @enducan
        @elseif($menu->route_name)
            @ucan($menu->permission_name, $menu->Module->name)
                <x-template::menu-li-h :route="$menu->route_name" :name="$menu->name" :icon="$menu->icon" />
            @enducan
        @else
            <x-template::menu-li-h :name="$menu->name" :icon="$menu->icon" />
        @endif
    @endforeach
</ul>
