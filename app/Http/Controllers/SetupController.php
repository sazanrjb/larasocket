<?php

namespace App\Http\Controllers;

use App\Permission;
use App\Role;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class SetupController extends Controller
{
    protected $user;

    protected $role;

    protected $permission;

    public function __construct(User $user, Role $role, Permission $permission)
    {
        $this->user       = $user;
        $this->role       = $role;
        $this->permission = $permission;
    }

    public function __invoke()
    {
        $admin = $this->role->where('name', 'admin')->first();
        $manager = $this->role->where('name', 'manager')->first();
        $accountant = $this->role->where('name', 'accountant')->first();

        $user = $this->user->create([
            'name'     => 'Sajan',
            'email'    => 'sazanrjb@gmail.com',
            'password' => Hash::make('test123')
        ]);
        $user->attachRole($admin);

        $user = $this->user->create([
            'name'     => 'Ujjwal',
            'email'    => 'ujjwal@gmail.com',
            'password' => Hash::make('test123')
        ]);
        $user->attachRole($manager);

        $user = $this->user->create([
            'name'     => 'Jyoti',
            'email'    => 'jyoti@gmail.com',
            'password' => Hash::make('test123')
        ]);
        $user->attachRole($manager);

        $user = $this->user->create([
            'name'     => 'Madhu',
            'email'    => 'madhu@gmail.com',
            'password' => Hash::make('test123')
        ]);
        $user->attachRole($accountant);
    }
}
