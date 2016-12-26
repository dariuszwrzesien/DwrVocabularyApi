<?php

namespace AppBundle\Controller;

trait ServiceTrait
{
    /**
     * @return CategoryService
     */
    public function getCategoryService(): CategoryService
    {
        return $this->get('category.service');
    }
}
