import './bootstrap';
import 'flowbite';
import { Carousel, Dropdown } from 'flowbite';
import $ from "jquery";

const $targetEl = document.getElementById('dropdownMenu');
const $triggerEl = document.getElementById('search');

const optionsTwo = {
    placement: 'right',
    triggerType: 'none',
    offsetSkidding: 0,
    offsetDistance: 10,
    delay: 300,
    ignoreClickOutsideClass: false,
  };

  const dropdown = new Dropdown($targetEl, $triggerEl, optionsTwo);

  $triggerEl.addEventListener('input', ()=>{
    if(screen.width > 770)
    {
        var dato = $('#search').val().toLowerCase() 

        
        $.ajax({
            url:'get_pokemons',
            method: 'POST',
            data:{
                dato:dato
            },
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        }).done(function (res){
            var arr = JSON.parse(res)
            if(arr != null)
            {
                dropdown.show()
                var dropMenu = document.getElementById('dropDownMenu')
                var color = getColorByPokemon(arr['types'][0]['type'].name)
                var div = `
                <a href="pokedex/${arr['name']}">
                <li class="grid grid-cols-[108px_1fr]">
                    <div class="bg-[${color}] h-[108px] rounded-l-xl">
                        <img src="${arr['sprites']['front_default']}" alt="" class="h-full">
                    </div>
                    <div class="bg-[#FFFDF7] rounded-r-xl p-4">
                        <span class="flex items-center text-lg font-bold">${toCapitalCase(arr['name'])}</span>
                        <span class="flex items-center align-middle text-sm font-medium text-gray-900"><span class="flex w-2.5 h-2.5 bg-[${color}] rounded-full mr-1.5 flex-shrink-0"></span>${toCapitalCase(arr['types'][0]['type'].name)}</span>
                        <span class="flex items-center text-sm mt-2">Base experience: <p class="text-lime-400 ml-1">${arr['base_experience'] === null ? 0 : arr['base_experience']}</p></span>
                    </div>
                </li></a>`
                dropMenu.innerHTML = div
            }
            console.log(arr)
        });
        
    }
  })

  $(document).ready(function() {


    $.ajax({
        url: 'random',
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        error: function(xhr, status, error) {
            console.error(error);
        }
        
    }).done(function (res){
        let response = JSON.parse(res)
        var randomContainer = document.getElementById('random__container')

        response.forEach(elemento => {
            randomContainer.innerHTML += `
            <div class="w-full h-80 bg-[#EBEBD3] rounded-2xl shadow-[8px_8px_0_0_rgba(0,0,0,0.1)] px-6">
            <!-- When there is no desire, all things are at peace. - Laozi -->
            <div class="w-full flex justify-center">
                <img src="${elemento['sprites']['front_default']}" alt="" srcset="" class="h-40">
            </div>
            <p class="text-xl font-sans font-bold text-gray-700">${toCapitalCase(elemento['name'])}</p>
            <hr class="border-4 border-[${getColorByPokemon(elemento['types'][0]['type']['name'])}] rounded-full mt-2">
            <span class="flex items-center text-sm font-medium mt-1 text-gray-700"><span class="flex w-2.5 h-2.5 bg-[${getColorByPokemon(elemento['types'][0]['type']['name'])}] rounded-full mr-1.5 flex-shrink-0"></span>${toCapitalCase(elemento['types'][0]['type']['name'])}</span>
            <a href="pokedex/${elemento['name']}" class="block mt-4 text-center p-3 text-slate-100 font-extrabold rounded-xl bg-[#083D77]">Have a look</a>
        </div>`
        })
    })
  })

const buttonSearch = document.getElementById('buttonSearch')

buttonSearch.addEventListener('click', ()=>{
    buttonSearch.href = 'pokedex/'+$('#search').val().toLowerCase();
})

function getColorByPokemon(name)
{
    const types = 
    {
        'bug': '#22c55e',
        'dark': '#3730a3',
        'dragon': '#06b6d4',
        'electric': '#fde047',
        'fairy':'#e11d48',
        'fighting': '#1a2e05',
        'fire': '#b91c1c',
        'flying':'#0e7490',
        'ghost': '#4338ca',
        'grass': '#84cc16',
        'ground': '#854d0e',
        'ice':'#67e8f9',
        'normal': '#3f3f46',
        'poison': '#a21caf',
        'psychic': '#ec4899',
        'rock': '#422006',
        'steal': '#10b981',
        'water': '#2563eb'
    }

    return types[name] ? types[name] : '#6b7280'
}

function toCapitalCase(str) {
    return str.toLowerCase().replace(/(?:^|\s)\w/g, function(match) {
      return match.toUpperCase();
    });
}

const items = [
    {
        position: 0,
        el: document.getElementById('carousel-item-1')
    },
    {
        position: 1,
        el: document.getElementById('carousel-item-2')
    },
    {
        position: 2,
        el: document.getElementById('carousel-item-3')
    },
    {
        position: 3,
        el: document.getElementById('carousel-item-4')
    },
    {
        position: 4,
        el: document.getElementById('carousel-item-5')
    },
];
const options = {
    defaultPosition: 0,
    interval: 6000,
};

const carousel = new Carousel(items, options);
carousel.cycle()