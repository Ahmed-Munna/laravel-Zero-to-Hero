<!DOCTYPE html>
<html>
<head>
<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}
td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>
</head>
<body>
<a href="{{ route('user.create') }}">ADD USER</a>
</br>
</br>
<table>
  <tr>
    <th>ID</th>
    <th>Name</th>
    <th>Mail</th>
    <th>Action</th>
  </tr>
 @if($data)

 @foreach($data as $value) 
  <tr>
    <td>{{$value->id}}</td>
    <td>{{$value->name}}</td>
    <td>{{$value->email}}</td>
    <td>
        <a href="">EDIT</a> | 
        
        <from action="{{ route('user.destroy', $value->id) }}" method="post">
            @csrf
            @method('DELETE')
            <button type="submit">DELETE</button>
        </from>
    </td>   
  </tr>
  @endforeach
 @endif
</table>


</body>
</html>