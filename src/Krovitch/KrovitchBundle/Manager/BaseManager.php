<?php

namespace Krovitch\KrovitchBundle\Manager;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityNotFoundException;
use Krovitch\KrovitchBundle\Utils\StringUtils;

abstract class BaseManager
{
    protected $entity_manager;

    public function __construct(EntityManager $entity_manager)
    {
        $this->entity_manager = $entity_manager;
    }

    public function save($object_to_persist)
    {
        $entity_manager = $this->getEntityManager();
        $entity_manager->persist($object_to_persist);
        $entity_manager->flush();
    }

    public function delete($mixed)
    {
        $object_to_delete = $mixed;

        if (!is_object($mixed)) {
            $object_to_delete = $this->find($mixed);

            if (!$object_to_delete) {
                throw new EntityNotFoundException();
            }
        }
        $this->getEntityManager()->remove($object_to_delete);
        $this->getEntityManager()->flush();
    }

    public function findAll()
    {
        return $this->getRepository()->findAll();
    }

    public function find($id)
    {
        return $this->getRepository()->find($id);
    }

    protected function getRepository($repositoryName = null)
    {
        if (!$repositoryName) {
            $repositoryName = StringUtils::getEntityClassName($this);
        }
        return $this->getEntityManager()->getRepository('KrovitchBundle:Hero');
    }

    protected function getEntityManager()
    {
        return $this->entity_manager;
    }
}