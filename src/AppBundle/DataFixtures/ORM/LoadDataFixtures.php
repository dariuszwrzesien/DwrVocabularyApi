<?php

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\Category;
use AppBundle\Entity\Word;
use DirectoryIterator;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

class LoadUserData implements FixtureInterface, ContainerAwareInterface
{
    /**
     * @var ContainerInterface
     */
    private $container;

    /**
     * @param ContainerInterface|null $container
     */
    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }

    public function load(ObjectManager $manager)
    {
        $fixturesDirectory = __DIR__ . '/../../../../data'; //do stałych dla fixtures


        foreach (new DirectoryIterator($fixturesDirectory) as $file) {
            if ($file->isFile()) {
                $xml = simplexml_load_file($fixturesDirectory.'/'.$file);
                $categoryService = $this->container->get('category.service');
                if ($categoryService->isCategory($xml->category)) {
                    $category = $categoryService->getByName($xml->category);
                } else {
                        $category = new Category();
                        $category->setName('dupa');

                        $word = new Word();
                        $word->setOrigin('asd');
                        $word->setTranslation('dsa');

//                        var_dump($category);
//                        var_dump($word);

                        $c = $manager->persist($category);
                        $w = $manager->persist($word);
                        $f = $manager->flush();


                    var_dump($c);
                    var_dump($w);
                    var_dump($f);
//                    die(__FILE__ . ':'. __LINE__);

                }



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