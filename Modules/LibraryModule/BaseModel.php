<?php

namespace Modules\LibraryModule;

use Analogue\ORM\Entity;

class BaseModel extends Entity
{
    protected static $allowedFields = [];

    public function __set($key, $value)
    {
        if (!in_array($key, $this::$allowedFields, true)) {
            return;
        }
        parent::__set($key, $value);
    }

    public function setEntityAttribute($key, $value)
    {
        if (!in_array($key, $this::$allowedFields, true)) {
            return;
        }
        parent::setEntityAttribute($key, $value);
    }

    public function toJson($options = 0)
    {
        return parent::toJson($options + JSON_NUMERIC_CHECK);
    }
}
