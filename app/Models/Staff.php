<?php

namespace App\Models;

class Staff
{
    public function __construct(
        public Int $id,
        public Int $shop_id,
        public String $first_name,
        public String $surname,
    ) {}
}
