<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */

    public function testNewUserRegistration()
    {
        $this->visit('/register');
        $this->type('Hansenn13', 'name');
        $this->type('Hansenn13@gmail.com', 'email');
        $this->type('123456', 'password');
        $this->type('123456', 'password_confirmation');
        $this->press('Register');
        $this->seePageIs('/');
    }

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
        $this->seePageIs('/');
    }

      public function testUserLogin2()
    {
        $this->visit('/login');
        $this->type('Hansenn2@gmail.com', 'email');
        $this->type('123456', 'password');
        $this->press('Login');
        $this->seePageIs('/');
    }

    public function forgotPassword()
    {
        $this->visit('/');
        $this->click('About US');
        $this->seePageIs('/about');
    }
   
}
