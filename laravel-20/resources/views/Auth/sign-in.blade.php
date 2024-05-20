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
    <h2>Sign In</h2>
    <form action="post">
        @csrf
      <div class="input-box">
        <input type="text" name="email" placeholder="Enter your email" required>
      </div>
      <div class="input-box">
        <input type="password" name="passord" placeholder=" password" required>
      </div>
      <div class="policy">
        <input type="checkbox" name="remember" >
        <h3>Remember me</h3>
      </div>
      <div class="input-box button">
        <input type="Submit" name="submit" value="Sign In">
      </div>
      <div class="text">
        <h3><a href="{{ route('sign-up') }}">Create an account</a></h3>
      </div>
    </form>
  </div>

</body>
</html>
