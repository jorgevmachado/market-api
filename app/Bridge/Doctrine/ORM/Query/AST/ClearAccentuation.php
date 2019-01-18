<?php

namespace App\Bridge\Doctrine\ORM\Query\AST;

use Doctrine\ORM\Query\AST\Functions\FunctionNode;
use Doctrine\ORM\Query\Lexer;

class ClearAccentuation extends FunctionNode
{
    /**
     * @override
     */
    public function getSql(\Doctrine\ORM\Query\SqlWalker $sqlWalker)
    {
        $platform = $sqlWalker->getConnection()->getDatabasePlatform();

        if (!method_exists($platform, 'getClearAccentuationExpression')) {
            return $sqlWalker->walkStringPrimary($this->firstStringPrimary);
        }

        return $platform->getClearAccentuationExpression(
            $sqlWalker->walkStringPrimary($this->firstStringPrimary)
        );
    }

    /**
     * @override
     */
    public function parse(\Doctrine\ORM\Query\Parser $parser)
    {
        $parser->match(Lexer::T_IDENTIFIER);
        $parser->match(Lexer::T_OPEN_PARENTHESIS);

        $this->firstStringPrimary = $parser->StringPrimary();

        $parser->match(Lexer::T_CLOSE_PARENTHESIS);
    }
}
