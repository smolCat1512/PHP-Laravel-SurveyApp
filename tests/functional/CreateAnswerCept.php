<?php
$I = new FunctionalTester($scenario);

$I->am('user');
$I->wantTo('create an answer');

// log in as your admin user
// This should be id of 1 if you created your manual login for a known user first.
Auth::loginUsingId(1);

// When
$I->amOnPage('dashboard');
$I->see('Answers');
// And
$I->click('Answers');

// Then
$I->amOnPage('/admin/answer');
// And
$I->see('Current Answers');
$I->click('Create Answer');

// Then
$I->amOnPage('/answer/create');
// And
$I->submitForm('#createanswer', [
     'answer' => 'Test Answer',
]);
// Then
$I->seeCurrentUrlEquals('/admin/answer');
$I->see('Answer created');
$I->see('Current Answers');
$I->see('Test Answer');