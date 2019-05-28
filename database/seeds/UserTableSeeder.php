<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles_user = Role::where('name', 'user')->first();  // Trae la informacion del usuario y el administrador y coment
        $roles_admin = Role::where('name', 'admin')->first();
        $roles_comen = Role::where('name', 'coment')->first();

        //**********SE ASIGNAN LOS ROLES*******************
        $user = new User();
        $user->name = "User";
        $user->email = "user@mail.com";
        $user->password = bcrypt('query');
        $user->save();
        $user->roles()->attach($roles_user);//SE RELACIONAN LOS DOS MODELOS

        $user = new User();
        $user->name = "Admin";
        $user->email = "admin@mail.com";
        $user->password = bcrypt('query');
        $user->save();
        $user->roles()->attach($roles_admin);//SE RELACIONAN OS DOS MODELOS

        $user = new User();
        $user->name = "coment";
        $user->email = "comen@mail.com";
        $user->password = bcrypt('query');
        $user->save();
        $user->roles()->attach($roles_comen);//SE RELACIONAN OS DOS MODELOS


    }
}
