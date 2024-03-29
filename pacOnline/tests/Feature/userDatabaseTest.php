<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class databaseTest extends TestCase
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
}