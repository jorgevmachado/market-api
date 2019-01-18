<?php

namespace App\Repository;

use App\RepositoryFilter\AbstractQueryFilter;
use Doctrine\ORM\EntityRepository as BaseEntityRepository;

/**
 * Class EntityRepository
 *
 * @codeCoverageIgnore
 *
 * @package App\Repository
 */
class EntityRepository extends BaseEntityRepository
{
    public function add($object): void
    {
        $this->checkSelfObject($object);
        $this->_em->persist($object);
        $this->_em->flush($object);
    }

    public function remove($object)
    {
        $this->checkSelfObject($object);
        $this->_em->remove($object);
        $this->_em->flush($object);
    }

    /**
     * @param $object
     * @throws \InvalidArgumentException
     */
    private function checkSelfObject($object)
    {
        if (!is_object($object) || false === strstr(get_class($object), $this->getClassName())) {
            $exceptionMessage = sprintf('expects %s object, %s given', $this->getClassName(), gettype($object));
            if (is_object($object)) {
                $exceptionMessage = sprintf('expects %s object, %s given', $this->getClassName(), get_class($object));
            }
            throw new \InvalidArgumentException($exceptionMessage);
        }
    }

    public function findByFilter(AbstractQueryFilter $filter)
    {
        $qb = $this->createQueryBuilder('_filter');
        $filter->apply($qb);
        return $qb->getQuery()->getResult();
    }

    public function removeAccent($text)
    {
        $from = 'áàâãäéèêëíìîĩïóòôõöúùûũüÁÀÂÃÄÉÈÊËÍÌÎĨÏÓÒÔÕÖÚÙÛŨÜçÇ';
        $to = "aaaaaeeeeiiiiiooooouuuuuAAAAAEEEEIIIIIOOOOOUUUUUcC";
        $text = str_replace($this->mbStrSplit($from), $this->mbStrSplit($to), $text);
        $text = str_replace('%', '', $text);

        return !empty($text) ? '%' . $text . '%' : $text;
    }

    private function mbStrSplit($text)
    {
        return preg_split('~~u', $text, null, PREG_SPLIT_NO_EMPTY);
    }
}
