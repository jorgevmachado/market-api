<?php

use Illuminate\Database\Seeder;

class ItemVendaSeeder extends Seeder
{
    /**
     * @var \Doctrine\ORM\EntityManager
     */
    private $em;
    /**
     * @var \App\Repository\ItemVendaRepository
     */
    private $repository;

    /**
     * ItemVendaSeeder constructor
     * @param \Doctrine\ORM\EntityManager $em
     * @param \App\Repository\ItemVendaRepository $repository
     */
    public function __construct(
        \Doctrine\ORM\EntityManager $em,
        \App\Repository\ItemVendaRepository $repository)
    {
        $this->em = $em;
        $this->repository = $repository;
    }

    /**
     * @throws \Doctrine\ORM\ORMException
     */
    public function run()
    {
        /** @var \App\Entity\Produto $produto1 */
        $produto1 = $this->em->getReference(\App\Entity\Produto::class,1);
        /** @var \App\Entity\Produto $produto2 */
        $produto2 = $this->em->getReference(\App\Entity\Produto::class,2);
        /** @var \App\Entity\Produto $produto3 */
        $produto3 = $this->em->getReference(\App\Entity\Produto::class,3);
        /** @var \App\Entity\Produto $produto4 */
        $produto4 = $this->em->getReference(\App\Entity\Produto::class,4);
        /** @var \App\Entity\Venda $venda1 */
        $venda1 = $this->em->getReference(\App\Entity\Venda::class,1);
        /** @var \App\Entity\Venda $venda2 */
        $venda2 = $this->em->getReference(\App\Entity\Venda::class,2);

        $entity1 = new \App\Entity\ItemVenda(1.0, 40.0,  $produto1, $venda1);
        $entity2 = new \App\Entity\ItemVenda(2.0, 180.0, $produto2, $venda1);
        $entity3 = new \App\Entity\ItemVenda(3.0, 35.0,  $produto3, $venda2);
        $entity4 = new \App\Entity\ItemVenda(4.0, 41.0,  $produto4, $venda2);

        $this->repository->add($entity1);
        $this->repository->add($entity2);
        $this->repository->add($entity3);
        $this->repository->add($entity4);
    }
}
