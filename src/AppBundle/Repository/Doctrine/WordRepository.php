<?php

namespace AppBundle\Repository\Doctrine;

use AppBundle\Entity\Word;
use AppBundle\Repository\WordRepositoryInterface;
use Doctrine\ORM\EntityManager;

class WordRepository implements WordRepositoryInterface
{
    /**
     * @var EntityManager
     */
    private $entityManager;

    /**
     * WordRepository constructor.
     * @param EntityManager $entityManager
     */
    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }
}