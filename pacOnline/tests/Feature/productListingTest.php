<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class productListingTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
   public function testListProduct()
    {
        $this->visit('/login');
        $this->seePageIs('/login');
        $this->type('Hansen@gmail.com', 'email');
        $this->type('A1!!!!', 'password');
        $this->press('Login');
        $this->seePageIs('/');
        $this->visit('/products/create');
        $this->seePageIs('/products/create');
        $this->type('phptest', 'title');
        $this->type('phptest', 'desc');
        $this->type('1234','price');
        $this->type('blah blah','imageLocation');
        $this->press('Sell this product');
    }
}
