@extends('layouts.main')

@section('content')

    <div class="container mx-auto px-2 pt-12">
        <div class="popular-actors">
            <h2 class="uppercase tracking-wider text-purple-500 text-lg font-semibold">Popular Actros</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-10">
                @foreach ($popularActors as $actor)
                <div>
                    <div class="mt-8">
                        <a href="{{ route('actors.show', $actor['id']) }}">
                            {{-- <img src="{{ 'https://image.tmdb.org/t/p/w235_and_h235_face/'.$actor['profile_path'] }}"
                            alt="{{ $actor['name'] }}" class="hover:opacity-80 transition duration-500"> --}}

                            @if ($actor['profile_path'])

                                <img src="https://image.tmdb.org/t/p/w235_and_h235_face/{{ $actor['profile_path'] }}" alt="{{ $actor['name'] }}"
                                class="hover:opacity-80 transition duration-500">

                            @else
                                <img src="https://ui.avatars.com/api/size=2356name=" alt="poster" class="w-8">
                            @endif
                        </a>

                        <div class="mt-2">
                            <a href="#" class="text-lg mt-3 hover:text-gray-400 transition duration-500 ease-in-out">
                                {{ $actor['name'] }}
                            </a>
                            <div class="flex-items-center text-gray-400 text-sm">
                                <svg class="fill-current text-purple-500 w-4"
                                viewBox="0 10 511.98685 511"  xmlns="http://www.w3.org/2000/svg">
                                <path d="m510.652344 185.902344c-3.351563-10.367188-12.546875-17.730469-23.425782-18.710938l-147.773437-13.417968-58.433594-136.769532c-4.308593-10.023437-14.121093-16.511718-25.023437-16.511718s-20.714844 6.488281-25.023438 16.535156l-58.433594 136.746094-147.796874 13.417968c-10.859376 1.003906-20.03125 8.34375-23.402344 18.710938-3.371094 10.367187-.257813 21.738281 7.957031 28.90625l111.699219 97.960937-32.9375 145.089844c-2.410156 10.667969 1.730468 21.695313 10.582031 28.09375 4.757813 3.4375 10.324219 5.1875 15.9375 5.1875 4.839844 0 9.640625-1.304687 13.949219-3.882813l127.46875-76.183593 127.421875 76.183593c9.324219 5.609376 21.078125 5.097657 29.910156-1.304687 8.855469-6.417969 12.992187-17.449219 10.582031-28.09375l-32.9375-145.089844 111.699219-97.941406c8.214844-7.1875 11.351563-18.539063 7.980469-28.925781zm0 0"/></svg>
                                <span class="ml-1">{{ $actor['popularity'] * 2 .'%'}}</span>
                                <span class="mx-2">|</span>
                                <span>{{ $actor['known_for_department'] }}</span>
                            </div>
                            <div class="text-gray-400 text-sm">
                                Known For:
                                @foreach ($actor['known_for'] as $known)

                                {{ $known = collect($known)->pull('title') }}
                                @if ($loop->remaining)| @endif
                                @endforeach

                            </div>
                        </div>

                    </div>
                </div>
                @endforeach
            </div>
        </div> <!-- End of Popular Actors -->
    </div>

@endsection
