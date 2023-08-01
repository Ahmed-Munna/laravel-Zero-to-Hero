<!DOCTYPE html>
<html>
<head>
    <title>HTML Forms</title>
</head>
<body>

<form action="{{route('store', 3)}}" method="post">
  @csrf
  <label for="fname">First name:</label><br>
  <input type="text" id="fname" name="name" ><br>
  <label for="lname">Last name:</label><br>
  <input type="email" id="lname" name="email"><br><br>
  <input type="submit" value="Submit">
</form> 

{{$name}}
@unless (Auth::check())
    You are not signed in.
@endunless
<br>
<br>
<ul>
  @foreach($users as $user)
    @if ($loop->first)
     <li>{{$user->name}}</li>
    @endif

    @if ($loop->last)
     <li>{{$user->name}}</li>
    @endif
    
  @endforeach
</ul>

<ul>
  @foreach ($users as $user) 
    <li>{{$loop->iteration}}</li>
  @endforeach
</ul>
<input type="checkbox"
        name="active"
        value="active"
        @checked(old('active', 1)) />

 

</body>
</html>