<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class productDatabaseTest extends TestCase
{
   public function testTitleDatabase()
    {

        $this->seeInDatabase('products', ['title' => 'phptest']);
    }
}
