<?php

namespace App\Bridge\Doctrine\DBAL\Platforms;

class SqlitePlatform extends \Doctrine\DBAL\Platforms\SqlitePlatform
{
    public function getExtractYearExpression($value)
    {
        return "strftime('%Y', {$value})";
    }

    public function getListAggExpression($value, $order = null)
    {
        return sprintf("group_concat(%s, ',')", $value);
    }
}
