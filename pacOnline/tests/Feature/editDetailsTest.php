<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class editDetailsTest extends TestCase
{
   public function testEditDetailsWorking()
    {
        $this->visit('/login');
        $this->seePageIs('/login');
        $this->type('bla3@bla.com', 'email');
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
