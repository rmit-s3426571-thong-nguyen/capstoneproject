<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class editProductDetailsTest extends TestCase
{
   public function testCreateMockUser2()
   {
	    $this->visit('/register');
	    $this->seePageIs('/register');
		$this->type('testuser2', 'name');
	    $this->type('testuser2@gmail.com', 'email');
	    $this->type('17/04/2000','birth');
	    $this->type('0411122233','phone');
	    $this->type('sdfafsdafdasf','address');
	    $this->type('melbourne','city');
	    $this->type('victoria','state');
	    $this->type('3000','zip');
	    $this->type('A!1234', 'password');
	    $this->type('A!1234', 'password_confirmation');
	    $this->press('Register');       
 	}

    public function testCreateMockProduct1()
	{
	    $this->visit('/login');
	    $this->seePageIs('/login');
	    $this->type('testuser2@gmail.com', 'email');
	    $this->type('A!1234', 'password');
	    $this->press('Login');
	    $this->seePageIs('/');
	    $this->visit('/products/create');
	    $this->seePageIs('/products/create');
	    $this->type('mockproduct1', 'title');
	    $this->type('fake fake', 'desc');
	    $this->type('1234','price');
	    $this->attach('default.jpg','imageLocation');
	    $this->press('Sell this product');
    }

    /*public function testEditProductDetailsWorking()
    {
        $this->visit('/login');
        $this->seePageIs('/login');
        $this->type('testuser2@gmail.com', 'email');
        $this->type('A!1234', 'password');
        $this->press('Login');
        $this->seePageIs('/');
        $this->visit('/editproduct/59');
        $this->seePageIs('/editproduct/59');
        $this->type('4321', 'price');
        $this->press('Edit');
    }*/

    
}
