<div class="box-group" id="accordion_{!! $accordionId !!}">
    <?php $i = 1; ?>
    @foreach ($collapsibles as $collapsible)
    <div class="panel box box-{!! $collapsible->getState() !!}">
        <div class="box-header">
            <h4 class="box-title">
                <a data-toggle="collapse" data-parent="#accordion_{!! $accordionId !!}" href="#collapsible_{!! $collapsible->getCollapsibleId() !!}">
                    {!! $collapsible->getTitle() !!}
                </a>
            </h4>
        </div>
        <div id="collapsible_{!! $collapsible->getCollapsibleId() !!}" class="panel-collapse collapse{!! ($active == $i++) ? ' in' : '' !!}">
            <div class="box-body">
                {!! $collapsible->getContent() !!}
            </div>
        </div>
    </div>
    @endforeach
</div>