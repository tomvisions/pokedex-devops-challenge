<?php

namespace Tests\Unit;

use App\Http\Controllers\PokedexController;
use PHPUnit\Framework\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */

    public function test_function_pass()
    {
        $hola = new PokedexController;
    }

    public function test_that_true_is_true()
    {
        $hola = new PokedexController;
        $hola->getEvoChain('pikachu');

        dd($hola);
    }
}
