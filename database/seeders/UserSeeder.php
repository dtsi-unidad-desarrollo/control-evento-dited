<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->name = "Organizador";
        $user->rol = Role::where('nombre', 'ORGANIZER')->first()->id;
        $user->email = "@organizador";
        $user->password = Hash::make(12345678);
        $user->save();

    }
}
