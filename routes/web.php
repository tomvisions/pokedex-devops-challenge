<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PokedexController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class,'view'])->name('home.index');

Route::post('/random',[HomeController::class,'random'])->name('get.random');

Route::get('/pokedex/{nameOrId}', [PokedexController::class,'view'])->name('pokedex.get');

Route::post('/pokedex/evolutions/{nameOrID}', [PokedexController::class,'getEvoChain'])->name('pokedex.post');

Route::post('/get_pokemons', [HomeController::class, 'getPokemons'])->name('get.pokemons');
