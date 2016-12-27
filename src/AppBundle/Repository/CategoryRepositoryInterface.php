<?php

namespace AppBundle\Repository;

use AppBundle\Entity\Category;

interface CategoryRepositoryInterface
{
    public function getByName(string $categoryName);
}
