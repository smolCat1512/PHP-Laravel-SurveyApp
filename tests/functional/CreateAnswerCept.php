<?php
$I = new FunctionalTester($scenario);

$I->am('user');
$I->wantTo('create an answer');

// When
$I->amOnPage('/admin/answer');
$I->see('Answers', 'h1');
$I->dontSee('Test Answer');
// And
$I->click('Add Answer');

// Then
$I->amOnPage('/admin/answers/create');
// And
$I->see('Add Answer', 'h1');
$I->submitForm('.createanswers', [
     'answer' => 'Test Answer',
]);
// Then
$I->seeCurrentUrlEquals('/admin/answers');
$I->see('Answers', 'h1');
$I->see('New answer added!');
$I->see('Test Answer');
