<!DOCTYPE html>
<html>
<head>
    <title>HTML Forms</title>
</head>
<body>

    <form action="{{route('user.store')}}" method="post">
        @csrf
        <label for="name">Your name:</label><br>
        <input type="text" id="name" name="name" ><br>
        @error('name')
        <p style="color: red"> {{$message}} </p>
        @enderror
        <label for="email">Last email:</label><br>
        <input type="email" id="email" name="email"><br><br>
        @error('email')
        <p style="color: red"> {{$message}} </p>
        @enderror
        <input type="submit" value="Submit">
    </form> 


    @if ($errors->any())
        <ul> 
            @foreach ($errors->all() as $error) 
                <li style="color: red"> {{$error}} </li>
            @endforeach
        </ul>
    @endif

</body>
</head>