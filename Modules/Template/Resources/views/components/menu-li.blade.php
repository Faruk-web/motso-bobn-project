<li>
    <a  href="@isset($attributes['route']) {{route($attributes['route'])}} @else javascript: void(0);@endisset" class="@isset($sub) has-arrow @endisset waves-effect">
        @isset($attributes['icon']) <i class="{{$attributes['icon']}}"></i> @endisset
        @isset($attributes['badge'])<span class="badge rounded-pill bg-success float-end" key="t-new">{{$attributes['badge']}}</span>@endisset
        <span key="t-file-manager">{{$attributes['name']}}</span>
    </a>
    @isset($sub)
        <ul class="sub-menu" aria-expanded="false">
            {{$sub}}
        </ul>
    @endisset
</li>
