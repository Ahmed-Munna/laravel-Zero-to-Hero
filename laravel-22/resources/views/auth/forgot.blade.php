<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
   </head>
<body>
  <div class="wrapper">
    <h2>Forgot Password</h2>
    <form action="{{ route('password.email') }}" method="POST">
        @csrf
      <div class="input-box">
        <input type="text" name="email" placeholder="Enter your email" required>
      </div>
      @if ($errors->any())
      <div class="input-box">
        <span style="color: red;">{{ $errors->first() }}</span>
      </div>
      @endif
      <div class="input-box button">
        <input type="Submit" name="submit" value="Send">
      </div>
    </form>
  </div>

</body>
</html>
