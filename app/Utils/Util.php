<?php

namespace App\Utils;

class Util
{
    public static function formatCurrency($amount)
    {
        return 'Rp' . number_format($amount, 2, '.', '.');
    }
}
