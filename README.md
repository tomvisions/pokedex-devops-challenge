<p align="center"><a href="https://pokedex-production-a7b0.up.railway.app/" target="_blank"><img src="https://pokedex-production-a7b0.up.railway.app/images/logo.png" width="400" alt="Laravel Logo"></a></p>
<hr>

The Pokémon Pokédex is an interactive web application that provides users with a comprehensive and user-friendly platform to explore and learn about various Pokémon species. This application harnesses the power of the [PokeAPI](https://pokeapi.co/), a rich and reliable Pokémon API, to offer an immersive experience for Pokémon enthusiasts and casual users alike.

## Demo

https://pokedex-production-a7b0.up.railway.app/

## Project Screenshots


<img src="https://i.ibb.co/4FsBPPv/Proyecto-nuevo-4.png" alt="project-screenshot"/>


## Features

### Search Pokémon

On the home page of the application, users can use the search bar to search for a specific Pokémon. By entering the name or ID of the desired Pokémon in the search field and clicking or pressing Enter, the application will make an AJAX request to the `/get_pokemons` route in the HomeController. This request will internally access the getPokemons method to retrieve information about the searched Pokémon.

The retrieved information, such as the image, name, primary type, and base experience of the Pokémon, will be displayed in a dropdown menu on the interface, allowing users to select the Pokémon they wish to view in more detail.

### View Detailed Pokémon Information in the Pokédex

Once users select a Pokémon from the dropdown menu, the application will automatically redirect them to the route `/pokedex/{nameOrId}` to display detailed information about the selected Pokémon.

The relevant information that can be found in this section includes:

* Pokémon Weight.
* Pokémon Height.
* All Pokémon Types.
* Pokémon Base Experience.
* Pokemon Abilities.
* Pokémon Statistics.

One of the standout features is the visualization of Pokémon evolutions. The application is dynamic and versatile, which means it can handle special cases in the evolution chain of all Pokémon. Whether a Pokémon has a single evolutionary form or multiple evolution options, the application will successfully and intuitively display all available evolutions.

Users can explore the evolution chain of any Pokémon and view all its possible evolutionary forms effortlessly, enhancing their experience in the Pokédex.

### Random Pokemons

Just below the featured image on the home page, users will find a section called "Random Pokemons." This section will make an AJAX request to the `/random` route in the HomeController. The request will internally access the random method to retrieve an array of up to 10 random Pokémon from the PokeAPI.

The information of the random Pokémon, including images and names, will be displayed in this section, allowing users to discover different Pokémon at random.

### Intuitive and Responsive Interface

The application has been developed using Tailwind CSS, a highly configurable and user-friendly CSS framework. Thanks to Tailwind, the user interface is highly intuitive and offers a user-friendly navigation experience.

Additionally, the application is fully responsive, adapting and looking great on various devices and screen sizes, including desktop computers, tablets, and mobile phones. Users can enjoy a consistent and pleasant experience regardless of the device they use.

Emphasizing the dynamic capability to display all evolutions of any Pokémon in the Pokédex highlights the versatility and quality of your application.

## Built with

Technologies used in the project:

<p align="left"> <a href="https://www.w3schools.com/css/" target="_blank" rel="noreferrer"> <img src="https://raw.githubusercontent.com/devicons/devicon/master/icons/css3/css3-original-wordmark.svg" alt="css3" width="40" height="40"/> </a> <a href="https://git-scm.com/" target="_blank" rel="noreferrer"> <img src="https://www.vectorlogo.zone/logos/git-scm/git-scm-icon.svg" alt="git" width="40" height="40"/> </a> <a href="https://www.w3.org/html/" target="_blank" rel="noreferrer"> <img src="https://raw.githubusercontent.com/devicons/devicon/master/icons/html5/html5-original-wordmark.svg" alt="html5" width="40" height="40"/> </a> <a href="https://developer.mozilla.org/en-US/docs/Web/JavaScript" target="_blank" rel="noreferrer"> <img src="https://raw.githubusercontent.com/devicons/devicon/master/icons/javascript/javascript-original.svg" alt="javascript" width="40" height="40"/> </a> <a href="https://laravel.com/" target="_blank" rel="noreferrer"> <img src="https://cdn.jsdelivr.net/gh/devicons/devicon@latest/icons/laravel/laravel-original-wordmark.svg" alt="laravel" width="40" height="40"/> </a> <a href="https://www.php.net" target="_blank" rel="noreferrer"> <img src="https://raw.githubusercontent.com/devicons/devicon/master/icons/php/php-original.svg" alt="php" width="40" height="40"/> </a> <a href="https://tailwindcss.com/" target="_blank" rel="noreferrer"> <img src="https://www.vectorlogo.zone/logos/tailwindcss/tailwindcss-icon.svg" alt="tailwind" width="40" height="40"/> </a> </p>

