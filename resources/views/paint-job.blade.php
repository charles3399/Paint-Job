@extends('layouts.app')

@section('content')
     <style> {{-- Somehow the CSS won't work sometimes --}}
        .disabled{
        background-color:rgb(170, 68, 68);
        border: none;
        opacity: 0.6;
        color: white;
        padding: 15px 32px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        margin: 4px 2px;
        cursor: not-allowed;
    }
    </style>

    <section class="mid-section">
        <a href="{{route('paintjob.index')}}">New Paint Job</a>
        <a href="{{route('paintjob.list')}}" class="selected">Paint Jobs</a>
    </section>
    
    <section class="lower-section">
        <h3>Paint Jobs in Progresss</h3>
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
                        <td style='text-align: center;'>{{$paintjob->plate_no}}</td>
                        <td style='text-align: center;'><span class="replaceme">{{$paintjob->current_color}}</span></td>
                        <td style='text-align: center;'><span class="replaceme">{{$paintjob->target_color}}</span></td>
                        <td style='text-align: center;'>
                            @if ($paintjob->is_done == true)
                                <button class="disabled">Paint Completed</button>
                            @else
                            <a href="{{ route('paint.done', $paintjob->id) }}" style="color: white"><button class="btn">Mark as done</button></a>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <span style="text-align: right;">{{$paintjobs->links()}}</span>

        <h3>Shop Performance Breakdown:</h3>
        <table style="width: 100%;">
            <thead>
                <tr>
                    <th>Blue</th>
                    <th>Red</th>
                    <th>Green</th>
                    <th>Total Cars Painted</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td style='text-align: center;'>{{$countBlue}}</td>
                    <td style='text-align: center;'>{{$countRed}}</td>
                    <td style='text-align: center;'>{{$countGreen}}</td>
                    <td style='text-align: center;'>{{$totalPainted}}</td>
                </tr>
            </tbody>
        </table>
    </section>

@endsection

@section('script')
    <script>
        $(document).ready(function(){
            $( ".replaceme" ).each(function() {
                if($(this).html() == 1){
                    $(this).html('Default')
                }

                if($(this).html() == 2){
                    $(this).html('Red')
                }

                if($(this).html() == 3){
                    $(this).html('Green')
                }

                if($(this).html() == 4){
                    $(this).html('Blue')
                }
            })

            $("tr > td").each(function(){
                if($('.disabled').html() == 'Paint Completed')
                {
                    $(this).remove()
                }
            })
        })
    </script>
@endsection