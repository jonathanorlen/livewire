<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ContactTest extends TestCase
{   
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function can_register()
    {
        Livewire::test('contact-create')
            ->set('name','Jonathan orlen')
            ->set('phone','082335697078')
            ->call('ContactCreate');
    }
}
