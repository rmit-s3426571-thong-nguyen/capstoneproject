<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class passwordChangeTest extends TestCase
{
   public function testCreateMockUser3Working()
        {
            $this->visit('/register');
            $this->seePageIs('/register');
            $this->type('testuser3', 'name');
            $this->type('testuser3@gmail.com', 'email');
            $this->type('17/04/2000','birth');
            $this->type('0411122233','phone');
            $this->type('sdfafsdafdasf','address');
            $this->type('melbourne','city');
            $this->type('VIC','state');
            $this->type('3000','zip');
            $this->type('A!1234', 'password');
            $this->type('A!1234', 'password_confirmation');
            $this->press('Register');       
        }

    public function testEditPasswordWorking()
        {
            $this->visit('/login');
            $this->seePageIs('/login');
            $this->type('testuser3@gmail.com', 'email');
            $this->type('A!1234', 'password');
            $this->press('Login');
            $this->seePageIs('/');
            $this->visit('/editpassword/8');
            $this->seePageIs('/editpassword/8');
            $this->type('A!1233', 'password');
            $this->type('A!1233', 'password_confirmation');
            $this->press('Edit');
            $this->seePageIs('/mydetails/{username}');
        }

    
    public function testEditPasswordReverse()
        {
            $this->visit('/login');
            $this->seePageIs('/login');
            $this->type('testuser3@gmail.com', 'email');
            $this->type('A!1233', 'password');
            $this->press('Login');
            $this->seePageIs('/');
            $this->visit('/editpassword/8');
            $this->seePageIs('/editpassword/8');
            $this->type('A!1234', 'password');
            $this->type('A!1234', 'password_confirmation');
            $this->press('Edit');
            $this->seePageIs('/mydetails/{username}');
        }



    public function testEditPasswordMismatch()
        {
            $this->visit('/login');
            $this->seePageIs('/login');
            $this->type('testuser3@gmail.com', 'email');
            $this->type('A!1234', 'password');
            $this->press('Login');
            $this->seePageIs('/');
            $this->visit('/editpassword/8');
            $this->seePageIs('/editpassword/8');
            $this->type('A!1233', 'password');
            $this->type('A!1234', 'password_confirmation');
            $this->press('Edit');
            $this->seePageIs('/editpassword/8');
        }

    public function testEditPasswordRegex()
        {
            $this->visit('/login');
            $this->seePageIs('/login');
            $this->type('testuser3@gmail.com', 'email');
            $this->type('A!1234', 'password');
            $this->press('Login');
            $this->seePageIs('/');
            $this->visit('/editpassword/8');
            $this->seePageIs('/editpassword/8');
            $this->type('password', 'password');
            $this->type('password', 'password_confirmation');
            $this->press('Edit');
            $this->seePageIs('/editpassword/8');
        }


    


}
