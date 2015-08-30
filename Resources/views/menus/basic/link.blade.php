<{!! $tag . (($linkClass == '') ? '' : (' class="' . $linkClass . '"')) !!}>
    <a{!! $attrs !!}>
        @if ($icon != '')
        <i class="{!! $icon !!}"></i>
        @endif
        {!! $titlePrefix !!}
        @if ($linkTitleTag != '')
        <{!! $linkTitleTag . (($linkTitleClass == '') ? '' : (' class="' . $linkTitleClass . '"')) !!}>
        @endif
        {!! $title !!}
        @if ($linkTitleTag != '')
        </{!! $linkTitleTag !!}>
        @endif
        {!! $titleSuffix !!}
    </a>
    {!! $submenu !!}
</{!! $tag !!}>