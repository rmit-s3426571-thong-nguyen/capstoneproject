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
        $this->type('Password1!', 'password');
        $this->press('Login');
        $this->seePageIs('/admin');
       
    }

    public function testAdminPasswordError()
    {
        $this->visit('/admin');
        $this->seePageIs('/admin/login');
        $this->type('admin@admin.com', 'email');
        $this->type('Admin2016!!', 'password');
        $this->press('Login');
        $this->seePageIs('/admin/login');
       
    }

    public function testAdminEmailError()
    {
        $this->visit('/admin');
        $this->seePageIs('/admin/login');
        $this->type('admin@example.com', 'email');
        $this->type('Password1!', 'password');
        $this->press('Login');
        $this->seePageIs('/admin/login');
    }
        
    public function testAdminEmailMissing()
    {
        $this->visit('/admin');
        $this->seePageIs('/admin/login');
        $this->type('Password1!!', 'password');
        $this->press('Login');
        $this->seePageIs('/admin/login');
    }

    public function testAdminPasswordMissing()
    {
        $this->visit('/admin');
        $this->seePageIs('/admin/login');
        $this->type('admin@admin.com', 'email');
        $this->press('Login');
        $this->seePageIs('/admin/login');
    }
}
