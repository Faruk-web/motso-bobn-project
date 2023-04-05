
<li class="nav-item dropdown">
    <style>
        .faruk{
            color:#fff;font-size: 20px;
        }
        @media screen and (max-width:700px) {
                .faruk {
                    color:#2777f4;
                }
                .topnav .navbar-nav .nav-link i {
                    color: #2777f4!important;
                    }
            }
    </style>
    <a href="@isset($attributes['route']) {{ route($attributes['route']) }} @else#@endisset"
        class="nav-link @isset($sub) dropdown-toggle arrow-none @endisset faruk">
        @isset($attributes['icon'])
            <i class="{{ $attributes['icon'] }}"></i>
        @endisset
        @isset($attributes['badge'])
            <span class="badge rounded-pill bg-success float-end faruk" key="t-new">{{ $attributes['badge'] }}</span>
        @endisset
        <span key="t-file-manager" class="faruk" >{{ $attributes['name'] }}</span>
        @isset($sub)
            <div class="arrow-down" class="faruk" ></div>
        @endisset
    </a>
    @isset($sub)
        <div class="dropdown-menu faruk" aria-labelledby="topnav-dashboard" >
            {{ $sub }}
        </div>
    @endisset
</li>
