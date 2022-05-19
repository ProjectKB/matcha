@if (session()->flash()->has('errors'))
    <pre>
        @foreach(current(session()->flash()->get('errors')) as $message)
            {{ $message.PHP_EOL }}
        @endforeach
    </pre>
@endif