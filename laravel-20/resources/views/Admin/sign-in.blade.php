<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
   </head>
<body>
  <div class="wrapper">
    <h2>Admin Sign In</h2>
    <form action="{{ route('login-admin') }}" method="POST">
        @csrf
      <div class="input-box">
        <input type="text" name="email" placeholder="Enter your email" required>
      </div>
      <div class="input-box">
        <input type="password" name="password" placeholder=" password" required>
      </div>
      <div class="policy">
        <label>
          <input type="checkbox" name="remember" >
          Remember me
        </label>
      </div>
      @if ($errors->any())
      <div class="input-box">
        <span style="color: red;">{{ $errors->first() }}</span>
      </div>
      @endif
      <div class="input-box button">
        <input type="Submit" name="submit" value="Sign In">
      </div>
      <div class="text">
        <h3><a href="{{ route('admin-register') }}">Create an account</a></h3>
      </div>
    </form>
  </div>

</body>
</html>
