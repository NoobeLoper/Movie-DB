@extends('layouts.main')

@section('content')
    <div class="container mx-auto px-2 pt-12">
        <div class="popular-tvshow">
            <h2 class="uppercase tracking-wider text-purple-500 text-lg font-semibold">Popular Tv Shows</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-10">
                @foreach ($popularTvshows as $tvshow)
                    <x-tv-card :tvshow="$tvshow" :genres="$genres"/>
                @endforeach
            </div>
        </div>

        <!-- Top Rated TvShows -->
        <div class="top-rated-tvshows py-24">
            <h2 class="uppercase tracking-wider text-green-400 text-lg font-semibold">Top Rated Tv Shows</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8">
                @foreach ($topTvshows as $tvshow)
                    <x-tv-card :tvshow="$tvshow" :genres="$genres"/>
                @endforeach
            </div>
        </div>
    </div>
@endsection

