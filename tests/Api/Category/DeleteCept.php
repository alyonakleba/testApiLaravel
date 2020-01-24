<?php

use Modules\Category\Models\Category;

$I = new ApiTester($scenario);

$category = [
    Category::ID => 123,
];

$I->haveInDatabase('categories', $category);

$I->wantTo('delete category');

$I->sendDELETE('category/123');

$I->seeResponseCodeIs(204);
$I->cantSeeInDatabase('categories', [Category::ID => 123]);
