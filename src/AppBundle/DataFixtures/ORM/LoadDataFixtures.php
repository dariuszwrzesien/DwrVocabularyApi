<?php

namespace AppBundle\DataFixtures\ORM;

use DirectoryIterator;
use SimpleXMLElement;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\Word;
use AppBundle\Entity\Category;

class LoadUserData implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $fixturesDirectory = __DIR__ . '/../../../../data'; //do stałych dla fixtures
        foreach (new DirectoryIterator($fixturesDirectory) as $file) {
            if ($file->isFile()) {
                $xml = simplexml_load_file($fixturesDirectory.'/'.$file);
                $category = $manager->getRepository(Category::class);
                if($category->)



    //				if ($categoryService->isCategory($xml->catgory)) {
    //					$category = $categoryService-
    //				} else {
    //					$categoryService->createCategory($xml->catgory);
    //				}
                print_r($xml);
            }
        }
        exit();




		$userAdmin = new User();
		$userAdmin->setUsername('admin');
		$userAdmin->setPassword('test');

		$manager->persist($userAdmin);
		$manager->flush();
	}
}