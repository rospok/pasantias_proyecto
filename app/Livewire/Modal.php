<?php

namespace App\Livewire;

use Livewire\Component;

class Modal extends Component
{
        public $showDrawer = false;
    public $openFormModal = false;
    public $openRoundedNone = false;
    public $openPersistent = false;
    public function render()
    {
        return view('livewire.modal');
    }
}
