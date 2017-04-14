<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // MAIN CATEGORIES
        $category = new App\Category([
            'name' => 'Alcohol & Food',
            'parent_id' => '0'
        ]);
        $category->save();

        $category = new App\Category([
            'name' => 'Books, Magazines',
            'parent_id' => '0'
        ]);
        $category->save();

        $category = new App\Category([
            'name' => 'Cameras',
            'parent_id' => '0'
        ]);
        $category->save();

        $category = new App\Category([
            'name' => 'Cars, Bikes, Boats',
            'parent_id' => '0'
        ]);
        $category->save();

        $category = new App\Category([
            'name' => 'Electronics',
            'parent_id' => '0'
        ]);
        $category->save();

        $category = new App\Category([
            'name' => 'Clothing, Shoes, Accessories',
            'parent_id' => '0'
        ]);
        $category->save();

        $category = new App\Category([
            'name' => 'Computers/Tablets & Networking',
            'parent_id' => '0'
        ]);
        $category->save();

        $category = new App\Category([
            'name' => 'Health & Beauty',
            'parent_id' => '0'
        ]);
        $category->save();

        $category = new App\Category([
            'name' => 'Home Appliances',
            'parent_id' => '0'
        ]);
        $category->save();

        $category = new App\Category([
            'name' => 'Jewellery & Watches',
            'parent_id' => '0'
        ]);
        $category->save();

        $category = new App\Category([
            'name' => 'Phones & Accessories',
            'parent_id' => '0'
        ]);
        $category->save();

        $category = new App\Category([
            'name' => 'Sporting Goods',
            'parent_id' => '0'
        ]);
        $category->save();

        $category = new App\Category([
            'name' => 'Toys, Hobbies',
            'parent_id' => '0'
        ]);
        $category->save();

        $category = new App\Category([
            'name' => 'Video Games & Consoles',
            'parent_id' => '0'
        ]);
        $category->save();

    }
}
