<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ExpenseTest extends TestCase

{
    use WithFaker, RefreshDatabase;

    /** @test */
   public function user_creates_expense(){

       $this->withoutExceptionHandling();

       $attributes = [

           'expense' => $this->faker->word,
           'amount' => $this->faker->randomDigit,
           'category' => $this->faker->word,
           'paid' => 0,
           'user' => $this->faker->name

       ];

       $this->post('/expenses', $attributes)->assertRedirect('/expenses');

       $this->assertDatabaseHas('expenses', $attributes);

   }
}
