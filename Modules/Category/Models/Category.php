<?php

namespace Modules\Category\Models;

use Modules\LibraryModule\BaseModel;

class Category extends BaseModel
{
    const ID = 'id';
    const NAME = 'name';
    const IS_ACTIVE = 'isActive';

    public function __construct($id, $name, $isActive)
    {
        $this->attributes[self::ID] = $id;
        $this->attributes[self::NAME] = $name;
        $this->attributes[self::IS_ACTIVE] = $isActive;
    }
}
