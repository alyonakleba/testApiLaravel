<?php
use Modules\Category\Models\Category;

$I = new ApiTester($scenario);

$categoryOne = [
    Category::ID => 224,
    Category::NAME => 'Category 224'
];

$categoryTwo = [
    Category::ID => 225,
    Category::NAME => 'Category 225'
];

$I->haveInDatabase('categories', $categoryOne);
$I->haveInDatabase('categories', $categoryTwo);

$I->wantTo('load category');

$I->sendGET('category');

$I->seeResponseCodeIs(200);
$I->seeResponseContainsJson($categoryOne);
$I->seeResponseContainsJson($categoryTwo);
