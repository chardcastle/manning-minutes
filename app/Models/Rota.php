<?php

namespace App\Models;

use Carbon\Carbon;

class Rota
{
    public function __construct(
        public Int $id,
        public Int $shop_id,
        public \DateTime $week_commence_date
    ) {}

    public function getShiftMinutesByShopId($shopId, $numberOfWeeks) {
        $dateFrom = Carbon::now();
        $dateTo = Carbon::now()->subWeeks($numberOfWeeks);

        // Select shifts from App\Model\Shift
        // Subtract intersection of App\Model\ShiftBreak

        // Return array of shift minutes, grouped by weekday
    }
}
