<?php

namespace Tests\Feature;

use App\Models\Autor;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AutorTest extends TestCase
{
    use RefreshDatabase;

    /**
     * get index de autor
     * @test
     * @return void
     */
    public function indexAutor()
    {
        // Context

        $url = '/autor';

        // Actions

        $response = $this->get($url);

        // Response
        $response->assertStatus(200);
        $response->assertSee('Archivo Mujeres | Autores');
    }

    /**
     * post crear de autor
     * @test
     * @return void
     */
    public function storeAutor()
    {
        // Context

        $url = '/autor';
        $record = [
            '_token' => csrf_token(),
            'nombre' => 'Carlos',
            'apellido1' => 'Ramila',
            'apellido2' => 'Chorens',
        ];
        // Actions

        $response = $this->post($url, $record);

        // Response
        $response->assertSee('asd');
        $response->assertRedirect($url);
        $this->assertDatabaseHas('autors', $record);
    }
    /**
     * A basic feature test example.
     *
     * @return void
     */
//     public function loginTest()
//     {
//         // Context
//         $user = Autor::factory()->create([
//             'name' => 'admin',
//             'email' => 'admin@gmail.com',
//             'email_verified_at' => now(),
//             'password' => bcrypt('admin123*'), // password
//         ]);


//         // Actions

//         $response = $this->post('/login', [
//             'email' => 'admin@gmail.com',
//             'password' => 'admin123*'
//         ]);

//         // Response

//         $response->assertStatus(302);
//         $this->assertTrue();
//         $this->assertEquals();


//     }
}
