<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    </head>
    <body class="antialiased">
        <a href="{{ route('submit') }}">Submit</a>
        <h3>{{__('translate.welcome')}}</h3>
            <p value="en"><a href="{{ route('lang', 'en') }}">English</a></p>
            <p value="bn"><a href="{{ route('lang', 'bn') }}">Bangla</a></p>

            <a href="{{ route('user') }}">Click Me</a>
            
        <script>
             Echo.channel('order-shiped')
            .listen('OrderShipped', (e) => {

                console.log(e);
            });
        </script>
    </body>
</html>
