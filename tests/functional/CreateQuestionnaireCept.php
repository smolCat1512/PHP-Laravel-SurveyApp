<?php
$I = new FunctionalTester($scenario);

$I->am('user');
$I->wantTo('create a questionnaire');

// When
$I->amOnPage('/admin/users/main/questionnaires');
$I->see('Questionnaires', 'h1');
$I->dontSee('Test Questionnaire');
// And
$I->click('Add Questionnaire');

// Then
$I->amOnPage('/admin/users/main/questionnaires/create');
// And
$I->see('Add Questionnaire', 'h1');
$I->submitForm('.createquestionnaire', [
     'title' => 'Test Questionnaire',
     'ethics statement' => 'By continuing you agree...',
]);
// Then
$I->seeCurrentUrlEquals('/admin/users/main/questionnaires');
$I->see('Questionnaires', 'h1');
$I->see('New questionnaire added!');
$I->see('Test Questionnaire');
