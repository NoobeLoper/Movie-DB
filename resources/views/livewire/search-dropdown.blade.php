<div>
    <div class="relative mt-3 md:mt-0" x-data="{ isOpen: true }" @click.away = "isOpen = false" >
        <input wire:model.debounce.300ms="search" type="text" title="Search For Movie, TvShow, Person" name=""
            class="bg-gray-800 text-sm rounded-full w-64 py-1 px-9
            focus:outline-none focus:shadow-outline" placeholder="Search . . ."
            @focus= "isOpen = true"
            @keydown= "isOpen = true"
            @keydown.escape.window = "isOpen = false"
            @keydown.shift.tab = "isOpen = false"
            >
        <div wire:loading class="spinner top-3 right-4 mr-2"></div> <!-- spinner -->
        <div class="absolute bottom-1">
            <!-- Search Icon Start Here-->
            <svg width="22px" height="22px" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                class="fill-current w-6  text-gray-500 mt- ml-1" viewBox="0 0 512 512" xml:space="preserve">
                <g>
                    <g>
                        <path class="heroicon-ui" d="M509.007,448.319L353.309,292.62c-0.05-0.051-0.101-0.102-0.152-0.152l-32.153-32.154c-3.99-3.99-10.459-3.99-14.448,0
                            l-15.896,15.896l-19.103-19.103c53.349-60.825,51.03-153.761-6.979-211.78l-0.001-0.001
                            C204.129-15.11,105.775-15.108,45.327,45.328c-60.436,60.447-60.436,158.801,0.001,219.249
                            c30.224,30.217,69.923,45.327,109.624,45.327c36.511,0,73.016-12.79,102.156-38.348l19.102,19.102l-15.896,15.896
                            c-3.99,3.99-3.99,10.457-0.001,14.447l32.223,32.233c0.093,0.093,0.188,0.184,0.283,0.274l155.5,155.5
                            c1.916,1.916,4.515,2.992,7.224,2.992c2.709,0,5.309-1.077,7.224-2.992l46.24-46.24c1.916-1.916,2.992-4.515,2.992-7.224
                            S510.923,450.234,509.007,448.319z M250.133,250.123c-0.001,0.001-0.003,0.002-0.004,0.004c-0.001,0.001-0.002,0.003-0.004,0.004
                            c-52.481,52.467-137.87,52.465-190.349-0.003c-52.47-52.48-52.47-137.873-0.001-190.353c26.24-26.236,60.709-39.354,95.177-39.354
                            c34.468,0,68.936,13.118,95.175,39.352C302.598,112.253,302.599,197.643,250.133,250.123z M281.986,313.778l31.793-31.793
                            l17.785,17.785l-31.796,31.796L281.986,313.778z M455.543,487.335L314.22,346.011l31.792-31.792l141.323,141.323L455.543,487.335z
                            "/>
                    </g>
                </g>
                <g>
                    <g>
                        <path class="heroicon-ui" d="M232.364,77.53c-42.683-42.683-112.14-42.684-154.835,0c-42.683,42.693-42.682,112.15,0,154.833
                            c20.681,20.682,48.176,32.072,77.421,32.072s56.738-11.389,77.412-32.07c20.682-20.677,32.073-48.17,32.073-77.415
                            C264.435,125.705,253.046,98.21,232.364,77.53z M217.915,217.915c-16.817,16.823-39.178,26.087-62.965,26.087
                            c-23.786,0-46.15-9.264-62.973-26.087c-34.717-34.716-34.716-91.211,0-125.936c17.365-17.361,40.165-26.038,62.973-26.038
                            c22.801,0,45.609,8.681,62.965,26.037c16.823,16.822,26.087,39.186,26.087,62.972
                            C244.002,178.735,234.739,201.095,217.915,217.915z"/>
                    </g>
                </g>
                <g>
                    <g>
                        <path class="heroicon-ui" d="M219.78,146.023c-0.766-5.591-5.92-9.504-11.51-8.734c-5.591,0.766-9.5,5.919-8.734,11.51
                            c1.932,14.091-2.721,27.931-12.764,37.972c-3.991,3.99-3.991,10.459-0.002,14.449c1.995,1.995,4.61,2.993,7.225,2.993
                            c2.614,0,5.229-0.997,7.223-2.991C215.823,186.621,222.588,166.503,219.78,146.023z"/>
                    </g>
                </g>
                <g>
                    <g>
                        <path class="heroicon-ui" d="M198.423,109.538c-13.148,0-13.169,20.433,0,20.433C211.571,129.972,211.592,109.538,198.423,109.538z"/>
                    </g>
                </g>
            </svg>
            <!--Search Icon End Here-->

        </div>

        @if (strlen($search) > 2)

        <div class="z-50 absolute bg-gray-800 text-sm rounded w-64 mt-4"
            x-show.transition.opacity="isOpen"
        > <!-- Results Box -->

            @if ($searchResults->count() > 0)
                <ul>
                    @foreach ($searchResults as $result)

                        <li class="border-b border-gray-600"> <!-- Searching Movies -->
                            @if($result['media_type'] == 'movie')
                                <a href="{{ route('movies.show', $result['id']) }}" class="hover:bg-gray-600 transition duration-170 ease-in-out px-3 py-3 flex items-center"
                                @if($loop->last)
                                    @keydown.tab ="isOpen = false"
                                @endif
                                >
                                @if ($result['poster_path'] == null)
                                    <img src="https://via.placeholder.com/75x125/FFFFFF/FF0000/?text=NO PHOTO" alt="poster" class="w-8">
                                @else
                                    <img src="https://image.tmdb.org/t/p/w92/{{ $result['poster_path'] }}" alt="poster" class="w-8">
                                @endif
                                    <span class="ml-4">{{ $result['title'] }}</span>
                                </a>
                            @endif
                        </li>

                        <li class="border-b border-gray-600"> <!-- Searching Persons -->
                            @if ($result['media_type'] == 'person')
                                <a href="{{ route('actors.show', $result['id']) }}"
                                class="hover:bg-gray-600 transition duration-170 ease-in-out
                                px-3 py-3 flex items-center"
                                @if($loop->last)
                                    @keydown.tab ="isOpen = false"
                                @endif
                                >
                                @if ($result['profile_path'] == null)
                                    <img src="https://via.placeholder.com/75x125/FFFFFF/FF0000/?text=NO PHOTO" alt="poster" class="w-8">
                                @else
                                    <img src="https://image.tmdb.org/t/p/w92/{{ $result['profile_path'] }}" alt="poster" class="w-8">
                                @endif
                                <span class="ml-4">{{ $result['name'] }}</span>
                            @endif
                            </a>
                        </li>

                        <li class="border-b border-gray-600"> <!-- Searching Tv Shows -->
                            @if ($result['media_type'] == 'tv')
                                <a href="{{ route('tvshows.show', $result['id']) }}"
                                class="hover:bg-gray-600 transition duration-170 ease-in-out
                                px-3 py-3 flex items-center"
                                @if($loop->last)
                                    @keydown.tab ="isOpen = false"
                                @endif
                                >
                                @if ($result['poster_path'] == null)

                                    <img src="https://via.placeholder.com/75x125/FFFFFF/FF0000/?text=NO PHOTO" alt="poster" class="w-8">
                                @else
                                    <img src="https://image.tmdb.org/t/p/w92/{{ $result['poster_path'] }}" alt="poster" class="w-8">
                                @endif
                                <span class="ml-4">{{ $result['name'] }}</span>
                            @endif
                            </a>
                        </li>
                    @endforeach
                </ul>
            @else
                <div class="px-4 py-4">
                    No Results for {{ $search }}
                </div>
            @endif

        </div>
        @endif

    </div>
</div>
