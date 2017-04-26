<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class adminPanelTest extends TestCase
{
    public function testAdminLogin()
    {
        $this->visit('/admin');
        $this->seePageIs('/admin/login');
        $this->type('admin@admin.com', 'email');
        $this->type('Admin2017!!', 'password');
        $this->press('Login');
        $this->seePageIs('/admin');
       
    }
}
