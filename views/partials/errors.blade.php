@if(\Session::has('errors'))
    <ul>
    @foreach(\Session::get('errors') as $error)
        <li class="alert alert-danger">
            {{ $error }}
        </li>
    @endforeach
    </ul>
@endif