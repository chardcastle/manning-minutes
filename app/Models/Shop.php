<?php

namespace App\Models;

class Shop
{
    public function __construct(
        public Int $id,
        public String $name,
    ) {}
}
