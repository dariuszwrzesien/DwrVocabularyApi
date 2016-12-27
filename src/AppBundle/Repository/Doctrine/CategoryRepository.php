<?php

namespace AppBundle\Repository\Doctrine;

use AppBundle\Entity\Category;
use AppBundle\Repository\CategoryRepositoryInterface;
use Doctrine\ORM\EntityRepository;

class CategoryRepository extends EntityRepository implements CategoryRepositoryInterface
{
    /**
     * Gets category by name
     * @param string $categoryName
     * @return Category
     */
    public function getByName(string $categoryName)
    {
        return $this->_em->getRepository(Category::class)
            ->findOneBy(['name' => $categoryName]);
    }

    public function create(Category $category)
    {
        $p = $this->_em->persist($category);
        $d = $this->_em->flush();
    }
}