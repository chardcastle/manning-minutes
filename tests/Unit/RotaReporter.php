<?php

namespace Tests\Unit;

use Carbon\Carbon;
use PHPUnit\Framework\TestCase;
use App\Models\Rota;

class RotaReporter extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_it_gets_shifts_by_shop_id() {
        $shopId = 5;

        $spy = \Mockery::spy(Rota::class);
        $sut = new \App\Models\RotaReporter($spy, $shopId);

        $result = $sut->reportOnNumberOfMinutesWorkedAloneInTheShopEachDayOfTheWeek($shopId);

        $spy->shouldHaveReceived('getShiftsByShopId')
            ->with($shopId);

        $this->assertEquals($result, ['foo', 'bar']);
    }
}
