<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Http;
use Livewire\Component;

class SearchDropdown extends Component
{
    public $search = '';

    public function render()
    {
        $searchResults = [];

        if (strlen($this->search) >3) {

            $searchResults = Http::withToken(config('services.tmdb.token'))
                ->get('https://api.tmdb.org/3/search/multi?query='.$this->search)
                ->json()['results'];

            // dump($searchResults);

            // we need collection for output

            //for showing less(10) result in search box (if there is there was no 'IF' condition in search-dropdown.blade):
            // $searchResults = collect($searchResults)->take(10);

        }

        return view('livewire.search-dropdown',
            ['searchResults' => collect($searchResults)->take(10)]
        );
    }
}
