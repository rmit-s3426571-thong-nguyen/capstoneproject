<?php

use Illuminate\Database\Seeder;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $product = new App\Product([
            'imageLocation' => 'https://images-na.ssl-images-amazon.com/images/I/71pqjnfzgkL._SL1500_.jpg',
            'title' => 'Macbook Air',
            'desc' => "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut id volutpat mi. Morbi at consectetur augue, eget scelerisque urna. Integer quis tortor mattis, porttitor felis ac, efficitur ex. Cras tempor est tellus, sit amet porttitor dolor suscipit ut. Donec et elementum lacus. Praesent a commodo mi. Aliquam viverra ipsum non quam imperdiet, non pulvinar nulla malesuada. In feugiat tortor ac eleifend ullamcorper. Suspendisse potenti.",
            'price' => 1500]);

        $product->save();

        $product = new App\Product([
            'imageLocation' => 'http://www.laptopmag.com/images/uploads/ppress/44886/samsung-ativ-book-9-plus-bigcl.jpg',
            'title' => 'Samsung ATIV Book 9 Plus',
            'desc' => "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut id volutpat mi. Morbi at consectetur augue, eget scelerisque urna. Integer quis tortor mattis, porttitor felis ac, efficitur ex. Cras tempor est tellus, sit amet porttitor dolor suscipit ut. Donec et elementum lacus. Praesent a commodo mi. Aliquam viverra ipsum non quam imperdiet, non pulvinar nulla malesuada. In feugiat tortor ac eleifend ullamcorper. Suspendisse potenti.",
            'price' => 2000]);

        $product->save();

        $product = new App\Product([
            'imageLocation' => 'https://xiaomi-mi.com/uploads/ck/xiaomi-mi-notebook-air-125-gold-002.jpg',
            'title' => 'Xiaomi Air',
            'desc' => "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut id volutpat mi. Morbi at consectetur augue, eget scelerisque urna. Integer quis tortor mattis, porttitor felis ac, efficitur ex. Cras tempor est tellus, sit amet porttitor dolor suscipit ut. Donec et elementum lacus. Praesent a commodo mi. Aliquam viverra ipsum non quam imperdiet, non pulvinar nulla malesuada. In feugiat tortor ac eleifend ullamcorper. Suspendisse potenti.",
            'price' => 1500]);

        $product->save();

        $product = new App\Product([
            'imageLocation' => 'http://blog.lenovo.com/uploads/general/076-01.jpg',
            'title' => 'Thinkpad X1 Carbon',
            'desc' => "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut id volutpat mi. Morbi at consectetur augue, eget scelerisque urna. Integer quis tortor mattis, porttitor felis ac, efficitur ex. Cras tempor est tellus, sit amet porttitor dolor suscipit ut. Donec et elementum lacus. Praesent a commodo mi. Aliquam viverra ipsum non quam imperdiet, non pulvinar nulla malesuada. In feugiat tortor ac eleifend ullamcorper. Suspendisse potenti.",
            'price' => 1300]);

        $product->save();
    }
}
