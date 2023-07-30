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

</body>
</html>