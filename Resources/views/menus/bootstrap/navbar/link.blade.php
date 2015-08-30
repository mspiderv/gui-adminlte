<li{!! ($linkClass == '') ? '' : (' class="' . $linkClass . '"') !!}>
    <a{!! $attrs !!}>
        @if ($icon != '')
        <i class="{!! $icon !!}"></i>
        @endif
        {!! $title . $titleSuffix !!}
    </a>
    {!! $submenu !!}
</li>