<?php

use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $new_role = new \App\Role();
        $new_role->name ='User';
        $new_role->description = 'normal user' ;
        $new_role->save();

        $role_admin = new \App\Role();
        $role_admin->name ='Admin';
        $role_admin->description = 'Admin user' ;
        $role_admin->save();
    }
}
