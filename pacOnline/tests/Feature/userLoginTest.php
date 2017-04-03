<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class userLoginTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    //all functions below added by james
    public function testUserLogin()
    {
        $this->visit('/login');
        $this->seePageIs('/login');
        $this->type('jy@gmail.com', 'email');
        $this->type('A!1111', 'password');
        $this->press('Login');
        $this->seePageIs('/');
        
    }

      public function testUserLoginFail()
    {
        $this->visit('/login');
        $this->seePageIs('/login');
        $this->type('jy@gmail.com', 'email');
        $this->type('A!1111', 'password');
        $this->press('Login');
    }
}
