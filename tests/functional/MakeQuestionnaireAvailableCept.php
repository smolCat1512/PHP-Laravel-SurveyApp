<?php
$I = new FunctionalTester($scenario);

$I->am('user');
$I->wantTo('make a questionnaire live');

// When
$I->amOnPage('/admin/questionnaires');
$I->see('Questionnaires', 'h1');
$I->see('Test Questionnaire');
$I->see('Development');
$I->click('Test Questionnaire');

// Then
$I->amOnPage('/admin/questionnaires/(\d+)~');
$I->seeButton('Make Questionnaire Live');
$I->click('Make Questionnaire Live');

// Then
$I->seeCurrentUrlEquals('/admin/questionnaires');
$I->see('Questionnaires', 'h1');
$I->see('Test Questionnaire');
$I->see('Live');
