<?php
$I = new FunctionalTester($scenario);

$I->am('user');
$I->wantTo('make a questionnaire live');

// When
$I->amOnPage('/admin/users/main/questionnaires');
$I->see('Questionnaires', 'h1');
$I->see('Test Questionnaire');
$I->see('Development');
$I->click('Test Questionnaire');

// Then
$I->amOnPage('/admin/users/main/questionnaires/Test Questionnaire');
$I->seeButton('Make Questionnaire Live');
$I->click('Make Questionnaire Live');

// Then
$I->seeCurrentUrlEquals('/admin/users/main/questionnaires');
$I->see('Questionnaires', 'h1');
$I->see('Test Questionnaire');
$I->see('Live');
