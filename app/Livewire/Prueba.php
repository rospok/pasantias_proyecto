<?php

namespace App\Livewire;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Attributes\Page;
use Livewire\Component;

class Prueba extends Component
{
    #[Layout('components.layouts.app')]
    
    #[Title('inicio')]
    public $page = 'inicio';

    public function render()
    {
        return view('livewire.prueba')->with("page", $this->page);
    }
}
