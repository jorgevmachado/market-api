<?php

use Illuminate\Database\Seeder;

class PessoaSeeder extends Seeder
{
    /**
     * @var \Doctrine\ORM\EntityManager
     */
    private $em;
    /**
     * @var \App\Repository\PessoaRepository
     */
    private $repository;
    /**
     * PessoaSeeder constructor
     * @param \Doctrine\ORM\EntityManager $em
     * @param \App\Repository\PessoaRepository $repository
     */
    public function __construct(
        \Doctrine\ORM\EntityManager $em,
        \App\Repository\PessoaRepository $repository)
    {
        $this->em = $em;
        $this->repository = $repository;
    }
    /**
     * @throws \Doctrine\ORM\ORMException
     */
    public function run()
    {
     /** @var \App\Entity\Cidade $cidade2 */
     $cidade2 = $this->em->getReference(\App\Entity\Cidade::class, 2);
     /** @var \App\Entity\Cidade $cidade1 */
     $cidade1 = $this->em->getReference(\App\Entity\Cidade::class, 1);
     /** @var \App\Entity\Cidade $cidade3 */
     $cidade3 = $this->em->getReference(\App\Entity\Cidade::class, 3);
     /** @var \App\Entity\Cidade $cidade4 */
     $cidade4 = $this->em->getReference(\App\Entity\Cidade::class, 4);
     /** @var \App\Entity\Cidade $cidade6 */
     $cidade6 = $this->em->getReference(\App\Entity\Cidade::class, 6);
     /** @var \App\Entity\Cidade $cidade8 */
     $cidade8 = $this->em->getReference(\App\Entity\Cidade::class, 8);
     /** @var \App\Entity\Cidade $cidade9 */
     $cidade9 = $this->em->getReference(\App\Entity\Cidade::class, 9);
     /** @var \App\Entity\Cidade $cidade10 */
     $cidade10 = $this->em->getReference(\App\Entity\Cidade::class, 10);
     /** @var \App\Entity\Cidade $cidade12 */
     $cidade12 = $this->em->getReference(\App\Entity\Cidade::class, 12);
     /** @var \App\Entity\Cidade $cidade18 */
     $cidade18 = $this->em->getReference(\App\Entity\Cidade::class, 18);
     /** @var \App\Entity\Cidade $cidade19 */
     $cidade19 = $this->em->getReference(\App\Entity\Cidade::class, 19);
     /** @var \App\Entity\Cidade $cidade20 */
     $cidade20 = $this->em->getReference(\App\Entity\Cidade::class, 20);
     /** @var \App\Entity\Cidade $cidade21 */
     $cidade21 = $this->em->getReference(\App\Entity\Cidade::class, 21);
     /** @var \App\Entity\Cidade $cidade22 */
     $cidade22 = $this->em->getReference(\App\Entity\Cidade::class, 22);
     /** @var \App\Entity\Cidade $cidade23 */
     $cidade23 = $this->em->getReference(\App\Entity\Cidade::class, 23);
     /** @var \App\Entity\Cidade $cidade25 */
     $cidade25 = $this->em->getReference(\App\Entity\Cidade::class, 25);
     /** @var \App\Entity\Cidade $cidade26 */
     $cidade26 = $this->em->getReference(\App\Entity\Cidade::class, 26);
     /** @var \App\Entity\Cidade $cidade27 */
     $cidade27 = $this->em->getReference(\App\Entity\Cidade::class, 27);
        $bairro = 'Centro';
        $telefone = '(88) 1234-5678';
        $email = 'naoenvie@email.com';
        $entity1 = new \App\Entity\Pessoa(
            'Amadeu Weirich', 'Rua do Amadeu Weirich',$bairro, $telefone, $email, $cidade18
        );
        $entity2 = new \App\Entity\Pessoa(
            'Andrigo Dametto', 'Rua do Andrigo Dametto',$bairro, $telefone, $email,$cidade3
        );
        $entity3 = new \App\Entity\Pessoa(
            'Enio Silveira', 'Rua do Enio Silveira',$bairro, $telefone, $email,$cidade19
        );
        $entity4 = new \App\Entity\Pessoa(
            'Ari Stopassola Junior','Rua do Ari Stopassola Junior',$bairro, $telefone, $email, $cidade23
        );
        $entity5 = new \App\Entity\Pessoa(
            'Bruno Pitteli Gonçalves', 'Rua do Bruno Pitteli Gonçalves',
            $bairro, $telefone, $email,$cidade26
        );
        $entity6 = new \App\Entity\Pessoa(
            'Carlos Eduardo Ranzi', 'Rua do Carlos Eduardo Ranzi',$bairro, $telefone, $email,$cidade10
        );
        $entity7 = new \App\Entity\Pessoa(
            'Cesar Brod', 'Rua do Cesar Brod',$bairro, $telefone, $email, $cidade4
        );
        $entity8 = new \App\Entity\Pessoa(
            'Edson Funke', 'Rua do Edson Funke',$bairro, $telefone, $email, $cidade8
        );
        $entity9 = new \App\Entity\Pessoa(
            'Fabio Elias Locatelli', 'Rua do Fabio Elias Locatelli',$bairro, $telefone, $email,$cidade25
        );
        $entity10 = new \App\Entity\Pessoa(
            'Fabrício Pretto', 'Rua do Fabrício Pretto',$bairro, $telefone, $email, $cidade12
        );
        $entity11 = new \App\Entity\Pessoa(
            'Felipe Cortez', 'Rua do Felipe Cortez',$bairro, $telefone, $email, $cidade1
        );
        $entity12 = new \App\Entity\Pessoa(
            'João Pablo Silva', 'Rua do João Pablo Silva',$bairro, $telefone, $email,$cidade20
        );
        $entity13 = new \App\Entity\Pessoa(
            'Cândido Fonseca da Silva', 'Rua do Cândido Fonseca da Silva',
            $bairro, $telefone, $email,$cidade21
        );
        $entity14 = new \App\Entity\Pessoa(
            'Mouriac Diemer', 'Rua do Mouriac Diemer', $bairro, $telefone, $email,$cidade9
        );
        $entity15 = new \App\Entity\Pessoa(
            'Leonardo Lemes', 'Rua do Leonardo Lemes',$bairro, $telefone, $email, $cidade22
        );
        $entity16 = new \App\Entity\Pessoa(
            'Luciano Greiner Dos Santos', 'Rua do Luciano Greiner Dos Santos',
            $bairro, $telefone, $email, $cidade23
        );
        $entity17 = new \App\Entity\Pessoa(
            'Matheus Agnes Dias', 'Rua do Matheus Agnes Dias',$bairro, $telefone, $email, $cidade6
        );
        $entity18 = new \App\Entity\Pessoa(
            'Mauricio de Castro', 'Rua do Mauricio de Castro',$bairro, $telefone, $email, $cidade21
        );
        $entity19 = new \App\Entity\Pessoa(
            'Nataniel Rabaioli', 'Rua do Nataniel Rabaioli',$bairro, $telefone, $email, $cidade22
        );
        $entity20 = new \App\Entity\Pessoa(
            'Paulo Roberto Mallmann', 'Rua do Paulo Roberto Mallmann',
            $bairro, $telefone, $email, $cidade20
        );
        $entity21 = new \App\Entity\Pessoa(
            'Rubens Prates', 'Rua do Rubens Prates',$bairro, $telefone, $email, $cidade27
        );
        $entity22 = new \App\Entity\Pessoa(
            'Rubens Queiroz de Almeida', 'Rua do Rubens Queiroz de Almeida',
            $bairro, $telefone, $email, $cidade2
        );
        $entity23 = new \App\Entity\Pessoa(
            'Sergio Crespo Pinto', 'Rua do Sergio Crespo Pinto',$bairro, $telefone, $email, $cidade9
        );
        $entity24 = new \App\Entity\Pessoa(
            'Silvio Cesar Cazella', 'Rua do Silvio Cesar Cazella',$bairro, $telefone, $email, $cidade18
        );
        $entity25 = new \App\Entity\Pessoa(
            'William Prigol Lopes', 'Rua do William Prigol Lopes',$bairro, $telefone, $email, $cidade18
        );
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
    }
}
