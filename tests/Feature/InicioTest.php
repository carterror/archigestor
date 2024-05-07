<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class InicioTest extends TestCase
{
    /**
     * A basic feature test example.
     * @test
     * @return void
     */
    public function showInicio()
    {
        // Context

        $url = '/';

        // Actions

        $response = $this->get('/');

        // Response

        $response->assertStatus(200);
        $response->assertSee('Archivo Mujeres | Inicio');
    }
}
