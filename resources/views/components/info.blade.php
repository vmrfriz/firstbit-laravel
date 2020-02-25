@if ($info ?? false)
<div class="alert alert-success" role="alert">
    <ul class="m-0 pl-3">
    @foreach ($info as $item)
        <li>{{ $item }}</li>
    @endforeach
    </ul>
</div>
@endif
