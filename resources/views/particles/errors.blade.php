@if ($errors->any())
    <div class="alert alert-danger mb-1">
        <ul class="mb-auto">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif