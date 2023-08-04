<!-- If you do not have a consistent goal in life, you can not live it in a consistent way. - Marcus Aurelius -->
<nav class=" bg-[#FFFDF7] fixed w-full z-50 top-0 left-0 border-b border-gray-200 shadow-[0_8px_0_0_rgba(0,0,0,0.1)]">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
        <a href="https://github.com/carlossirias" target="_blank" class="flex items-center">
            <img src="{{asset('images/logo.png')}}" alt="" class="w-24">
        </a>
        <div class="flex md:order-1">
            <button data-collapse-toggle="navbar-sticky" type="button"
                class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 "
                aria-controls="navbar-sticky" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 17 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M1 1h15M1 7h15M1 13h15" />
                </svg>
            </button>
        </div>
        <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-2" id="navbar-sticky">
            <ul
                class="flex flex-col p-4 md:p-0 mt-4 font-medium border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 md:mt-0 md:border-0 md:bg-[#FFFDF7] ">
                <li>
                    <a href="{{route('home.index')}}" class="block py-2 pl-3 pr-4 text-[#DA4167] font-bold duration-150 ease-in rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-[#F46197] md:p-0 ">Home</a>
                </li>
                <li>
                    <a href="{{route('home.index')}}#pokemons_randoms" class="block py-2 pl-3 pr-4 text-[#DA4167] font-bold duration-150 ease-in rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-[#F46197] md:p-0 ">Random Pokemons</a>
                </li>

            </ul>
        </div>
    </div>
</nav>
