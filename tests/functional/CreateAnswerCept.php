<?php
$I = new FunctionalTester($scenario);

$I->am('user');
$I->wantTo('create an answer');

// log in as your admin user
// This should be id of 1 if you created your manual login for a known user first.
Auth::loginUsingId(1);

// When
$I->amOnPage('home');
$I->see('Answers', 'h1');
$I->dontSee('Test Answer');
// And
$I->click('Add Answer');

// Then
$I->amOnPage('/home/answer/create');
// And
$I->see('Add Answer', 'h1');
$I->submitForm('.createanswers', [
     'answer' => 'Test Answer',
]);
// Then
$I->seeCurrentUrlEquals('/home/answer');
$I->see('Answers', 'h1');
$I->see('New answer added!');
$I->see('Test Answer');
