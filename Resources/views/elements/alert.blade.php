<div {!! $attrs !!}>

	@if ($dismissable)
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    @endif

    <h4>
	    @if ($icon != '')
	    <i class="icon {!! $icon !!}"></i>
	    @endif

        {!! $content !!}
    </h4>

    @if ($description != '')
    <p>{!! $description !!}</p>
    @endif

</div>