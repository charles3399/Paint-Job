@extends('layouts.app')

@section('content')
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
                @foreach ($paintjobs as $paintjob)
                    <tr>
                        <td>{{$paintjob->plate_no}}</td>
                        <td><span class="replaceme">{{$paintjob->current_color}}</span></td>
                        <td><span class="replaceme">{{$paintjob->target_color}}</span></td>
                        <td>
                            <form action="#">
                                <button type="submit" class="btn">Mark as done</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </section>

@endsection

@section('script')
    <script>
        $(document).ready(function(){
            $( ".replaceme" ).each(function() {
                if($(this).html() == 1){
                    $(this).html('Red')
                }

                if($(this).html() == 2){
                    $(this).html('Green')
                }

                if($(this).html() == 3){
                    $(this).html('Blue')
                }
            })
 
        })
    </script>
@endsection