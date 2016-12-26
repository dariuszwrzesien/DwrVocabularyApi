<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;

class WordsController extends ApiController
{
    /**
     * @ApiDoc(
     *   description = "Get group of words belong to particular category ",
     *   statusCodes = {
     *     200 = "Returns when words and category is find",
     *     400 = "Returns when data validation fails",
     *   }
     * )
     *
     * @View(serializerGroups={"details"})
     * @param Request $request
     * @return array
     */
    public function getWordsAction(Request $request)
    {
        $category = $request->get('category');
        if ($this->getCategoryService()->isCategory($category)) {
            return $this->getWordsByCategory($category);
        }
    }
}
