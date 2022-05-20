@if (session()->flash()->has('errors'))
    <pre>
        @foreach(session()->flash()->get('errors') as $message)
            {{ $message }}
        @endforeach
    </pre>
@endif