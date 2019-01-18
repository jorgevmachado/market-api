<?php

namespace App\Business;

use Doctrine\ORM\EntityManager;

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
