<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ExampleTest1 extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */


    public function testEmailDatabase()
    {

        $this->seeInDatabase('users', ['email' => 'Hansen@gmail.com']);
    }

    public function testNameDatabase()
    {

        $this->seeInDatabase('users', ['name' => 'Hansen']);
    }

    public function testUserLogin()
    {
        $this->visit('/login');
        $this->type('Hansenn@gmail.com', 'email');
        $this->type('123456', 'password');
        $this->press('Login');
        $this->seePageIs('/login');
    }

      public function testUserLogin2()
    {
        $this->visit('/login');
        $this->type('Hansenn2@gmail.com', 'email');
        $this->type('123456', 'password');
        $this->press('Login');
        $this->seePageIs('/login');
    }

    public function forgotPassword()
    {
        $this->visit('/');
        $this->click('About US');
        $this->seePageIs('/about');
    }
   
}
