@if ($errors->any())
<div class="alert alert-danger" role="alert">
    <ul class="m-0 pl-3">
    @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
    @endforeach
    </ul>
</div>
@endif