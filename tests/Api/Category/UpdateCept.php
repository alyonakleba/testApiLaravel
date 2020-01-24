<?php
use Modules\Category\Models\Category;

$I = new ApiTester($scenario);

$category = [
    Category::ID => 230,
    Category::NAME => 'Category 230'
];

$I->haveInDatabase('categories', $category);

$I->wantTo('update category');

$updatedCategory = array_merge($category, [Category::NAME => 'Category updated name']);

$I->sendPUT('category/230', $updatedCategory);

$I->seeResponseCodeIs(200);
$I->seeResponseContainsJson($updatedCategory);
$I->seeInDatabase('categories', $updatedCategory);
