<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_example()
    {
        $autor = \App\Models\Autor::create([
            'nombre' => 'Nombre1',
            'apellido1' => 'Apellido1',
            'apellido2' => 'Apellido2',
            'no' => 50
        ]);
    }
}
