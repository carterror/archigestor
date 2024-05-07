<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AutorTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_list()
    {
        $response = $this->get('/autor');

        $response->assertStatus(200);
        $response->assertSee('Autores');
    }

    public function test_store_success()
    {
        $response = $this->post('/autor', [
            'nombre' => 'Carlos Brayan',
            'apellido1' => 'Ramila',
            'apellido2' => 'Chorens',
            'no' => 50
        ]);

        $response->assertStatus(302);
        $response->assertRedirect('/autor');

        // $this->get('/autor')->assertSee('Carlos Brayan');
    }

    function test_update_success() {
        $response = $this->post('/autor', [
            'nombre' => 'Nombre1',
            'apellido1' => 'Apellido1',
            'apellido2' => 'Apellido2',
            'no' => 50
        ]);
  
        $response = $this->put('/autor/1', [
            'nombre' => 'Nombre Updated',
        ]);
        $response->assertStatus(302);
    }

    function test_destroy_success() {
        $response = $this->post('/autor', [
            'nombre' => 'Nombre1',
            'apellido1' => 'Apellido1',
            'apellido2' => 'Apellido2',
            'no' => 50
        ]);
  
        $response = $this->delete('/autor/1');
        $response->assertStatus(302);
    }

    public function test_store_fail()
    {
        $response = $this->post('/autor', [
            'no' => 50
        ]);

        $response->assertStatus(302);
        $response->assertSessionHasErrors(['apellido1']);
    }

    function test_update_fail() {
        $response = $this->post('/autor', [
            'nombre' => 'Nombre1',
            'apellido1' => 'Apellido1',
            'apellido2' => 'Apellido2',
            'no' => 50
        ]);
  
        $response = $this->put('/autor/1', [
            'apellido1' => '',
        ]);
        $response->assertSessionHasErrors(['apellido1']);
    }

    function test_destroy_fail() {
        $response = $this->post('/autor', [
            'nombre' => 'Nombre1',
            'apellido1' => 'Apellido1',
            'apellido2' => 'Apellido2',
            'no' => 50
        ]);
  
        $response = $this->delete('/autor/20');
        $response->assertStatus(404);
    }
}
