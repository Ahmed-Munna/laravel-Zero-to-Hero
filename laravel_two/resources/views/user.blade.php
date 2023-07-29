<!DOCTYPE html>
<html>
<body>

<h2>HTML Forms</h2>

<form action="{{route('user.update')}}" method="post">
  @csrf
  @method('PUT')
  <label for="name">Name:</label><br>
  <input type="text" id="name" name="name" value="{{$data[0]->name}}"><br>
  <label for="email">Email</label><br>
  <input type="email" id="meail" name="email" value="{{$data[0]->email}}"><br><br>
  <input type="submit" value="Submit">
</form> 


</body>
</html>
