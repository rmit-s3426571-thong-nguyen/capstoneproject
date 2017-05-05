<?php

use Illuminate\Database\Seeder;

class UserCategoriesList extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category = new App\UserCategoriesList([
            'user_id' => 1,
            'cat_id' => 1
        ]);
        $category->save();

        $category = new App\UserCategoriesList([
            'user_id' => 1,
            'cat_id' => 2
        ]);
        $category->save();

        $category = new App\UserCategoriesList([
            'user_id' => 1,
            'cat_id' => 3
        ]);

        $category->save();
    }
}

