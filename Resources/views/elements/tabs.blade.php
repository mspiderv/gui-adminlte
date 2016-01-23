<div {!! $attrs !!}>
    <ul class="nav nav-tabs{!! $pullRight ? ' pull-right' : '' !!}">
        @if (isset($icon) || isset($title))
        <li class="pull-left header">
            @if (isset($icon))
            <i class="{!! $icon !!}"></i>
            @endif
            {!! $title or '' !!}
        </li>
        @endif
        <?php $i = 1; ?>
        @foreach ($tabs as $tab)
        <li{!! ($active == $i++) ? ' class="active"' : '' !!}><a href="#tab_{!! $tab->getTabId() !!}" data-toggle="tab">{!! $tab->getTitle() !!}</a></li>
        @endforeach
        @if ($tools != '')
        <li class="pull-right">{!! $tools !!}</li>
        @endif
    </ul>
    <div class="tab-content">
        <?php $i = 1; ?>
        @foreach ($tabs as $tab)
        <div class="tab-pane{!! ($active == $i++) ? ' active' : '' !!}" id="tab_{!! $tab->getTabId() !!}">
            {!! $tab->getContent() !!}
        </div>
        @endforeach
    </div>
</div>