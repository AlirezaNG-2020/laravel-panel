<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        @yield('title')
    </title>
</head>
<body>
   
<!-- <h1>
        {{ 'Hello Laravel' }}
    </h1> -->

    <!-- <?php
        echo '<h1>Hello h1 PHP</h1>';
    ?> -->

    <!-- {{ '<h1>Hello h1 Laravel</h1>' }} -->

    <!-- {!! '<h1>Hello h1 Laravel</h1>' !!} -->

    {{-- @if(10 > 5)
        <h1>OK</h1>
    @endif


    @if(10 > 5)
    <h1>10 > 5 its OK</h1>
    @else
    <h1>10 <> 5 its OK</h1>
    @endif  --}}


     {{-- @if($number == 16)
    {{'number this' . $number}}
    @else
    {{'number this' . $number}}
    @endif  --}}


    {{-- @unless (Auth::check())
        {{'You are not signed in.'}}
    @endunless --}}


    {{-- @isset($number)
        {{'number is set'}}
    @endisset --}}

    

    {{-- @auth
        {{'hi admin'}}
    @endauth


    @guest
    {{'hi guest'}}
    @endguest --}}

    @include('layouts.header')

    @yield('content')

    @include('layouts.footer')
</body>
</html>