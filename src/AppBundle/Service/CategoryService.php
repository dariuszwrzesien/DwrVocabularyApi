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
     * @var array
     */
    private $repositories;

    /**
     * @param Registry $registry
     */
    public function __construct(Registry $registry)
    {
        $this->registry = $registry;
        $this->repositories[Category::class] = $this->registry->getRepository(Category::class);
    }

    /**
     * Checks if category with passed name exists
     * @param string $categoryName
     * @return bool
     */
    public function isCategory(string $categoryName) : bool
    {
        return ($this->repositories[Category::class]->getByName($categoryName)) ? true : false;
    }

    public function create(Category $category) : Category
    {
        $this->repositories[Category::class]->create($category);
    }
}