<?php

namespace AppBundle\Repository\Doctrine;

use AppBundle\Repository\WordRepositoryInterface;
use Doctrine\ORM\EntityRepository;

class WordRepository extends EntityRepository implements WordRepositoryInterface
{

}
