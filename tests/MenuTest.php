<?php

/**
 * Created by PhpStorm.
 * User: aserranoalbert
 * Date: 30/07/15
 * Time: 01:32
 */

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;


class MenuTest extends TestCase
{
    use DatabaseMigrations;

 public function testAccountLink()
 {
     // Guest users

    $this->visit('/')->dontSee('Account');



     $user = $this->createUser();


     $this->actingAs($user)
         ->visit('/')
         ->see('Account');

     $this->click('Account')
         ->seePageIs('account')
         ->see('My account');
 }

}