<?php

namespace App\Utilities;

interface FilterDate
{
    public function handle($value, $flag) : void;
}