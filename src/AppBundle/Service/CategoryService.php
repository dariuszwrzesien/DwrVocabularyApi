<?php

namespace AppBundle\Service;

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
     * @param string $category
     * @return bool
     */
    public function isCategory(string $category) : bool
    {
        $repository = $this->registry->getRepository('AppBundle\Entity\Category');
        return ($repository->findOneBy(['name' => $category])) ? true : false;
    }
}