<?php
$I = new FunctionalTester($scenario);

$I->am('user');
$I->wantTo('create a questionnaire');

// log in as your admin user
// This should be id of 1 if you created your manual login for a known user first.
Auth::loginUsingId(1);

// When
$I->amOnPage('home');
$I->see('Questionnaires', 'h1');
// And
$I->click('Create Questionnaire');

// Then
$I->amOnPage('/admin/questionnaires');
// And
$I->see('Create Questionnaire', 'h1');
$I->submitForm('#createquestionnaire', [
     'title' => 'Test Questionnaire',
     'ethics' => 'By continuing you agree',
]);
// Then
$I->seeCurrentUrlEquals('/admin/questionnaires');
$I->see('Questionnaires', 'h1');
$I->see('New questionnaire created!');
$I->see('Test Questionnaire');
