<?php

namespace Database\Seeders;

use App\Models\Permiso;
use App\Models\Role;
use App\Models\RolPermiso;
use Illuminate\Database\Seeder;

class RolPermisoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $permisosDeOrganizador = [
            "panel",
            "profiles",
            "users",
            "events",
            "payments",
            "partisans",
            "speakers",
            "reports",
            "certificates"
        ];
        
        $permisosDeParticipante = [
            "profiles",
            "events",
            "partisans",
            "certificates"
        ];
        
        $permisosDePonente = [
            "profiles",
            "events",
            "speakers",
            "certificates"
        ];

        foreach ($permisosDeOrganizador as $key => $value) {
            $permiso = new RolPermiso();
            $permiso->id_rol = Role::where('nombre', 'ORGANIZER')->first()->id;
            $permiso->id_permiso = Permiso::where('nombre', $value)->first()->id;
            $permiso->save();
        }
       
        foreach ($permisosDeParticipante as $key => $value) {
            $permiso = new RolPermiso();
            $permiso->id_rol = Role::where('nombre', 'SPEAKER')->first()->id;
            $permiso->id_permiso = Permiso::where('nombre', $value)->first()->id;
            $permiso->save();
        }
       
        foreach ($permisosDePonente as $key => $value) {
            $permiso = new RolPermiso();
            $permiso->id_rol = Role::where('nombre', 'PARTICIPANT')->first()->id;
            $permiso->id_permiso = Permiso::where('nombre', $value)->first()->id;
            $permiso->save();
        }
    }
}
