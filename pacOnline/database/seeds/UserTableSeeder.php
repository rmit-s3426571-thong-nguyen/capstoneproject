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
        // below created by linh
		
		// retrieve role
		$role_user = Role::where('name', 'User')->first();
		$role_admin = Role::where('name', 'Admin')->first();
		
		// the following is creating a record for general user & assigning role
		$user = new User();
		$user->first_name = 'General';
		$user->last_name = 'User';
		$user->email = 'generaluser@pac.com';
		$user->password = bycrypt('general');
		$user->save();
		$user->roles()->attach($role_user);
		
		// the following is creating a record for admin & assigning role
		$admin = new User();
		$admin->first_name = 'Admin';
		$admin->last_name = 'User';
		$admin->email = 'admin@pac.com';
		$admin->password = bycrypt('admin')
		$admin->save();
		$user->roles()->attach($role_admin);
    }
}
