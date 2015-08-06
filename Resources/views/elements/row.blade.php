<div {!! $attrs !!}>
    @for ($i = 0; $i < $count; $i++)
    <div class="{!! $cols[$i] !!}">
        @foreach ($elements[$i] as $element)
        {!! $element->render() !!}
        @endforeach
    </div>
    @endfor
</div>