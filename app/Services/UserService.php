<?php

namespace App\Services;

use App\Models\Rol;
use App\Models\User;


use App\Interfaces\ILog;
use App\Interfaces\UserManagementInterface;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Hash;

class UserService implements UserManagementInterface
{

    public function createUser(array $data):User
    {
        $user= User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => $data['password'],
            'role_id' => $data['role_id'],
        ]);

        return $user;

    }

    public function searchEmailAndRol(string $email, int $role)
    {
        return User::where('email', $email)
            ->first();
    }

    public function updateUser(int $id, array $data)
    {
        $user = $this->getUserById($id);
        if ($user) {
            $user->update($data);

            return $user;
        }
        return null;
    }

    public function listUsers()
    {
        return User::with(['rol' => function ($query) {
            $query->select('id', 'name');
        }])
            ->where('role_id', '>', 1)
            ->get();
    }

    public function getUserById(int $id)
    {
        return User::find($id);
    }

    public function toggleUserStatus(int $id)
    {
        $user = $this->getUserById($id);
        $user->status = $user->status == 1 ? 2 : 1;
        $user->save();

        $statusText = ($user->status == 1) ? 'Habilitado' : 'Deshabilitado';

        return $user;
    } 

    // public function selectUser($statusDisableId = null)
    // {
    //     return Rol::select('id', 'name')
    //         ->where('status', 1)
    //         ->where('id', '>', 1)
    //         ->orWhere('id', $statusDisableId)
    //         ->orderBy('name')
    //         ->get();
    // }
}
