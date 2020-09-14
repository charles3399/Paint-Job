@extends('layouts.app')

@section('content')
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
                @if ($paintjobs->count() > 0)
                    @foreach ($paintjobs as $paintjob)
                        <tr>
                            <td style='text-align: center;'>{{$paintjob->plate_no}}</td>
                            <td style='text-align: center;'><span class="replaceme">{{$paintjob->current_color}}</span></td>
                            <td style='text-align: center;'><span class="replaceme">{{$paintjob->target_color}}</span></td>
                            <td style='text-align: center;'>
                                <form action="{{ route('paintjob.destroy', $paintjob->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn">Mark as Done</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <p style='text-align: center;'>Empty...Paint your car now!</p> 
                @endif
                
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
        })
    </script>
@endsection