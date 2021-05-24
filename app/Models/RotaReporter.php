<?php

namespace App\Models;

class RotaReporter
{
    public function __construct(
        public Rota $rota,
        public int $shop_id,
        public int $number_of_weeks,
    ) {}

    public function reportOnNumberOfMinutesWorkedAloneInTheShopEachDayOfTheWeek() {
        $shiftData = $this->rota->getShiftMinutesByShopId($this->shop_id, $this->number_of_weeks);

        $reportSummary = new ManningDTO($shiftData);
        return $reportSummary->minutesGroupedByDay();
    }
}
