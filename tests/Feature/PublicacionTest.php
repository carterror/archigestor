<?php

namespace Tests\Feature;


use Tests\TestCase;

class PublicacionTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_list()
    {
        $response = $this->get('/publicacion');

        $response->assertStatus(200);
        $response->assertSee('Publicaciones');
    }

    public function test_store_success()
    {
        $response = $this->post('/publicacion', [
            'materia' => 'materia test',
            'titulo' => 'Titulos test',
            'edicion' => '5',
            'paginas' => 5,
            'fecha' => '21/3',
        ]);

        $response->assertStatus(302);
        $response->assertRedirect('/publicacion');

        $this->get('/publicacion')->assertSee('Titulos test');
    }

    function test_update_success() {
        $response = $this->post('/publicacion', [
            'materia' => 'materia test',
            'titulo' => 'Titulos test',
            'edicion' => '5',
            'paginas' => 5,
            'fecha' => '21/3',
        ]);
  
        $response = $this->put('/publicacion/1', [
            'titulo' => 'Titulos updated',
        ]);
        $response->assertStatus(302);
    }

    function test_destroy_success() {
        $response = $this->post('/publicacion', [
            'materia' => 'materia test',
            'titulo' => 'Titulos test',
            'edicion' => '5',
            'paginas' => 5,
            'fecha' => '21/3',
        ]);
  
        $response = $this->delete('/publicacion/1');
        $response->assertStatus(302);
    }

    public function test_store_fail()
    {
        $response = $this->post('/publicacion', [
            'materia' => 'materia test',
            'edicion' => '5',
            'paginas' => 5,
            'fecha' => '21/3',
        ]);

        $response->assertStatus(302);
        $response->assertSessionHasErrors(['titulo']);
    }

    function test_update_fail() {
        $response = $this->post('/publicacion', [
            'materia' => 'materia test',
            'titulo' => 'Titulos test',
            'edicion' => '5',
            'paginas' => 5,
            'fecha' => '21/3',
        ]);
  
        $response = $this->put('/publicacion/1', [
            'titulo' => '',
        ]);
        $response->assertSessionHasErrors(['titulo']);
    }

    function test_destroy_fail() {
        $response = $this->post('/publicacion', [
            'materia' => 'materia test',
            'titulo' => 'Titulos test',
            'edicion' => '5',
            'paginas' => 5,
            'fecha' => '21/3',
        ]);
  
        $response = $this->delete('/publicacion/20');
        $response->assertStatus(404);
    }
}
