<{!! $tag . $attrs !!}>
	@if ($badge != '')
	<span class="badge bg-{!! $badgeBg !!}">{!! $badge !!}</span>
	@endif
	@if ($icon != '')
	<i class="{!! $icon !!}"></i>
	@endif
	{!! $content !!}
</{!! $tag !!}>