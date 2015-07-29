<div{!! $attrs !!}>
    @if (isset($title) || isset($icon))
    <div class="box-header">
        @if (isset($icon))
        <i class="{!! $icon !!}"></i>
        @endif
        @if (isset($title))
        <h3 class="box-title">{!! $title !!}</h3>
        @endif
        @if ($collapsible)
        <div class="box-tools pull-right">
            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
        </div>
        @endif
    </div>
    @endif
    @if ($body != '')
    <div class="box-body">
        {!! $body !!}
    </div>
    @endif
    @if ($footer != '')
    <div class="box-footer">
        {!! $footer !!}
    </div>
    @endif
</div>