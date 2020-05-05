<?php
$I = new FunctionalTester($scenario);

$I->am('user');
$I->wantTo('create an answer');

// log in as your admin user
// This should be id of 1 if you created your manual login for a known user first.
Auth::loginUsingId(1);

// When
$I->amOnPage('home');
$I->see('Answers');
// And
$I->click('Answers');

// Then
$I->amOnPage('/admin/answer');
// And
$I->see('Answers', 'h1');
$I->click('Create Answer');

// Then
$I->amOnPage('/admin/answers/create');
// And
$I->submitForm('#createanswer', [
     'answer' => 'Test Answer',
]);
// Then
$I->seeCurrentUrlEquals('/admin/answer');
$I->see('Answers', 'h1');
$I->see('Test Answer');