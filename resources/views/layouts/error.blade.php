@if ($errors->any())
    @foreach ($errors->all() as $error)
        <span style="background-color: orangered; color: black; text-transform: uppercase; padding: 5px; margin-bottom: 5px;">
            {{$error}}
        </span>
    @endforeach
@endif