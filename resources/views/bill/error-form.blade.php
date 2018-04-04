@if(count($errors) > 0)
    <ul>
        @foreach ($errors->all() as $error)
            <li class='errors'>{{ $error }}</li>
        @endforeach
    </ul>
@endif