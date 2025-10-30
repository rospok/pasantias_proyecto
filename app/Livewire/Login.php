<?php

namespace App\Livewire;

use App\Interfaces\IAuthUser;
use App\Services\AuthUserService;
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Login extends Component
{
    // use LivewireAlert;
    #[Validate]
    public $email;
#[Validate]
    public $password;

    function rules(){
        return [
            'email' => 'required|email|min:3',
            'password' => 'required|min:3',
        ];
    }

    public function login(IAuthUser $AuthUserService)
    {

        $this->validate();
        $request =[
            'email' => $this->email,
            'password' => $this->password
        ];

        if ($AuthUserService->login($request) == ['valid' => true]) {
            session()->flash('message', 'Login successful!');
            LivewireAlert::title('Iniciar sesión')
   ->text('por favor espere un momento')
    ->position('top-end')
    ->toast()
    ->success()
    ->withOptions([
    'timerProgressBar' => true,
    'showConfirmButton' => false,
    'showCancelButton' => false,
    'width' => '400px',
    'background' => '#f0fdf4', // Fondo personalizado para success
    'iconColor' => '#10b981', // Color del icono
    ])
    ->show();
    
    return redirect()->route('view');
    $this->reset(['email', 'password']);
        } else {
            session()->flash('error', 'Invalid credentials.');
        }
    }

    public function render()
    {
        return view('livewire.login');
    }
}
