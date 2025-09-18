<?php
declare(strict_types=1);

namespace App\Traits;

trait FormatTrait
{
    public function formatDecimal($value, $decimal = 2) : string
    {
        //Replace ',' by '.'
        $value = str_replace(',', '.',$value);
        return number_format((float)$value,$decimal,'.','');
    }
}

