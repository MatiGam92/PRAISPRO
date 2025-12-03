<?php

namespace Tests\Unit;

use Tests\TestCase;

class CalculadoraTest extends TestCase
{
    public function test_calculo_basico()
    {
        $resultado = 10 * 1.21; // ejemplo de cálculo
        $this->assertEquals(12.10, $resultado);
    }
}
