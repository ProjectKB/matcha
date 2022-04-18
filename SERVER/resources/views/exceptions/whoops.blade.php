@extends('layouts.app')

@section('title')
    Exception
@endsection

@section('content')
    <div class="pl-8 pr-8">
        <div class="bg-red-500 shadow-md hover:shadow-xl rounded-lg border-2 p-6 mt-8">
            <h1 class="text-white text-5xl">
                Whoops! {{ $title }}
            </h1>
            <hr>
            <h2 class="text-white lg:text-xl mt-4">
                Http Code: {{ $run->sendHttpCode() }}
            </h2>
        </div>

        <hr>

        <div class="flex flex-wrap justify-between items-start bg-gray-200 shadow-md hover:shadow-xl rounded-lg border-2 p-6 mt-8">
            <div class="text-gray-700 mt-6 p-10 text-xl w-45% mr-2 ml-2 bg-white shadow-md hover:shadow-xl rounded-lg border-2">
                <h3 class="xl:text-gray-800">
                    Exception Message
                </h3>
                <hr>
                {{ $message }}
            </div>


            <div class="text-gray-700 mt-6 p-10 text-xl w-45% mr-2 ml-2 bg-white shadow-md hover:shadow-xl rounded-lg border-2">
                <h3 class="xl:text-gray-800">
                    Exception Request Input
                </h3>
                <hr>
                <ul>
                    @foreach ($input as $name => $value)
                        <li>
                            <strong>{{ $name }}</strong>: {{ $value }}
                        </li>
                    @endforeach
                </ul>
            </div>

            <div class="text-gray-700 mt-6 p-10 text-xl w-45% mr-2 ml-2 bg-white shadow-md hover:shadow-xl rounded-lg border-2">
                <h3 class="xl:text-gray-800">
                    Stack Trace
                </h3>
                <h4>
                    (Open browser console for full stack trace)
                </h4>
                <hr>
{{--                <div>--}}
{{--                    <table>--}}
{{--                        <tr>--}}
{{--                            <th>Line</th>--}}
{{--                            <th>Function</th>--}}
{{--                            <th>Class</th>--}}
{{--                            <th>Type</th>--}}
{{--                            <th>File</th>--}}
{{--                        </tr>--}}
{{--                        <tr>--}}
{{--                            @foreach($stack as $trace)--}}
{{--                                <td>{{ $trace['line'] }}</td>--}}
{{--                                <td>{{ $trace['function'] }}</td>--}}
{{--                                <td>{{ $trace['class'] }}</td>--}}
{{--                                <td>{{ $trace['type'] }}</td>--}}
{{--                                <td>{{ $trace['file'] }}</td>--}}
{{--                            @endforeach--}}
{{--                        </tr>--}}
{{--                    </table>--}}
{{--                </div>--}}
            </div>
        </div>
    </div>
@endsection

<script>
    const stack = JSON.parse("{{ json_encode($stack) }}");
    console.log(stack);
</script>
