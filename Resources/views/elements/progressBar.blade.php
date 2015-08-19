<div class="progress {!! $size !!} {!! ($striped) ? ' progress-striped' : '' !!}{!! ($active) ? ' active' : '' !!}{!! ($vertical) ? ' vertical' : '' !!}">
    <div class="progress-bar progress-bar-{!! $state !!}" role="progressbar" aria-valuenow="{!! $value !!}" aria-valuemin="{!! $min !!}" aria-valuemax="{!! $max !!}" style="{!! $vertical ? 'height' : 'width' !!}: {!! $percents !!}%">
        <span class="sr-only">{!! $percents !!}%</span>
    </div>
</div>