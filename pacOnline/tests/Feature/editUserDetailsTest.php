<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class editDetailsTest extends TestCase
{
   

    public function testCreateMockUser1Working()
        {
            $this->visit('/register');
            $this->seePageIs('/register');
            $this->type('testuser1', 'name');
            $this->type('testuser1@gmail.com', 'email');
            $this->type('17/04/2000','birth');
            $this->type('0411122233','Phone');
            $this->type('sdfafsdafdasf','Address');
            $this->type('melbourne','City');
            $this->type('VIC','State');
            $this->type('3000','ZIP');
            $this->type('A!1234', 'password');
            $this->type('A!1234', 'password_confirmation');
            $this->press('Register');       
        }


    public function testEditDetailsWorking()
        {
            $this->visit('/login');
            $this->seePageIs('/login');
            $this->type('testuser1@gmail.com', 'email');
            $this->type('A!1234', 'password');
            $this->press('Login');
            $this->seePageIs('/');
            $this->visit('/edit/1');
            $this->seePageIs('/edit/1');
            $this->type('333333333', 'Phone');
            $this->type('A!1234', 'password');
            $this->type('A!1234', 'password_confirmation');
            $this->press('Edit');
        }
    }

