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
            $this->type('0411122233','phone');
            $this->type('sdfafsdafdasf','address');
            $this->type('melbourne','city');
            $this->type('victoria','state');
            $this->type('3000','zip');
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
            $this->visit('/edit/16');
            $this->seePageIs('/edit/16');
            $this->type('0433333333', 'phone');
            $this->press('Edit');
            $this->seePageIs('/mydetails/{username}');
        }

    public function testEditDetailsPhoneError()
        {
            $this->visit('/login');
            $this->seePageIs('/login');
            $this->type('testuser1@gmail.com', 'email');
            $this->type('A!1234', 'password');
            $this->press('Login');
            $this->seePageIs('/');
            $this->visit('/edit/16');
            $this->seePageIs('/edit/16');
            $this->type('3333333333', 'phone');
            $this->press('Edit');
            $this->seePageIs('/edit/16');
        }

    public function testEditDetailsZipError()
        {
            $this->visit('/login');
            $this->seePageIs('/login');
            $this->type('testuser1@gmail.com', 'email');
            $this->type('A!1234', 'password');
            $this->press('Login');
            $this->seePageIs('/');
            $this->visit('/edit/16');
            $this->seePageIs('/edit/16');
            $this->type('30000', 'zip');
            $this->press('Edit');
            $this->seePageIs('/edit/16');
        }

    public function testEditDetailsBirthError()
        {
            $this->visit('/login');
            $this->seePageIs('/login');
            $this->type('testuser1@gmail.com', 'email');
            $this->type('A!1234', 'password');
            $this->press('Login');
            $this->seePageIs('/');
            $this->visit('/edit/16');
            $this->seePageIs('/edit/16');
            $this->type('17/13/2000', 'birth');
            $this->press('Edit');
            $this->seePageIs('/edit/16');
        }
    /*public function testEditDetailsEmailError()
        {
            $this->visit('/login');
            $this->seePageIs('/login');
            $this->type('testuser1@gmail.com', 'email');
            $this->type('A!1234', 'password');
            $this->press('Login');
            $this->seePageIs('/');
            $this->visit('/edit/16');
            $this->seePageIs('/edit/16');
            $this->type('testuser1', 'email');
            $this->press('Edit');
            $this->seePageIs('/edit/16');
        }*/
    }

