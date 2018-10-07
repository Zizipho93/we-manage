<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_user = \App\Role::where('name','=','User')->first();
        $role_admin = \App\Role::where('name','=','Admin')->first();

        $user = new  \App\User();
        $user->name = 'Victor';
        $user->email = 'ter@gmail.com';
        $user->password= bcrypt('terafumba');
        $user->save();
        $user->roles()->attach($role_user);

        $admin_user = new  \App\User();
        $admin_user->name = 'tera';
        $admin_user->email = 'terafumba@gmail.com';
        $admin_user->password= bcrypt('terafumba');
        $admin_user->save();
        $admin_user->roles()->attach($role_admin);
    }
}
