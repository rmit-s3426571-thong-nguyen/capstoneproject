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
		$role_user = App\Role::where('name', 'user')->first();
		
		// the following is creating a record for general user & assigning role
		$user = new App\User();
		$user->name = 'general';
		$user->email = 'general@example.com';
		$user->birth = '29/02/1993';
		$user->phone = 04123123123;
		$user->address = 'default';
		$user->password = 'general';
		$user->save();
		$user->roles()->attach($role_user);
		
		// the following is creating a record for admin & assigning role
		$role_admin = App\Role::where('name', 'admin')->first();

		$admin = new App\User();
		$admin->name = 'admin';
		$admin->email = 'admin@example.com';
		$admin->birth = '5/06/1990';
		$admin->phone = 04123123123;
		$admin->address = 'default';
		$admin->password = 'admin';
		$admin->save();
		$admin->roles()->attach($role_admin);
    }
}
