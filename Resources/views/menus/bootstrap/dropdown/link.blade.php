<li{!! ($linkClass == '') ? '' : (' class="' . $linkClass . '"') !!}>
    <a{!! $attrs !!}>
        @if ($icon != '')
        <i class="{!! $icon !!}"></i>
        @endif
        {!! $title !!}
    </a>
    {!! $submenu !!}
</li>