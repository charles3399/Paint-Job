@extends('layouts.app')

@section('content')

    <section class="mid-section">
        <a href="{{route('paintjob.index')}}" class="selected">New Paint Job</a>
        <a href="{{route('paintjob.list')}}">Paint Jobs</a>
    </section>

    <section class="lower-section">
        <h3 id="center">New Paint Job</h3>

        <div class="imgItems">
            <img src="{{asset('img/default-car.png')}}" id="current" name="recent_color">
            <img src="{{asset('img/arrow.png')}}">
            <img src="{{asset('img/default-car.png')}}" id="target" name="imgswap">
        </div>

        <p>Car Details</p>
        @include('layouts.error')
        <form action="{{route('paintjob.store')}}" method="POST">
            @csrf
                <label>Plate No.</label>
                <input type="text" name="plate_no">
                <br>
                <label>Current Color</label>
                <select name="current_color" id="curr_color">
                    <option value="img/default-car.png"></option>
                    @foreach ($colors as $color)
                        <option value="{{$color->id}}">{{$color->color}}</option>
                    @endforeach
                </select>
                <br>
                <label>Target Color</label>
                <select name="target_color" id="targ_color">
                    <option value="img/default-car.png"></option>
                    @foreach ($colors as $color)
                        <option value="{{$color->id}}">{{$color->color}}</option>
                    @endforeach
                </select>
                <br>
                <button type="submit" id='btn'>Submit</button>
        </form>
    </section>

    {{-- <option value="img/default-car.png"></option> --}}
@endsection

@section('script')
    <script>
        $(document).ready(function(){
            
            $('#targ_color').change(function(){

                if($(this).val() == 1)
                {
                    $('#target').attr('src','img/red-car.png')
                }
                if($(this).val() == 2)
                {
                    $('#target').attr('src','img/green-car.png')
                }
                if($(this).val() == 3)
                {
                    $('#target').attr('src','img/blue-car.png')
                }
                
            })

            $('#curr_color').change(function(){
                if($(this).val() == 1)
                {
                    $('#current').attr('src','img/red-car.png')
                }
                if($(this).val() == 2)
                {
                    $('#current').attr('src','img/green-car.png')
                }
                if($(this).val() == 3)
                {
                    $('#current').attr('src','img/blue-car.png')
                }
            })
        })
    </script>
@endsection