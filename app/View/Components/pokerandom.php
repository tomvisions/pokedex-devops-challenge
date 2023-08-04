<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\Support\Str;

class pokerandom extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $name;
    public $color; 
    public $id;
    public $type;
    public $image;
    public $bgColor;

    public function __construct($name, $type = 'normal', $id = '1', $image = 'no', $bgColor = '#EBEBD3')
    {
        //
        $this->name = Str::ucfirst($name);
        $this->color = $this->getColorPokemon($type);
        $this->type = Str::ucfirst($type);
        $this->image = $image;
        $this->id = $id;
        $this->bgColor = $bgColor;

    }

    public function getColorPokemon($name)
    {
        $types =array(
            'bug'=> '#22c55e',
            'dark'=> '#3730a3',
            'dragon'=> '#06b6d4',
            'electric'=> '#fde047',
            'fairy'=>'#e11d48',
            'fighting'=> '#1a2e05',
            'fire'=> '#b91c1c',
            'flying'=>'#0e7490',
            'ghost'=> '#4338ca',
            'grass'=>'#84cc16',
            'ground'=> '#854d0e',
            'ice'=>'#67e8f9',
            'normal'=> '#3f3f46',
            'poison'=> '#a21caf',
            'psychic'=> '#ec4899',
            'rock'=>'#422006',
            'steal'=> '#10b981',
            'water'=>'#2563eb'
        );
        
        return isset($types[$name]) ? $types[$name] : '#6b7280';
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.pokerandom');
    }
}
