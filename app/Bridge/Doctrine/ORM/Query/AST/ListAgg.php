<?php

namespace App\Bridge\Doctrine\ORM\Query\AST;

use Doctrine\ORM\Query\AST\Functions\FunctionNode;
use Doctrine\ORM\Query\Lexer;

class ListAgg extends FunctionNode
{
    /**
     * @override
     */
    public function getSql(\Doctrine\ORM\Query\SqlWalker $sqlWalker)
    {
        $platform = $sqlWalker->getConnection()->getDatabasePlatform();

        if (!method_exists($platform, 'getListAggExpression')) {
            return $sqlWalker->walkStringPrimary($this->firstStringPrimary);
        }

        return $platform->getListAggExpression(
            $sqlWalker->walkStringPrimary($this->firstStringPrimary),
            $sqlWalker->walkStringPrimary($this->secondStringPrimary)
        );
    }

    /**
     * @override
     * list_agg("column",  "delimiter", orderBy)
     */
    public function parse(\Doctrine\ORM\Query\Parser $parser)
    {
        $parser->match(Lexer::T_IDENTIFIER);
        $parser->match(Lexer::T_OPEN_PARENTHESIS);

        $this->firstStringPrimary = $parser->StringPrimary();
        $parser->match(Lexer::T_COMMA);
        $this->secondStringPrimary = $parser->StringPrimary();

        $parser->match(Lexer::T_CLOSE_PARENTHESIS);
    }
}
