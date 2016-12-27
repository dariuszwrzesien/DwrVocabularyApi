<?php

namespace AppBundle\Service;

use AppBundle\Entity\Category;
use Doctrine\Bundle\DoctrineBundle\Registry;

class CategoryService
{
    /**
     * @var Registry
     */
    private $registry;
    /**
     * @param Registry $registry
     */
    public function __construct(Registry $registry)
    {
        $this->registry = $registry;
    }

    /**
     * @param string $categoryName
     * @return bool
     */
    public function isCategory(string $categoryName) : bool
    {
        $categoryRepository = $this->registry->getRepository(Category::class);
        return ($categoryRepository->getByName($categoryName)) ? true : false;
    }
}