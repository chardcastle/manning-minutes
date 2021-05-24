<?php

namespace Tests\Feature;

use App\Models\Rota;
use App\Models\RotaReporter;
use App\Models\Shift;
use App\Models\Shop;
use App\Models\Staff;
use Carbon\Carbon;
use Carbon\CarbonImmutable;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class FunHouseShiftTest extends TestCase
{
    protected $shop;

    public function setUp(): void
    {
        $resourceId = 1;
        $dateTime = Carbon::now()->locale('en_GB');
        $rotaStartDate = $dateTime->startOfWeek(Carbon::MONDAY);
        $this->shop = new Shop($resourceId, 'FunHouse');
        $this->staffMember = new Staff($resourceId, $this->shop->id, 'Chris', 'Hardcastle');
        $this->rota = new Rota(
            $resourceId,
            $this->shop->id,
            $dateTime->startOfWeek(Carbon::MONDAY)->toDateTime()
        );
        $this->shift = new Shift(
            $resourceId,
            $this->rota->id,
            $this->staffMember->id,
            $rotaStartDate->setTimeFromTimeString('09:00'),
            $rotaStartDate->setTimeFromTimeString('17:00')
        );
    }

    public function test_it_can_report_on_number_of_minutes_worked_alone_in_the_shop_each_day_of_the_week() {
        $shopId = 5;
        $mockRota = \Mockery::mock(Rota::class);

        $shiftDate = new Carbon('first day of January 2021', 'Europe/London');
        $shifts = [
            new Shift($id = 1, $rota_id = 1, $staff_id = 1, $shiftDate->setTimeFromTimeString('09:00'), $shiftDate->setTimeFromTimeString('17:00')),
            new Shift($id = 2, $rota_id = 1, $staff_id = 2, $shiftDate->setTimeFromTimeString('14:00'), $shiftDate->setTimeFromTimeString('17:00'))
        ];

        $mockRota
            ->shouldReceive('getShiftMinutesByShopId')
            ->andReturn($shifts);
        $sut = new RotaReporter($mockRota, $shopId, $numberOfWeeks = 2);

        $result = $sut->reportOnNumberOfMinutesWorkedAloneInTheShopEachDayOfTheWeek($shopId);

        $this->assertEquals($result, $shifts);
    }
}
