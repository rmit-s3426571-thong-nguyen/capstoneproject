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
        // below created by linh
		
		// retrieve role
		$role_user = Role::where('name', 'user')->first();
		$role_admin = Role::where('name', 'admin')->first();
		
		// the following is creating a record for general user & assigning role
		$user = new User();
		$user->name = 'general';
		$user->email = 'general@example.com';
		$user->password = bycrypt('general');
		$user->save();
		$user->roles()->attach($role_user);
		
		// the following is creating a record for admin & assigning role
		$admin = new User();
		$admin->name = 'admin';
		$admin->email = 'admin@example.com';
		$admin->password = bycrypt('admin')
		$admin->save();
		$user->roles()->attach($role_admin);
    }
}
