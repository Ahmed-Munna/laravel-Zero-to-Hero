<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h2>HTML Forms</h2>

<form method="get" action="{{route('data')}}" >
    @csrf
  <label for="fname">First name:</label><br>
  <input type="text" id="fname" name="fname" value="John"><br>
  <label for="mail">Email:</label><br>
  <input type="text" id="mail" name="mail"><br><br>
  <input type="submit" value="Submit">
</form> 
<a href="">link</a>
</body>
</html>