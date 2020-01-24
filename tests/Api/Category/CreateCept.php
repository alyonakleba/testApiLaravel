<?php

use Modules\Category\Models\Category;

$I = new ApiTester($scenario);

$I->wantTo('create category');

$document = [
    Category::NAME => 'New category'
];

$I->dontSeeInDatabase('categories', $category);

$I->sendPOST('category', $category);

$I->seeResponseCodeIs(200);
$I->seeResponseContainsJson($category);
$I->seeInDatabase('category', $category);
