@extends('layouts.main')

@section('meta')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('vite')
    @vite(['resources/css/app.css', 'resources/js/main.js'])
@endsection

@section('content')
    <section
        class="w-full h-screen bg-[url('{{ asset('/images/pokemon.png') }}')] bg-cover bg-no-repeat grid place-content-center grid-cols-2 max-md:grid-cols-1">
        <div class="h-screen grid place-content-center">
            <h1 class="font-extrabold text-4xl text-[#FFFDF7] mb-6">Find your <span class="text-[#F4D35E]">Pokemon</span>!
            </h1>

            <div class="w-[22rem] lg:w-[30rem] z-40">
                <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only ">Search</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                        </svg>
                    </div>
                    <input type="search" id="search"
                        class="block w-full p-4 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-[#DA4167] focus:border-[#F46197]"
                        placeholder="Search your Pokemon!" required>
                    <a type="submit" href="" id="buttonSearch" class="text-white absolute right-2.5 bottom-2.5 bg-[#DA4167] hover:bg-[#F46197] focus:ring-4 focus:outline-none focus:ring-[#F46197]font-medium rounded-lg text-sm px-4 py-2 ">Search</a>
                    <div id="dropdownMenu"
                        class="z-70 hidden bg-[#EBEBD3] rounded-lg shadow w-[30rem] min-h-0 h-[auto] p-5">
                        <ul class="py-2 text-sm text-gray-700" aria-labelledby="dropdownMenuIconButton" id="dropDownMenu">
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="h-screen max-md:hidden grid place-content-center relative ">
            <img src="{{ asset('images/pokeball.png') }}" class="w-[40rem] absolute z-10 inset-x-0 inset-y-0 m-[auto]"
                alt="">

            <div id="default-carousel" class="relative w-[30rem] h-[30rem]" data-carousel="slide">
                <div class="relative h-[30rem] overflow-hidden rounded-lg">
                    <div class="hidden duration-700 ease-linear" id="carousel-item-1" data-carousel-item>
                        <img src="https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/dream-world/{{rand(1,100)}}.svg"
                            class="h-full"alt="...">
                    </div>
                    <div class="hidden duration-700 ease-linear" id="carousel-item-2" data-carousel-item>
                        <img src="https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/dream-world/{{rand(1,100)}}.svg"
                            class="h-full"alt="...">
                    </div>


                    <div class="hidden duration-700 ease-linear" id="carousel-item-3" data-carousel-item>
                        <img src="https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/dream-world/{{rand(1,100)}}.svg"
                            class="h-full"alt="...">
                    </div>

                    <div class="hidden duration-700 ease-linear" id="carousel-item-4" data-carousel-item>
                        <img src="https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/dream-world/{{rand(1,100)}}.svg"
                            class="h-full"alt="...">
                    </div>

                    <div class="hidden duration-700 ease-linear" id="carousel-item-5" data-carousel-item>
                        <img src="https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/dream-world/{{rand(1,100)}}.svg"
                            class="h-full"alt="...">
                    </div>
                </div>
            </div>

        </div>
    </section>
    <section class="bg-[#DA4167] p-8 lg:px-9 2xl:px-12" id="pokemons_randoms">
        <h1 class="text-[#EBEBD3] text-4xl font-sans font-extrabold mb-9 lg:font-black lg:text-5xl">Random Pokemons
        </h1>
        <div class="grid w-full grid-cols-1 gap-8 md:grid-cols-3 lg:grid-cols-4 2xl:grid-cols-5 ">
            @foreach ($data as $item)
                <x-pokerandom name="{{ $item['name'] }}" id="{{ $item['id'] }}"
                    type="{{ $item['types'][0]['type']['name'] }}"
                    image="{{ isset($item['sprites']['front_shiny']) ? $item['sprites']['front_shiny'] : $item['sprites']['front_default'] }}">
                </x-pokerandom>
            @endforeach
        </div>
    </section>
@endsection

@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.0/flowbite.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
@endsection
