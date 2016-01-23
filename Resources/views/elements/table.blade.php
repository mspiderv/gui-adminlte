<table {!! $attrs !!}>
    <thead>
        <tr>
            @foreach($columns as $column)
            <th>{!! $column !!}</th>
            @endforeach
        </tr>
    </thead>
    <tbody>
        {!! $rows !!}
    </tbody>
</table>