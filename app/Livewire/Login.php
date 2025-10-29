<?php

namespace App\Livewire;

use Livewire\Attributes\Validate;
use Livewire\Component;

class Login extends Component
{
#[Validate('required|email|min:3')]
    public $email;

    #[Validate('required|min:3', onUpdate: true)]
    public $password;

    public function login()
    {
        $this->validate();

        $this->reset(['email', 'password']);

        if ($this->email === 'admin@example.com' && $this->password === 'password') {
            session()->flash('message', 'Login successful!');
            return redirect()->route('view');
        } else {
            session()->flash('error', 'Invalid credentials.');
        }
    }

    public function render()
    {
        return view('livewire.login');
    }
}
