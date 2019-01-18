<?php

namespace App\Repository;

use App\RepositoryFilter\AbstractQueryFilter;
use Doctrine\ORM\AbstractQuery;
use LaravelDoctrine\ORM\Pagination\PaginatorAdapter;

/**
 * Class EntityRepositoryWithPaginator
 *
 * @codeCoverageIgnore
 * @package App\Repository
 */
class EntityRepositoryWithPaginator extends EntityRepository
{
    protected $page = 1;

    protected $perPage = 15;

    public function setPage(int $page): self
    {
        $this->page = $page;
        return $this;
    }

    public function setPerPage(int $perPage): self
    {
        $this->perPage = $perPage;
        return $this;
    }

    public function getPage(): int
    {
        return $this->page;
    }

    public function getPerPage(): int
    {
        return $this->perPage;
    }

    public function paginateAll()
    {
        $query = $this->createQueryBuilder('o')->getQuery();

        return $this->paginate($query, false);
    }

    public function paginate(AbstractQuery $query, $fetchJoinCollection = true)
    {
        return PaginatorAdapter::fromParams(
            $query,
            $this->getPerPage(),
            $this->getPage(),
            $fetchJoinCollection
        )->make();
    }

    public function paginateByFilter(
        AbstractQueryFilter $filter,
        $fetchInjectionJoin = true,
        $order = '',
        $sort = 'ASC'
    ) {
        $qb = $this->createQueryBuilder('_filter');

        if (!empty($order)) {
            $qb->orderBy('_filter.' . $order, $sort);
        }

        $filter->apply($qb);
        return $this->paginate($qb->getQuery(), $fetchInjectionJoin);
    }
}
