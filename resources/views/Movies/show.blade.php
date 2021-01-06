@extends('layouts.main')

@section('content')
    <div class="movie-info border-b border-gray-800">
        <div class="container mx-auto px-4 py-16 flex flex-col md:flex-row">
            @if ($movie['poster_path'])
                <img src="{{ 'https://image.tmdb.org/t/p/w500/'.$movie['poster_path'] }}" alt="{{ $movie['title'] }}" class="w-64 md:w-96">
            @else
                <img src="https://via.placeholder.com/300x450/000000/FFFFFF/?text=CeN4" alt="poster">
            @endif

            <div class="md:ml-24"> <!-- Film Data -->
                <h3 class="text-4xl font-semibold">{{ $movie['title'] }}</h3>
                <div class="flex flex-wrap items-center text-gray-400 text-sm">
                    <svg class="fill-current text-purple-500 w-4"
                    viewBox="0 10 511.98685 511"  xmlns="http://www.w3.org/2000/svg">
                    <path d="m510.652344 185.902344c-3.351563-10.367188-12.546875-17.730469-23.425782-18.710938l-147.773437-13.417968-58.433594-136.769532c-4.308593-10.023437-14.121093-16.511718-25.023437-16.511718s-20.714844 6.488281-25.023438 16.535156l-58.433594 136.746094-147.796874 13.417968c-10.859376 1.003906-20.03125 8.34375-23.402344 18.710938-3.371094 10.367187-.257813 21.738281 7.957031 28.90625l111.699219 97.960937-32.9375 145.089844c-2.410156 10.667969 1.730468 21.695313 10.582031 28.09375 4.757813 3.4375 10.324219 5.1875 15.9375 5.1875 4.839844 0 9.640625-1.304687 13.949219-3.882813l127.46875-76.183593 127.421875 76.183593c9.324219 5.609376 21.078125 5.097657 29.910156-1.304687 8.855469-6.417969 12.992187-17.449219 10.582031-28.09375l-32.9375-145.089844 111.699219-97.941406c8.214844-7.1875 11.351563-18.539063 7.980469-28.925781zm0 0"/></svg>
                    <span class="ml-1">{{ $movie['vote_average'] * 10 .'%'}}</span>
                    <span class="mx-2">|</span>
                    <span>{{ \Carbon\Carbon::parse($movie['release_date'])->format('M d, Y') }}</span>
                    <span class="mx-2">|</span>
                    <span>
                        @foreach ($movie['genres'] as $genres)
                            {{ $genres['name'] }}@if (!$loop->last), @endif
                        @endforeach
                    </span>
                </div>
                <p class="text-gray-300 mt-8">
                    {{ $movie['overview'] }}
                </p>
                <div class="mt-12"> <!-- Crew  -->
                    <h4 class="text-white font-semibold">Featured Crew</h4>
                    <div class="flex mt-4">

                        @foreach ($movie['credits']['crew'] as $crew)
                        @if ($loop->index < 4)

                            <div class="mr-8">
                                <div class="">{{ $crew['name'] }}</div>
                                <div class="text-sm text-gray-400">{{ $crew['job'] }}</div>
                            </div>

                        @else
                            @break
                        @endif
                        @endforeach

                    </div>
                </div>

                @if (count($movie['videos']['results'])>0) <!-- Check if there is any video -->

                <div class="mt-12"> <!-- Trailer Video Youtube -->
                    <a href="https://youtube.com/watch?v={{ $movie['videos']['results'][0]['key'] }}" target="_blank" class="flex inline-flex items-center bg-yellow-500 text-gray-900 rounded font-semibold
                    px-4 py-3 hover:bg-yellow-600 transition ease-in-out duration-200">Play Trailer

                    </a>
                </div>

                @endif

            </div>
        </div>
    </div> <!--End Movie Info-->

    <div class="movie-cast border-b border-gray-800"> <!-- Movie Cast -->
        <div class="container mx-auto px-4 py-14">
            <h2 class="text-4xl font-semibold">Cast</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-10">

               @foreach ($movie['credits']['cast'] as $cast)
                    @if ($loop->index < 5)
                    <div class="mt-8">
                        @if (isset($cast['profile_path']))
                        <a href="{{ route('actors.show', $cast['id']) }}">
                            <img src="{{ 'https://image.tmdb.org/t/p/w500'.$cast['profile_path'] }}"
                            class="hover:opacity-75 transition ease-in-out duration-200">
                        </a>
                            <a href="{{ route('actors.show', $cast['id']) }}" class="text-lg mt-2 hover:text-gray-400">{{ $cast['name'] }}</a>
                            <div class="text-sm text-gray-400">{{ $cast['character'] }}</div>
                        @else
                        <a href="{{ route('actors.show', $cast['id']) }}">
                            <img src="{{ 'https://via.placeholder.com/300x450/000000/FFFFFF/?text=CeN4' }}"
                            class="hover:opacity-75 transition ease-in-out duration-200">
                        </a>
                            <a href="{{ route('actors.show', $cast['id']) }}" class="text-lg mt-2 hover:text-gray-400">{{ $cast['name'] }}</a>
                            <div class="text-sm text-gray-400">{{ $cast['character'] }}</div>

                        @endif
                        </div>

                    @else
                        @break
                    @endif

                @endforeach

            </div>
        </div>
    </div>

    <div class="movie-images" x-data = " {isOpen: false, image: ''} " > <!-- Movie Images -->
        <div class="container mx-auto px-4 py-16">

            <h2 class="text-4xl font-semibold">Movie Images</h2>
            <div class="grid grid-cols1 sm:grid-cols-2 md:grid-cols-3 gap-8">

                @foreach ($movie['images']['backdrops'] as $image)
                    @if ($loop->index < 9)
                    <div class="mt-8">
                        <a
                            @click.prevent="
                            isOpen = true
                            image= '{{ 'https://image.tmdb.org/t/p/original'.$image['file_path'] }}'
                            "
                            href="#"
                        >
                            <img src="{{ 'https://image.tmdb.org/t/p/w500'.$image['file_path'] }}"
                            class="hover:opacity-75 transition ease-in-out duration-200">
                        </a>
                    </div>

                    @else
                        @break
                    @endif
                @endforeach

            </div>


<!--MoDaL--><div
                style="background-color: rgna(0, 0, 0, 0.5);"
                class="fixed top-0 left-0 w-full h-full flex
                items-center shadow-lg overflow-y-auto"
                x-show= "isOpen"
            >
                <div class="container mx-auto lg:px-32 rounded-lg overflow-y-auto">
                    <div class="bg-gray-900 rounded">
                        <div class="flex justify-end pr-4 pt-2">
                            <button
                                @click="isOpen = false"
                                @keydown.escape.window= "isOpen = false"
                                class="text-3xl leading-none hover:text-gray-400"
                            >
                                &times;
                            </button>
                        </div>
                        <div class="modal-body px-8 py-8">
                            <img :src="image" alt="poster">
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
@endsection
