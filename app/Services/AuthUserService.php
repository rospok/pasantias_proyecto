<?php

namespace App\Services;

use App\Interfaces\IAuthUser;
use App\Interfaces\UserManagementInterface;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Session;

class AuthUserService implements IAuthUser {
    
    private $userManagement;
    private $logService; 

    public function __construct(UserManagementInterface $userManagement,) {
         $this->userManagement = $userManagement;
    }

    public function login(array $credentials) { 
        $user = $this->userManagement->searchEmailAndRol(
            $credentials['email'],
            1
        );

        if (Auth::attempt($credentials)) {


            return ['valid' => true];
        }else{

            return ['valid' => false];
        }
    }

    public function logout() { 

        $user=Auth::user()->email;
        Session::flush();
        Auth::logout();
        $this->clearApplicationCaches();
    }
    
    public function register(array $data) { 
        
        $user = $this->userManagement->createUser([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => $data['password'],
            'role_id' => 1,
        ]);

        if(!empty($user)){
            Auth::login($user);
            return ['valid' => true];

        }else{
            return ['error' => 'se creo un problema al momento de registrar', 'valid' => false];
        }
    }

    private function clearApplicationCaches(): void {
        // Limpiar caché de la aplicación
        Cache::flush();

        // Limpiar caché de vistas (opcional)
        if (config('app.env') === 'local') {
            Artisan::call('view:clear');
        }

        // Limpiar caché de rutas (opcional)
        Artisan::call('route:clear');
    }
}