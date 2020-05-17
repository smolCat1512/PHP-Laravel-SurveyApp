<?php
$I = new FunctionalTester($scenario);

$I->am('user');
$I->wantTo('create a questionnaire');

// log in as your admin user
// This should be id of 1 if you created your manual login for a known user first.
Auth::loginUsingId(1);

// When
$I->amOnPage('/home');
$I->see('Create New Questionnaire');
// And
$I->click('Create New Questionnaire');

// Then
$I->amOnPage('/questionnaires/create');
// And
$I->see('Create New Questionnaire');
$I->see('Title');
$I->see('Ethics Statement');
$I->fillfield('title', 'ethics');
$I->click('Create Questionnaire');

// Put a questionnaire in record/db
$I->haveRecord('questionnaires', [
     'id' => '200',
     'user_id' => '200',
     'title' => 'Test Questionnaire',
     'ethics' => 'Test Ethics',
 ]);

// Then
$I->amOnPage('/questionnaires/200');
// And
$I->see('Add new Question');

