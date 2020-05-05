<?php
$I = new FunctionalTester($scenario);

$I->am('user');
$I->wantTo('create a question');

// log in as your admin user
// This should be id of 1 if you created your manual login for a known user first.
Auth::loginUsingId(1);

// When
$I->amOnPage('home');
$I->see('Questions');
// And
$I->click('Questions');

// Then
$I->amOnPage('/admin/question');
// And
$I->see('Questions', 'h1');
$I->click('Create Question');

// Then
$I->amOnPage('/admin/questions/create');
// And
$I->submitForm('#createquestion', [
     'question' => 'Test Question',
]);
// Then
$I->seeCurrentUrlEquals('/admin/question');
$I->see('Questions', 'h1');
$I->see('Test Question');