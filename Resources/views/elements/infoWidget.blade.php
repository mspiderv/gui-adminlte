<div{!! $attrs !!}>
    @if ($icon != '')
	<span class="info-box-icon{!! ( ! isset($bg)) ?: (' bg-'.$bg) !!}">
        <i class="{!! $icon !!}"></i>
    </span>
    @endif
	<div class="info-box-content">
		<span class="info-box-text">{!! $heading !!}</span>
		<span class="info-box-number">{!! $content !!}</span>
	</div>
</div>