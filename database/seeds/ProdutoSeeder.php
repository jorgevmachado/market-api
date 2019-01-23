<?php

use Illuminate\Database\Seeder;

class ProdutoSeeder extends Seeder
{
    /**
     * @var \Doctrine\ORM\EntityManager
     */
    private $em;
    /**
     * @var \App\Repository\ProdutoRepository
     */
    private $repository;

    /**
     * ProdutoSeeder constructor
     * @param \Doctrine\ORM\EntityManager $em
     * @param \App\Repository\ProdutoRepository $repository
     */
    public function __construct(
        \Doctrine\ORM\EntityManager $em,
        \App\Repository\ProdutoRepository $repository)
    {
        $this->em = $em;
        $this->repository = $repository;
    }

    /**
     * @throws \Doctrine\ORM\ORMException
     */
    public function run()
    {
        /** @var \App\Entity\Fabricante  $fabricante1 */
        $fabricante1 = $this->em->getReference(\App\Entity\Fabricante::class,1);
        /** @var \App\Entity\Fabricante  $fabricante2 */
        $fabricante2 = $this->em->getReference(\App\Entity\Fabricante::class,2);
        /** @var \App\Entity\Fabricante  $fabricante3 */
        $fabricante3 = $this->em->getReference(\App\Entity\Fabricante::class,3);
        /** @var \App\Entity\Fabricante  $fabricante5 */
        $fabricante5 = $this->em->getReference(\App\Entity\Fabricante::class,5);
        /** @var \App\Entity\Fabricante  $fabricante6 */
        $fabricante6 = $this->em->getReference(\App\Entity\Fabricante::class,6);
        /** @var \App\Entity\Fabricante  $fabricante7 */
        $fabricante7 = $this->em->getReference(\App\Entity\Fabricante::class,7);
        /** @var \App\Entity\Fabricante  $fabricante8 */
        $fabricante8 = $this->em->getReference(\App\Entity\Fabricante::class,8);
        /** @var \App\Entity\Fabricante  $fabricante9 */
        $fabricante9 = $this->em->getReference(\App\Entity\Fabricante::class,9);
        /** @var \App\Entity\Fabricante  $fabricante10 */
        $fabricante10 = $this->em->getReference(\App\Entity\Fabricante::class,10);

        /** @var \App\Entity\Unidade  $unidade10 */
        $unidade10 = $this->em->getReference(\App\Entity\Unidade::class,10);

        /** @var \App\Entity\Tipo  $tipo1 */
        $tipo1 = $this->em->getReference(\App\Entity\Tipo::class,1);
        /** @var \App\Entity\Tipo  $tipo2 */
        $tipo2 = $this->em->getReference(\App\Entity\Tipo::class,2);
        /** @var \App\Entity\Tipo  $tipo3 */
        $tipo3 = $this->em->getReference(\App\Entity\Tipo::class,3);
        /** @var \App\Entity\Tipo  $tipo4 */
        $tipo4 = $this->em->getReference(\App\Entity\Tipo::class,4);
        /** @var \App\Entity\Tipo  $tipo5 */
        $tipo5 = $this->em->getReference(\App\Entity\Tipo::class,5);

        $entity1 = new \App\Entity\Produto('Pendrive 512Mb' ,                    10.0 , 20.0 ,   40.0 ,   $fabricante1 ,  $unidade10 , $tipo2);
        $entity2 = new \App\Entity\Produto('HD 120 GB' ,                         20.0 , 100.0 ,  180.0 ,  $fabricante2 ,  $unidade10 , $tipo4);
        $entity3 = new \App\Entity\Produto('SD CARD  512MB' ,                    4.0 ,  20.0 ,   35.0 ,   $fabricante3 ,  $unidade10 , $tipo2);
        $entity4 = new \App\Entity\Produto('SD CARD 1GB MINI' ,                  3.0 ,  28.0 ,   40.0 ,   $fabricante1 ,  $unidade10 , $tipo2);
        $entity5 = new \App\Entity\Produto('CAM. FOTO I70 PLATA' ,               5.0 ,  600.0 ,  900.0 ,  $fabricante5 ,  $unidade10 , $tipo1);
        $entity6 = new \App\Entity\Produto('CAM. FOTO DSC-W50 PLATA' ,           4.0 ,  400.0 ,  700.0 ,  $fabricante6 ,  $unidade10 , $tipo1);
        $entity7 = new \App\Entity\Produto('WEBCAM INSTANT VF0040SP' ,           4.0 ,  50.0 ,   80.0 ,   $fabricante7 ,  $unidade10 , $tipo1);
        $entity8 = new \App\Entity\Produto('CPU 775 CEL.D 360  3.46 512K 533M' , 10.0 , 140.0 ,  300.0 ,  $fabricante8 ,  $unidade10 , $tipo4);
        $entity9 = new \App\Entity\Produto('FILMADORA DCR-DVD108' ,              2.0 ,  900.0 ,  1400.0 , $fabricante6 ,  $unidade10 , $tipo1);
        $entity10 = new \App\Entity\Produto('HD IDE  80G 7.200' ,                8.0 ,  90.0 ,   160.0 ,  $fabricante5 ,  $unidade10 , $tipo4);
        $entity11 = new \App\Entity\Produto('IMP LASERJET 1018 USB 2.0' ,        4.0 ,  200.0 ,  300.0 ,  $fabricante9 ,  $unidade10 , $tipo1);
        $entity12 = new \App\Entity\Produto('MEM DDR  512MB 400MHZ PC3200' ,     10.0 , 60.0 ,   100.0 ,  $fabricante5 ,  $unidade10 , $tipo4);
        $entity13 = new \App\Entity\Produto('MEM DDR2 1024MB 533MHZ PC4200' ,    5.0 ,  100.0 ,  170.0 ,  $fabricante3 ,  $unidade10 , $tipo4);
        $entity14 = new \App\Entity\Produto('MON LCD 19 920N PRETO' ,            2.0 ,  500.0 ,  800.0 ,  $fabricante5 ,  $unidade10 , $tipo4);
        $entity15 = new \App\Entity\Produto('MOUSE USB OMC90S OPT.C/LUZ' ,       10.0 , 20.0 ,   40.0 ,   $fabricante5 ,  $unidade10 , $tipo2);
        $entity16 = new \App\Entity\Produto('NB DV6108 CS 1.86/512/80/DVD+RW ' , 2.0 ,  1400.0 , 2500.0 , $fabricante9 ,  $unidade10 , $tipo1);
        $entity17 = new \App\Entity\Produto('NB N220E/B DC 1.6/1/80/DVD+RW ' ,   3.0 ,  1800.0 , 3400.0 , $fabricante6 ,  $unidade10 , $tipo1);
        $entity18 = new \App\Entity\Produto('CAM. FOTO DSC-W90 PLATA' ,          5.0 ,  600.0 ,  1200.0 , $fabricante6 ,  $unidade10 , $tipo1);
        $entity19 = new \App\Entity\Produto('CART. 8767 NEGRO' ,                 20.0 , 30.0 ,   50.0 ,   $fabricante9 ,  $unidade10 , $tipo3);
        $entity20 = new \App\Entity\Produto('CD-R TUBO DE 100 52X 700MB' ,       20.0 , 30.0 ,   60.0 ,   $fabricante5 ,  $unidade10 , $tipo5);
        $entity21 = new \App\Entity\Produto('MEM DDR 1024MB 400MHZ PC3200' ,     7.0 ,  80.0 ,   150.0 ,  $fabricante1 ,  $unidade10 , $tipo4);
        $entity22 = new \App\Entity\Produto('MOUSE PS2 A7 AZUL/PLATA' ,          20.0 , 5.0 ,    15.0 ,   $fabricante10 , $unidade10 , $tipo2);
        $entity23 = new \App\Entity\Produto('SPEAKER AS-5100 HOME PRATA' ,       5.0 ,  100.0 ,  180.0 ,  $fabricante10 , $unidade10 , $tipo2);
        $entity24 = new \App\Entity\Produto('TEC. USB ABNT AK-806' ,             14.0 , 20.0 ,   40.0 ,   $fabricante10 , $unidade10 , $tipo2);

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

    }
}
