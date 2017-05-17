<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class categoryFilterTest extends TestCase
{
	public function testCategoryFilter()
    {
        $this->visit('/login');
        $this->seePageIs('/login');
        $this->type('jy@gmail.com', 'email');
        $this->type('A!1111', 'password');
        $this->press('Login');
        $this->seePageIs('/');
        $this->visit('/?category=1');
        $this->seePageIs('/?category=1');
    }

    public function testPriceFilter()
    {
        $this->visit('/login');
        $this->seePageIs('/login');
        $this->type('jy@gmail.com', 'email');
        $this->type('A!1111', 'password');
        $this->press('Login');
        $this->seePageIs('/');
        $this->visit('/?category=1');
        $this->seePageIs('/?category=1');

        
    }
}
