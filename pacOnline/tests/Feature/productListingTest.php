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
   public function testWorkingListProduct()
    {
        $this->visit('/login');
        $this->seePageIs('/login');
        $this->type('jy@gmail.com', 'email');
        $this->type('A!1111', 'password');
        $this->press('Login');
        $this->seePageIs('/');
        $this->visit('/products/create');
        $this->seePageIs('/products/create');
        $this->type('phptest', 'title');
        $this->type('phptest', 'desc');
        $this->type('1234','price');
        $this->type('/public/uploads/productImages/default.jpg','imageLocation');
        $this->press('Sell this product');
    }

    public function testDescMissing()
    {
        $this->visit('/login');
        $this->seePageIs('/login');
        $this->type('jy@gmail.com', 'email');
        $this->type('A!1111', 'password');
        $this->press('Login');
        $this->seePageIs('/');
        $this->visit('/products/create');
        $this->seePageIs('/products/create');
        $this->type('descmissing', 'title');
        $this->type('1234','price');
        $this->type('blah blah','imageLocation');
        $this->press('Sell this product');
    }


    public function testPriceMissing()
    {
        $this->visit('/login');
        $this->seePageIs('/login');
        $this->type('jy@gmail.com', 'email');
        $this->type('A!1111', 'password');
        $this->press('Login');
        $this->seePageIs('/');
        $this->visit('/products/create');
        $this->seePageIs('/products/create');
        $this->type('pricemissing', 'title');
        $this->type('blah','desc');
        $this->type('blah blah','imageLocation');
        $this->press('Sell this product');
    }

    public function testPriceInvalid()
    {
        $this->visit('/login');
        $this->seePageIs('/login');
        $this->type('jy@gmail.com', 'email');
        $this->type('A!1111', 'password');
        $this->press('Login');
        $this->seePageIs('/');
        $this->visit('/products/create');
        $this->seePageIs('/products/create');
        $this->type('priceinvalid', 'title');
        $this->type('phptest', 'desc');
        $this->type('abcd','price');
        $this->type('blah blah','imageLocation');
        $this->press('Sell this product');

    }

    public function testImageMissing()
    {
        $this->visit('/login');
        $this->seePageIs('/login');
        $this->type('jy@gmail.com', 'email');
        $this->type('A!1111', 'password');
        $this->press('Login');
        $this->seePageIs('/');
        $this->visit('/products/create');
        $this->seePageIs('/products/create');
        $this->type('imagemissing', 'title');
        $this->type('phptest', 'desc');
        $this->type('1234','price');
        $this->press('Sell this product');
    }
}
