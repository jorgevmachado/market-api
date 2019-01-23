<?php

use Illuminate\Database\Seeder;

class PessoaGrupoSeeder extends Seeder
{
    /**
     * @var \Doctrine\ORM\EntityManager
     */
    private $em;
    /**
     * @var \App\Repository\PessoaGrupoRepository
     */
    private $repository;

    /**
     * PessoaGrupoSeeder constructor
     * @param \Doctrine\ORM\EntityManager $em
     * @param \App\Repository\PessoaGrupoRepository $repository
     */
    public function __construct(
        \Doctrine\ORM\EntityManager $em,
        \App\Repository\PessoaGrupoRepository $repository)
    {
        $this->em = $em;
        $this->repository = $repository;
    }

    /**
     * @throws \Doctrine\ORM\ORMException
     */
    public function run()
    {
        /** @var \App\Entity\Pessoa $pessoa1 */
        $pessoa1 = $this->em->getReference(\App\Entity\Pessoa::class, 1);
        /** @var \App\Entity\Pessoa $pessoa2 */
        $pessoa2 = $this->em->getReference(\App\Entity\Pessoa::class, 2);
        /** @var \App\Entity\Pessoa $pessoa3 */
        $pessoa3 = $this->em->getReference(\App\Entity\Pessoa::class, 3);

        /** @var \App\Entity\Grupo $grupo1 */
        $grupo1 = $this->em->getReference(\App\Entity\Grupo::class, 1);
        /** @var \App\Entity\Grupo $grupo2 */
        $grupo2 = $this->em->getReference(\App\Entity\Grupo::class, 2);
        /** @var \App\Entity\Grupo $grupo3 */
        $grupo3 = $this->em->getReference(\App\Entity\Grupo::class, 3);
        /** @var \App\Entity\Grupo $grupo4 */
        $grupo4 = $this->em->getReference(\App\Entity\Grupo::class, 4);

        $entity1 = new \App\Entity\PessoaGrupo($pessoa1, $grupo1);
        $entity2 = new \App\Entity\PessoaGrupo($pessoa1, $grupo3);
        $entity3 = new \App\Entity\PessoaGrupo($pessoa2, $grupo3);
        $entity4 = new \App\Entity\PessoaGrupo($pessoa2, $grupo4);
        $entity5 = new \App\Entity\PessoaGrupo($pessoa3, $grupo2);
        $entity6 = new \App\Entity\PessoaGrupo($pessoa3, $grupo4);

        $this->repository->add($entity1);
        $this->repository->add($entity2);
        $this->repository->add($entity3);
        $this->repository->add($entity4);
        $this->repository->add($entity5);
        $this->repository->add($entity6);
    }
}
