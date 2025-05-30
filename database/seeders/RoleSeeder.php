<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

       $rolDos = new Role();
       $rolDos->nombre = "ORGANIZER";
       $rolDos->save();

       $rolTres = new Role();
       $rolTres->nombre = "SPEAKER";
       $rolTres->save();

       
       $rolFour = new Role();
       $rolFour->nombre = "PARTICIPANT";
       $rolFour->save();
    }
}
