<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ env('APP_NAME') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>


<div class="w-full flex flex-col sm:flex-row flex-grow overflow-hidden">
    @include('components.side-menu')
    <main role="main" class="w-full h-full flex-grow p-3 overflow-auto">
        <h1 class="text-3xl md:text-5xl mb-4 font-extrabold" id="home">Star Wars API Demo</h1>
        @yield('content')
    </main>
</div>
<footer class="bg-indigo-800 mt-auto">
    <div class="px-4 py-3 text-white mx-auto">
        <h1 class="text-2xl hidden sm:block mb-2">
            <span class="text-8xl">&#9786;</span>
        </h1>
    </div>
</footer>
</body>
</html>
