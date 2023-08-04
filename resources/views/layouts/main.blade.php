<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @yield('meta')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    @yield('vite')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.0/flowbite.min.css" rel="stylesheet" />
    <link rel="icon" href="{{asset('images/pokeball.png')}}" type="image/x-icon">
    <title>Pokemon</title>
</head>
<body>
    <x-nav></x-nav>
    <main id="main__container">
        @yield('content')
    </main>

    @yield('js')
</body>

</html>
