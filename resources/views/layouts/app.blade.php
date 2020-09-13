<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Paint Job App!</title>

    {{-- Main Font --}}
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">

    {{-- CSS --}}
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">

    {{-- JQuery --}}
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
</head>
<body>
    <div class="grid-container">
        <section class="upper-section">
            <a href="{{route('paintjob.index')}}"><h1>Juan's Auto Paint</h1></a>
        </section>

        @yield('content')
        @yield('script')
    </div>
    
</body>
</html>