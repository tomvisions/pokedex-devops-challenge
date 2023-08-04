import 'flowbite';
import $ from "jquery";
import { Accordion } from 'flowbite';
import { first, forEach } from 'lodash';

const accordionItems = [
    {
        id: 'accordion',
        triggerEl: document.querySelector('#accordion-heading'),
        targetEl: document.querySelector('#accordion-body'),
        active: true
    }
]

const options = {
    alwaysOpen: false,
    activeClasses: 'bg-gray-100 text-gray-900',
    inactiveClasses: 'text-gray-500',
    onToggle: (item) => {
        console.log('accordion item has been toggled');
        $('#arrow').toggleClass('rotate-180')
    }
};

const accordion = new Accordion(accordionItems, options);


$(document).ready(function() {
    var pokemonName = $('meta[name="pokemon-name"]').attr('content');
    

    $.ajax({
        url: 'evolutions/'+pokemonName,
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        error: function(xhr, status, error) {
            console.error(error);
        }
        
    }).done(function (res){
        let evolutions = JSON.parse(res)
        var evolutionsContainer= document.getElementById('evolutions__container')
        evolutionsContainer.innerHTML = ''

        let evolutionsDiv = document.createElement('ul')
        evolutionsDiv.className = 'grid w-full max-[1200px]:grid-cols-1 place-content-center'
        evolutionsDiv.id = 'evolutions__div'
        let contador = 0
        console.log(JSON.parse(res))

        if(evolutions[0])
        {
            contador++
            let firtsEvo = evolutions[0]
            evolutionsDiv.innerHTML += 
            `<li id="first" class="grid place-content-center">
                <div class='hover:bg-slate-200 rounded-lg'>
                <a href="${firtsEvo[0]['name']}" ><img class='w-24' src="${firtsEvo[0]['sprites']['front_default']}" alt=""></a>
                </div>
            </li>`
        }

        if(evolutions[1])
        {
            contador++
            let secondEvo = evolutions[1]
            let secondEvoDiv = document.createElement('li')
            secondEvoDiv.className = 'grid grid-cols-2 place-content-center max-[1200px]:grid-cols-1'
            secondEvoDiv.innerHTML += 
            `<div class='w-full h-full flex items-center justify-center'><svg class="grid w-full place-content-center h-24 max-[1200px]:rotate-90" viewBox="0 0 1024 1024" xmlns="http://www.w3.org/2000/svg">
                <path class="h-" fill="#DA4167" d="M338.752 104.704a64 64 0 0 0 0 90.496l316.8 316.8l-316.8 316.8a64 64 0 0 0 90.496 90.496l362.048-362.048a64 64 0 0 0 0-90.496L429.248 104.704a64 64 0 0 0-90.496 0z"/>
            </svg></div>`

            
            var cont = 0

            let imageSecondDiv = document.createElement('div')

            secondEvo.forEach(elemento => {
                cont++
                imageSecondDiv.innerHTML += `
                    <div class='hover:bg-slate-200 rounded-lg'>
                        <a href="${elemento['name']}"><img src="${elemento['sprites']['front_default']}" alt=""></a>
                    </div> `
            })

            
            imageSecondDiv.className = cont > 1 ? 'grid grid-cols-3 place-content-center max-h-fit' : 'grid grid-cols-1 place-content-center max-h-fit'

            secondEvoDiv.appendChild(imageSecondDiv)
            evolutionsDiv.appendChild(secondEvoDiv)
        }

        if(evolutions[2])
        {
            contador++
            let thirdEvo = evolutions[2]
            evolutionsDiv.innerHTML += 
            `<li id="first" class="grid grid-cols-2 place-content-center max-[1200px]:grid-cols-1">
                <svg class="grid w-full place-content-center h-24 max-[1200px]:rotate-90" viewBox="0 0 1024 1024" xmlns="http://www.w3.org/2000/svg">
                    <path fill="#DA4167" d="M338.752 104.704a64 64 0 0 0 0 90.496l316.8 316.8l-316.8 316.8a64 64 0 0 0 90.496 90.496l362.048-362.048a64 64 0 0 0 0-90.496L429.248 104.704a64 64 0 0 0-90.496 0z"/>
                </svg>
                <div class='grid place-content-center max-h-fit hover:bg-slate-200 rounded-lg'>
                <a href="${thirdEvo[0]['name']}"><img src="${thirdEvo[0]['sprites']['front_default']}" alt=""></a>
                </div>
            </li>`
        }
        
        evolutionsContainer.appendChild(evolutionsDiv)

        $('#evolutions__div').addClass(contador == 2 ? 'grid-cols-[1fr_2fr]': contador == 1 ? 'grid-cols'+contador : 'grid-cols-[1fr_2fr_2fr]' )
    })
})