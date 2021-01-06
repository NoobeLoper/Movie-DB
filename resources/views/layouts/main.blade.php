<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Movie Site</title>
    <link rel="stylesheet" href="/css/app.css">
    @livewireStyles
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.7.3/dist/alpine.min.js" defer></script>
</head>
<body class="font-sans bg-gray-900 text-white">
    <nav class="border-b border-gray-700">
        <div class="container mx-auto flex flex-col md:flex-row items-center justify-between px-4 py-6">
            <ul class="flex flex-col md:flex-row items-center">
                <li>

                    <a href="{{ route('movies.index') }}">
                        <svg width="32pt" height="32pt" viewBox="0 0 192 192" xmlns="http://www.w3.org/2000/svg">
                            <path d="m192 96c0-53.019531-42.980469-96-96-96s-96 42.980469-96 96 42.980469 96 96 96h96v-16h-43c26.839844-17.769531 42.988281-47.808594 43-80zm-48.976562 64.722656c-10.722657 7.789063-25.734376 5.414063-33.523438-5.3125-7.789062-10.722656-5.414062-25.730468 5.308594-33.523437 10.726562-7.789063 25.734375-5.414063 33.523437 5.3125 7.792969 10.722656 5.414063 25.730469-5.308593 33.523437zm-1.179688-104.851562c12.605469-4.097656 26.144531 2.800781 30.242188 15.40625 4.09375 12.609375-2.804688 26.148437-15.410157 30.242187-12.605469 4.097657-26.144531-2.800781-30.242187-15.40625-4.09375-12.605469 2.804687-26.148437 15.410156-30.242187zm-45.84375-39.871094c13.253906 0 24 10.746094 24 24s-10.746094 24-24 24-24-10.746094-24-24 10.746094-24 24-24zm-76.085938 55.277344c4.097657-12.605469 17.636719-19.503906 30.242188-15.410156 12.605469 4.097656 19.503906 17.636718 15.410156 30.242187-4.097656 12.605469-17.636718 19.503906-30.242187 15.410156s-19.503907-17.632812-15.410157-30.242187zm62.585938 84.132812c-7.789062 10.726563-22.800781 13.101563-33.523438 5.3125-10.722656-7.792968-13.101562-22.800781-5.308593-33.523437 7.789062-10.722657 22.800781-13.101563 33.523437-5.308594 10.722656 7.789063 13.097656 22.796875 5.308594 33.519531zm5.5-59.410156c0-4.417969 3.582031-8 8-8s8 3.582031 8 8-3.582031 8-8 8-8-3.582031-8-8zm0 0"/>
                        </svg>
                    </a>
                </li>
                <li class="md:ml-16 mt-3 md:mt-0">
                    <a href="{{ route('movies.index') }}" class="hover:text-gray-400 transition duration-500 ease-in-out">
                        Movies
                    </a>
                </li>
                <li class="md:ml-6 mt-3 md:mt-0">
                    <a href="{{ route('tvshows.index') }}" class="hover:text-gray-400 transition duration-500 ease-in-out" >Tv Shows</a>
                </li>
                <li class="md:ml-6 mt-3 md:mt-0">
                    <a href="{{ route('actors.index') }}" class="hover:text-gray-400 transition duration-500 ease-in-out">Actors</a>
                </li>
            </ul>
            <div class="flex flex-col md:flex-row items-center">
                @livewire('search-dropdown')
            </div>
        </div>
    </nav>
    @yield('content')
    @livewireScripts

    @include('layouts.footer')

</body>
</html>