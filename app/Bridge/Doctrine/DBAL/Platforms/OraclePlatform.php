<?php

namespace App\Bridge\Doctrine\DBAL\Platforms;

class OraclePlatform extends \Doctrine\DBAL\Platforms\OraclePlatform
{
    public function getExtractYearExpression($value)
    {
        return sprintf('EXTRACT (YEAR FROM %s)', $value);
    }

    public function getListAggExpression($value, $order)
    {
        return sprintf("LISTAGG(%s,',') WITHIN GROUP (ORDER BY %s)", $value, $order);
    }

    public function getClearAccentuationExpression($value, $quote = false)
    {
        return "utl_raw.cast_to_varchar2(nlssort({$value}, 'nls_sort=binary_ai'))";
    }
}
