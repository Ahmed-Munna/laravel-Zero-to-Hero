<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Registration or Sign Up</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
   </head>
<body>
  <div class="wrapper">
    <h2>Registration</h2>
    <form action="{{ route('register') }}" method="POST">
        @csrf
      <div class="input-box">
        <input type="text" name="name" placeholder="Enter your name" required>
      </div>
      <div class="input-box">
        <input type="text" name="email" placeholder="Enter your email" required>
      </div>
      <div class="input-box">
        <input type="password" name="password" placeholder="Create password" required>
      </div>
      <div class="policy">
        <input type="checkbox" name="policy"">
        <h3>I accept all terms & condition</h3>
      </div>
      @if ($errors->any())
      <div class="input-box">
        <span style="color: red;">{{ $errors->first() }}</span>
      </div>
      @endif
      <div class="input-box button">
        <input type="Submit" name="submit" value="Register Now">
      </div>
      <div class="text">
        <h3>Already have an account? <a href="{{ route('login') }}">Login now</a></h3>
      </div>
    </form>
  </div>

</body>
</html>