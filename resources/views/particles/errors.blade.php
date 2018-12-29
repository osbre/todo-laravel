@if ($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-auto">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div><br/>
@endif