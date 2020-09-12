<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Paint Jobs</title>

    {{-- Main Font --}}
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">

    {{-- CSS --}}
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">

    {{-- JQuery --}}
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>

    <style>
        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
        }
    </style>

</head>
<body>
    <div class="grid-container">
        <section class="upper-section">
            <h1>Juan's Auto Paint</h1>
        </section>

        <section class="mid-section">
            <a href="{{route('paintjob.index')}}">New Paint Job</a>
            <a href="{{route('paintjob.list')}}" class="selected">Paint Jobs</a>
        </section>

        <section class="lower-section">
            <table style="width: 100%">
                <thead>
                    <tr>
                        <th>Plate No</th>
                        <th>Current Color</th>
                        <th>Target Color</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td scope="row">Dummy text</td>
                        <td>Dummy text</td>
                        <td>Dummy text</td>
                        <td>Dummy text</td>
                    </tr>
                </tbody>
            </table>
        </section>
    </div>
    
</body>
</html>