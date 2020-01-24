<?php
use Modules\Category\Models\Category;

$I = new ApiTester($scenario);

$category = [
    Category::ID => 124,
    Category::NAME => 'Category 124'
];

$I->haveInDatabase('categories', $category);

$I->wantTo('get category');

$I->sendGET('category/124');

$I->seeResponseCodeIs(200);
$I->seeResponseContainsJson($category);

