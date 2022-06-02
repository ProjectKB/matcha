@if (session()->flash()->has('success'))
    <pre>
        @foreach(session()->flash()->get('success') as $message)
            {{ $message }}
        @endforeach
    </pre>
@endif