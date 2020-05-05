<?php
$I = new FunctionalTester($scenario);

$I->am('user');
$I->wantTo('create a questionnaire');

// log in as your admin user
// This should be id of 1 if you created your manual login for a known user first.
Auth::loginUsingId(1);

// When
$I->amOnPage('home');
$I->see('Questionnaires');
// And
$I->click('Questionnaires');

// Then
$I->amOnPage('/admin/questionnaire');
// And
$I->see('Questionnaires', 'h1');
$I->click('Create Questionnaire');

// Then
$I->amOnPage('/admin/questionnaires/create');
// And
$I->submitForm('#createquestionnaire', [
     'title' => 'Test Questionnaire',
     'ethics' => 'By continuing you agree',
]);
// Then
$I->seeCurrentUrlEquals('/admin/questionnaire');
$I->see('Questionnaires', 'h1');
$I->see('Test Questionnaire');
