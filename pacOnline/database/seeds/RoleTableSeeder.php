<?php

use Illuminate\Database\Seeder;
use App\Role;

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
		$role_user = new \App\Role();
		$role_user->name = 'User';
		$role_user->description = 'General registered users';
		$role_user->save();
		
		$role_admin = new \App\Role();
		$role_admin->name = 'Admin';
		$role_admin->description = 'An administrator';
		$role_admin->save();
    }
}
