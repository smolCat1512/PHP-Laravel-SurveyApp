<?php
$I = new FunctionalTester($scenario);

$I->am('user');
$I->wantTo('create a question');

// log in as your admin user
// This should be id of 1 if you created your manual login for a known user first.
Auth::loginUsingId(1);

// When
$I->amOnPage('dashboard');
$I->see('Questions');
// And
$I->click('Questions');

// Then
$I->amOnPage('/admin/question');
// And
$I->see('Current Questions');
$I->click('Create Question');

// Then
$I->amOnPage('/question/create');
// And
$I->submitForm('#createquestion', [
     'question' => 'Test Question',
]);
// Then
$I->seeCurrentUrlEquals('/admin/question');
$I->see('Question created');
$I->see('Current Questions');
$I->see('Test Question');