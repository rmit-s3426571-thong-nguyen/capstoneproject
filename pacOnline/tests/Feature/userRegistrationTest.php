<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class userRegistration extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */

    public function testWorking()
    {
        $this->visit('/register');
        $this->seePageIs('/register');
        $this->type('Hansen', 'name');
        $this->type('Hansen@gmail.com', 'email');
        $this->type('17/04/2000','birth');
        $this->type('0411122233','Phone');
        $this->type('sdfafsdafdasf','Address');
        $this->type('A1!!!!', 'password');
        $this->type('A1!!!!', 'password_confirmation');
        $this->press('Register');       
    }
    /*

    public function testEmailError()
    {
        $this->visit('/register');
        $this->seePageIs('/register');
        $this->type('Hansen1', 'name');
        $this->type('Hansen1', 'email');
        $this->type('17/04/2000','birth');
        $this->type('0411122233','Phone');
        $this->type('sdfafsdafdasf','Address');
        $this->type('A1!!!!', 'password');
        $this->type('A1!!!!', 'password_confirmation');
        $this->press('Register');
        //$this->expectException(ValidationException::class); 
    }

    public function testPasswordError1()
    {
        $this->visit('/register');
        $this->seePageIs('/register');
        $this->type('Hansen2', 'name');
        $this->type('Hansen2@gmail.com', 'email');
        $this->type('17/04/2000','birth');
        $this->type('0411122233','Phone');
        $this->type('sdfafsdafdasf','Address');
        $this->type('123456', 'password');
        $this->type('123456', 'password_confirmation');
        $this->press('Register');
        //$this->expectException(ValidationException::class);
    }

    public function testPasswordMismatch()
    {
        $this->visit('/register');
        $this->seePageIs('/register');
        $this->type('Hansen3', 'name');
        $this->type('Hansen3@gmail.com', 'email');
        $this->type('17/04/2000','birth');
        $this->type('0411122233','Phone');
        $this->type('sdfafsdafdasf','Address');
        $this->type('A1!!!!', 'password');
        $this->type('A1!!!!!', 'password_confirmation');
        $this->press('Register');
        //$this->expectException(ValidationException::class);
    }

    public function testPasswordError2()
    {
        $this->visit('/register');
        $this->seePageIs('/register');
        $this->type('James', 'name');
        $this->type('james@gmail.com', 'email');
        $this->type('17/04/2000','birth');
        $this->type('0411122233','Phone');
        $this->type('sdfafsdafdasf','Address');
        $this->type('A11111', 'password');
        $this->type('A11111', 'password_confirmation');
        $this->press('Register');
        //$this->expectException(ValidationException::class);
    }

    public function testEmailinUse()
    {
        $this->visit('/register');
        $this->seePageIs('/register');
        $this->type('James', 'name');
        $this->type('Hansen@gmail.com', 'email');
        $this->type('17/04/2000','birth');
        $this->type('0411122233','Phone');
        $this->type('sdfafsdafdasf','Address');
        $this->type('A1!!!!', 'password');
        $this->type('A1!!!!', 'password_confirmation');
        $this->press('Register');
        //$this->expectException(ValidationException::class);
    }*/

}