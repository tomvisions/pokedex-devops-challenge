@extends('layouts.main')

@section('meta')
    <meta name="pokemon-name" content="{{$data['name'] }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('vite')
    @vite(['resources/css/app.css','resources/js/poke.js']) 
@endsection

@section('content')
    <section class="bg-[#EBEBD3] w-full grid grid-cols-2 pt-28 p-10 max-sm:px-5 max-lg:grid-cols-1 min-h-screen">
        <div class="bg-[{{$colorBack}}] grid place-content-center lg:rounded-l-3xl max-lg:rounded-t-3xl">
            <img src="{{$data['sprites']['other']['official-artwork']['front_default']}}" class="xl:w-[30rem] 2xl:w-[40rem]"  alt="" srcset="">
        </div>
        <div class="bg-[#FFFDF7] max-md:rounded-b-3xl lg:rounded-r-3xl p-8 md:p-16 ">
            <h1 class="text-3xl lg:text-5xl 2xl:text-6xl font-bold text-[{{$colorBack}}]">{{Str::ucfirst($data['name'])}}</h1>
            <div class="flex flex-wrap gap-4 mt-2">
                @foreach ($colorTypesAndTypes as $type => $color)
                    <span class="flex items-center text-sm font-medium 2xl:text-lg text-gray-900"><span class="flex w-2.5 h-2.5 bg-[{{$color}}] rounded-full mr-1.5 flex-shrink-0"></span>{{Str::ucfirst($type)}}</span>
                @endforeach
            </div>
            <div class="mt-5 grid grid-cols-2 max-[1200px]:grid-cols-1 min-h-fit">
                <div class="pt-4">
                    <h2 class="text-2xl 2xl:text-4xl font-bold mb-2 text-[{{$color}}]">Usual Data</h2>
                    <span class="font-semibold text-lg 2xl:text-xl mb-1 text-gray-700 flex gap-1">Base experience: <span class="text-[{{$color}}] font-normal">{{$data['base_experience']}} xp</span></span>
                    <span class="font-semibold text-lg 2xl:text-xl mb-1 text-gray-700 flex gap-1">Height: <span class="text-[{{$color}}] font-normal">{{$data['height']/10}} m</span></span>
                    <span class="font-semibold text-lg 2xl:text-xl mb-1 text-gray-700 flex gap-1">Weight: <span class="text-[{{$color}}] font-normal">{{$data['weight']/10}} kg</span></span>

                    <h2 class="text-2xl 2xl:text-4xl font-bold mt-5 mb-2 text-[{{$color}}]">Abilities</h2>
                    <ul class="list-image-[url({{asset('/images/mini_pokeball.png')}})] mt-5">
                        @foreach ($abilities as $ability => $value)
                            <li class="mt-2 mx-7">
                                <span class="font-semibold text-lg 2xl:text-xl mb-1 text-[{{$color}}]">{{str_replace('-',' ', Str::ucfirst($ability))}}</span>
                                <p>{{$value}}</p>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <div class="bg-[#DA4167] rounded-3xl p-4 max-[1200px]:mt-12">
                    <h2 class="text-2xl 2xl:text-4xl font-bold text-[#FFFDF7]">Stats</h2>
                    <hr class="border-4 border-[{{$color}}] rounded-full mt-2 mb-2">
                    @foreach ($data['stats'] as $item)
                        <div class="flex place-content-between align-middle h-8">
                            <p class=" 2xl:text-xl font-bold text-[#EBEBD3]">{{str_replace('-',' ', Str::ucfirst($item['stat']['name']))}}</p>
                            <p class=" 2xl:text-xl font-bold text-[#FFFDF7]">{{$item['base_stat']}}</p>
                        </div>
                        <hr class="border-2 border-[#FFFDF7] rounded-full mt-2 mb-2">
                    @endforeach
                </div>
            </div>
            <div id="accordion1" class="mt-8">
                <h2 id="accordion-heading">
                  <button type="button" class="flex items-center justify-between w-full p-3 font-medium text-left bg-[{{$color}}] text-gray-500 rounded-2xl">
                    <span class="text-2xl 2xl:text-4xl font-bold mb-2 text-[#FFFDF7]">Evolutions</span>
                    <svg data-accordion-icon class="w-3 h-3 shrink-0 text-[#FFFDF7] " id='arrow'aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                      <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5"/>
                    </svg>
                  </button>
                </h2>
                <div id="accordion-body" class="hidden" aria-labelledby="accordion-flush-heading-1">
                  <div class="py-5 grid place-content-center" id="evolutions__container" >
                    <div role="status" class="flex place-content-center">
                        <svg aria-hidden="true" class="inline w-8 h-8 mr-2 text-gray-200 animate-spin fill-[{{$colorBack}}]" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/>
                            <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/>
                        </svg>
                        <span class="sr-only">Loading...</span>
                    </div>
                    <ul class="grid w-full max-[1200px]:grid-cols-1 place-content-center">
                        
                    </ul>
                  </div>
                </div>
            </div>
        </div>
    </section>
    
@endsection

@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.0/flowbite.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
@endsection