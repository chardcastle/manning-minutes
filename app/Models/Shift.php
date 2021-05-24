<?php

namespace App\Models;

class Shift
{
    public function __construct(
        private Int $id,
        public Int $rota_id,
        public Int $staff_id,
        public \DateTime $start_time,
        public \DateTime $end_time,
    ) {}
}
