<div class="w-full h-80 bg-[{{$bgColor}}] rounded-2xl shadow-[8px_8px_0_0_rgba(0,0,0,0.1)] px-6">
    <!-- When there is no desire, all things are at peace. - Laozi -->
    <div class="w-full flex justify-center">
        <img src="{{$image}}" alt="{{$name}}" srcset="" class="h-40">
    </div>
    <p class="text-xl font-sans font-bold text-gray-700">{{$name}}</p>
    <hr class="border-4 border-[{{$color}}] rounded-full mt-2">
    <span class="flex items-center text-sm font-medium mt-1 text-gray-700"><span class="flex w-2.5 h-2.5 bg-[{{$color}}] rounded-full mr-1.5 flex-shrink-0"></span>{{$type}}</span>
    <a href="pokedex/{{Str::lower($name)}}" class="block mt-4 text-center p-3 text-slate-100 font-extrabold rounded-xl bg-[#083D77]">Have a look</a>
</div>