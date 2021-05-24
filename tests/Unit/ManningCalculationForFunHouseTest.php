<?php

namespace Tests\Unit;

use Carbon\Carbon;
use PHPUnit\Framework\TestCase;
use App\Models\Rota;

class ManningCalculationForFunHouseTest extends TestCase
{
    /**
     * @test
     * @dataProvider myTestProvider
     */
    public function test_we_are_testing_calculation_of_rota_minutes_by_given_rota($rota, $expectedMins)
    {
        // TODO assert rota
        $this->assertGreaterThan(0, $expectedMins);
    }

    public function myTestProvider()
    {
        // TODO Provide cases based on the below

        // Given Black Widow working at FunHouse on Monday in one long shift
        // When no-one else works during the day
        // Then Black Widow receives single manning supplement for the whole duration of her shift.

        // Given Black Widow and Thor working at FunHouse on Tuesday
        // When they only meet at the door to say hi and bye
        // Then Black Widow receives single manning supplement for the whole duration of her shift
        // And Thor also receives single manning supplement for the whole duration of his shift.

        // Given Wolverine and Gamora working at FunHouse on Wednesday
        // When Wolverine works in the morning shift
        // And Gamora works the whole day, starting slightly later than Wolverine
        // Then Wolverine receives single manning supplement until Gamorra starts her shift
        // And Gamorra receives single manning supplement starting when Wolverine has finished his shift, until the end of the day.

        return [
            ['Rota 1', 1],
            ['Rota 2', 1],
            ['Rota 3', 1],
        ];
    }
}
