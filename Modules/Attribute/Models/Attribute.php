<?php

namespace Modules\Attribute\Models;

use Modules\LibraryModule\BaseModel;

class Attribute extends BaseModel
{
    const ID = 'id';
    const NAME = 'name';

    public function __construct($id, $name, $categoryId)
    {
        $this->attributes[self::ID] = $id;
        $this->attributes[self::NAME] = $name;
    }
}
