<!DOCTYPE html>
<html>
<body>

<h2>HTML Forms</h2>

<form action="{{URL::to('exam/store')}}">
  <label for="name">Name:</label><br>
  <input type="text" id="name" name="name"><br>
  <label for="mail">mail</label><br>
  <input type="mail" id="mail" name="mail"><br><br>
  <input type="submit" value="Submit">
</form> 


</body>
</html>
