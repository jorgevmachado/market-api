<?php

use Illuminate\Database\Seeder;

class CidadeSeeder extends Seeder
{
    /**
     * @var \Doctrine\ORM\EntityManager
     */
    private $em;

    /**
     * @var \App\Repository\CidadeRepository
     */
    private $repository;

    /**
     * CidadeSeeder constructor
     * @param \Doctrine\ORM\EntityManager $em
     * @param \App\Repository\CidadeRepository $repository
     */
    public function __construct(
        \Doctrine\ORM\EntityManager $em,
        \App\Repository\CidadeRepository $repository
    )
    {
        $this->em = $em;
        $this->repository = $repository;
    }

    /**
     * @throws \Doctrine\ORM\ORMException
     */
    public function run()
    {
        /** @var \App\Entity\Estado $estado1 */
        $estado1 = $this->em->getReference(\App\Entity\Estado::class, 1);
        /** @var \App\Entity\Estado $estado2 */
        $estado2 = $this->em->getReference(\App\Entity\Estado::class, 2);
        /** @var \App\Entity\Estado $estado3 */
        $estado3 = $this->em->getReference(\App\Entity\Estado::class, 3);
        /** @var \App\Entity\Estado $estado4 */
        $estado4 = $this->em->getReference(\App\Entity\Estado::class, 4);
        /** @var \App\Entity\Estado $estado5 */
        $estado5 = $this->em->getReference(\App\Entity\Estado::class, 5);
        /** @var \App\Entity\Estado $estado6 */
        $estado6 = $this->em->getReference(\App\Entity\Estado::class, 6);
        /** @var \App\Entity\Estado $estado7 */
        $estado7 = $this->em->getReference(\App\Entity\Estado::class, 7);
        /** @var \App\Entity\Estado $estado8 */
        $estado8 = $this->em->getReference(\App\Entity\Estado::class, 8);
        /** @var \App\Entity\Estado $estado9 */
        $estado9 = $this->em->getReference(\App\Entity\Estado::class, 9);
        /** @var \App\Entity\Estado $estado10 */
        $estado10 = $this->em->getReference(\App\Entity\Estado::class, 10);
        /** @var \App\Entity\Estado $estado11 */
        $estado11 = $this->em->getReference(\App\Entity\Estado::class, 11);
        /** @var \App\Entity\Estado $estado12 */
        $estado12 = $this->em->getReference(\App\Entity\Estado::class, 12);
        /** @var \App\Entity\Estado $estado13 */
        $estado13 = $this->em->getReference(\App\Entity\Estado::class, 13);
        /** @var \App\Entity\Estado $estado14 */
        $estado14 = $this->em->getReference(\App\Entity\Estado::class, 14);
        /** @var \App\Entity\Estado $estado15 */
        $estado15 = $this->em->getReference(\App\Entity\Estado::class, 15);
        /** @var \App\Entity\Estado $estado16 */
        $estado16 = $this->em->getReference(\App\Entity\Estado::class, 16);
        /** @var \App\Entity\Estado $estado17 */
        $estado17 = $this->em->getReference(\App\Entity\Estado::class, 17);
        /** @var \App\Entity\Estado $estado18 */
        $estado18 = $this->em->getReference(\App\Entity\Estado::class, 18);
        /** @var \App\Entity\Estado $estado19 */
        $estado19 = $this->em->getReference(\App\Entity\Estado::class, 19);
        /** @var \App\Entity\Estado $estado20 */
        $estado20 = $this->em->getReference(\App\Entity\Estado::class, 20);
        /** @var \App\Entity\Estado $estado21 */
        $estado21 = $this->em->getReference(\App\Entity\Estado::class, 21);
        /** @var \App\Entity\Estado $estado22 */
        $estado22 = $this->em->getReference(\App\Entity\Estado::class, 22);
        /** @var \App\Entity\Estado $estado23 */
        $estado23 = $this->em->getReference(\App\Entity\Estado::class, 23);
        /** @var \App\Entity\Estado $estado24 */
        $estado24 = $this->em->getReference(\App\Entity\Estado::class, 24);
        /** @var \App\Entity\Estado $estado25 */
        $estado25 = $this->em->getReference(\App\Entity\Estado::class, 25);
        /** @var \App\Entity\Estado $estado26 */
        $estado26 = $this->em->getReference(\App\Entity\Estado::class, 26);
        /** @var \App\Entity\Estado $estado27 */
        $estado27 = $this->em->getReference(\App\Entity\Estado::class, 27);

        $entity1 = new \App\Entity\Cidade('Aracajú', $estado26);
        $entity2 = new \App\Entity\Cidade('Belém', $estado14);
        $entity3 = new \App\Entity\Cidade('Belo Horizonte', $estado13);
        $entity4 = new \App\Entity\Cidade('Boa Vista', $estado23);
        $entity5 = new \App\Entity\Cidade('Brasília', $estado7);
        $entity6 = new \App\Entity\Cidade('Campo Grande', $estado12);
        $entity7 = new \App\Entity\Cidade('Cuiabá', $estado11);
        $entity8 = new \App\Entity\Cidade('Curitiba', $estado16);
        $entity9 = new \App\Entity\Cidade('Florianópolis', $estado24);
        $entity10 = new \App\Entity\Cidade('Fortaleza', $estado6);
        $entity11 = new \App\Entity\Cidade('Goiânia', $estado9);
        $entity12 = new \App\Entity\Cidade('João Pessoa', $estado15);
        $entity13 = new \App\Entity\Cidade('Macap ', $estado3);
        $entity14 = new \App\Entity\Cidade('Maceió', $estado2);
        $entity15 = new \App\Entity\Cidade('Manaus', $estado4);
        $entity16 = new \App\Entity\Cidade('Natal', $estado20);
        $entity17 = new \App\Entity\Cidade('Palmas', $estado27);
        $entity18 = new \App\Entity\Cidade('Porto Alegre', $estado21);
        $entity19 = new \App\Entity\Cidade('Porto Velho', $estado22);
        $entity20 = new \App\Entity\Cidade('Recife', $estado17);
        $entity21 = new \App\Entity\Cidade('Rio Branco', $estado1);
        $entity22 = new \App\Entity\Cidade('Rio de Janeiro', $estado19);
        $entity23 = new \App\Entity\Cidade('Salvador', $estado5);
        $entity24 = new \App\Entity\Cidade('São Luis', $estado10);
        $entity25 = new \App\Entity\Cidade('São Paulo', $estado25);
        $entity26 = new \App\Entity\Cidade('Teresina', $estado18);
        $entity27 = new \App\Entity\Cidade('Vitória', $estado8);

        $this->repository->add($entity1);
        $this->repository->add($entity2);
        $this->repository->add($entity3);
        $this->repository->add($entity4);
        $this->repository->add($entity5);
        $this->repository->add($entity6);
        $this->repository->add($entity7);
        $this->repository->add($entity8);
        $this->repository->add($entity9);
        $this->repository->add($entity10);
        $this->repository->add($entity11);
        $this->repository->add($entity12);
        $this->repository->add($entity13);
        $this->repository->add($entity14);
        $this->repository->add($entity15);
        $this->repository->add($entity16);
        $this->repository->add($entity17);
        $this->repository->add($entity18);
        $this->repository->add($entity19);
        $this->repository->add($entity20);
        $this->repository->add($entity21);
        $this->repository->add($entity22);
        $this->repository->add($entity23);
        $this->repository->add($entity24);
        $this->repository->add($entity25);
        $this->repository->add($entity26);
        $this->repository->add($entity27);

    }
}
