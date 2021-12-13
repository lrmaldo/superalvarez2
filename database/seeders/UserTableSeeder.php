<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;
class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_user = Role::where('name', 'user')->first();
        $role_admin = Role::where('name', 'admin')->first();
      /*   $user = new User();
        $user->name = 'Sucursal1';
        $user->email = 'sucursal1@example.com';
        $user->password = bcrypt('secret');
        $user->save();
        $user->roles()->attach($role_user);
        $user = new User();
        $user->name = 'Admin';
        $user->email = 'admin@example.com';
        $user->password = bcrypt('secret');
        $user->save();
        $user->roles()->attach($role_admin); */

        /* alfredo */
        $user = new User();
        $user->name = 'Admin';
        $user->email = 'Alfredo@gruponts.com.mx';
        $user->password = bcrypt('secret');
        $user->save();
        $user->roles()->attach($role_admin);

        /* leo */
        $user = new User();
        $user->name = 'leo';
        $user->email = 'lrmaldo@gmail.com';
        $user->password = bcrypt('secret');
        $user->save();
        $user->roles()->attach($role_admin);

        
    }
}
