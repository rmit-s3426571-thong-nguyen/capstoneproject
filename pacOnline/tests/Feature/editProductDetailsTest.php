<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class editProductDetailsTest extends TestCase
{
   public function testCreateMockUser2Working()
        {
            $this->visit('/register');
            $this->seePageIs('/register');
            $this->type('testuser2', 'name');
            $this->type('testuser2@gmail.com', 'email');
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
}
