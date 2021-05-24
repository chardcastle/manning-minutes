<?php

namespace App\Models;

class ShiftBreak
{
    public function __construct(
        private Integer $id,
        public Integer $shift_id,
        public \DateTime $start_time,
        public \DateTime $end_time,
    ) {}
}
