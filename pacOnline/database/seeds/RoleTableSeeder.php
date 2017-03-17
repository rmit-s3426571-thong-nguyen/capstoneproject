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
		$role_user->id = 2;
		$role_user->name = 'user';
		$role_user->description = 'General registered users';
		$role_user->save();
		
		$role_admin = new \App\Role();
		$role_admin->id = 1;
		$role_admin->name = 'admin';
		$role_admin->description = 'An administrator';
		$role_admin->save();
    }
}
