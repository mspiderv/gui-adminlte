<select{!! $attributes !!}>
	@foreach ($items as $item)
	@if ($item->type == "option")
	<option value="{!! $item->value !!}"{!! $item->selected ? ' selected' : '' !!}>{!! $item->text !!}</option>
	@else
	<optgroup label="{!! $item->groupName !!}">
	@foreach ($item->items as $item)
	<option value="{!! $item->value !!}"{!! $item->selected ? ' selected' : '' !!}>{!! $item->text !!}</option>
	@endforeach
	</optgroup>
	@endif
	@endforeach
</select>