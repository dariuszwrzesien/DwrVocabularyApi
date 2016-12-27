<?php

namespace AppBundle\Repository\Doctrine;

use AppBundle\Entity\Category;
use AppBundle\Repository\CategoryRepositoryInterface;
use Doctrine\ORM\EntityManager;

class CategoryRepository implements CategoryRepositoryInterface
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

    /**
     * Gets category by name
     * @param string $categoryName
     * @return Category
     */
    public function getByName(string $categoryName) : Category
    {
        return $this->entityManager->getRepository(Category::class)
            ->findOneBy(['name' => $categoryName]);
    }
}