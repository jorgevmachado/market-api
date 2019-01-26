<?php

namespace App\Business;

use Doctrine\ORM\EntityManager;

/**
 * @codeCoverageIgnore
 * Class AbstractBusiness
 * @package App\Business
 */
class AbstractBusiness
{
    /**
     * @var EntityManager
     */
    protected $em;

    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }
}
