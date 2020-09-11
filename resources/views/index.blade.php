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
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    {{-- JQuery --}}
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>

</head>
<body>

    <div class="grid-container">
        <section class="upper-section">
            <h1>Juan's Auto Paint</h1>
        </section>

        <section class="mid-section">
            <a href="" class="selected">New Paint Job</a>
            <a href="{{URL::to('paint-job')}}">Paint Jobs</a>
        </section>

        <section class="lower-section">
            <h3 id="center">New Paint Job</h3>

            <div class="imgItems">
                <img src="{{asset('img/default-car.png')}}">
                <img src="{{asset('img/arrow.png')}}">
                <img src="{{asset('img/red-car.png')}}" id="target">
            </div>

            <p>Car Details</p>
            <form action="">
                    <label>Plate No.</label>
                    <input type="text" name="plate_no">
                    <br>
                    <label>Current Color</label>
                    <select name="current_color" id="curr_color">
                        <option value="red">Red</option>
                        <option value="green">Green</option>
                        <option value="blue">Blue</option>
                    </select>
                    <br>
                    <label>Target Color</label>
                    <select name="target_color" id="targ_color">
                        <option value="" selected>Choose target color</option>
                        <option value="red">Red</option>
                        <option value="green">Green</option>
                        <option value="blue">Blue</option>
                    </select>
                    <br>
                    <button type="submit" id="btn">Submit</button>
            </form>
        </section>
    </div>

    <script>
        $(document).ready(function(){
            $('#targ_color').change(function(e){
                $("#target").attr("src", "img/green-car.png")
            })
        })
    </script>
    
</body>
</html>