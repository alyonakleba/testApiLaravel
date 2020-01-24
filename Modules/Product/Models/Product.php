<?php

namespace Modules\Product\Models;

use Modules\LibraryModule\BaseModel;

class Product extends BaseModel
{
    const ID = 'id';
    const NAME = 'name';
    const CATEGORY_ID = 'categoryId';

    public function __construct($id, $name, $categoryId)
    {
        $this->attributes[self::ID] = $id;
        $this->attributes[self::NAME] = $name;
        $this->attributes[self::CATEGORY_ID] = $categoryId;
    }
}
