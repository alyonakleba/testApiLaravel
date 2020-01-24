<?php

namespace Modules\LibraryModule;

use Analogue\ORM\Entity;

abstract class BaseService
{
    abstract public function build(array $params);

    /**
     * @param Entity $entity
     * @param array $params
     * @return Entity
     */
    protected function setAllParams(Entity $entity, array $params)
    {
        foreach ($params as $paramName => $paramValue) {
            $entity->setEntityAttribute($paramName, $paramValue);
        }

        return $entity;
    }
}