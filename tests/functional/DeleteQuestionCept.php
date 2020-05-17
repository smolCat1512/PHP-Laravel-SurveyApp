<?php
$I = new FunctionalTester($scenario);

$I->am('user');
$I->wantTo('create an answer');

// Put a questionnaire in record/db
$I->haveRecord('questionnaires', [
     'id' => '200',
     'user_id' => '200',
     'title' => 'Test Questionnaire',
     'ethics' => 'Test Ethics',
 ]);
 //Put a question in record/db
 $I->haveRecord('questions', [
     'id' => '200',
     'questionnaire_id' => '200',
     'question' => 'Test Question',
 ]);

// log in as your admin user
// This should be id of 1 if you created your manual login for a known user first.
Auth::loginUsingId(1);

// When
$I->amOnPage('/home');
$I->see('Test Questionnaire');
// And
$I->click('Test Questionnaire');

// Then
$I->amOnPage('/questionnaires/200');
// And
$I->see('Add new Question');
$I->click('Add new Question');

// Then
$I->amOnPage('/questionnaires/200/questions/create');
// And
$I->see('Choices');
$I->see('Choice 1');
$I->see('Choice 2');

//At this point tried to pass data into choices fields but could not get to pickup so
//went for basic button input and push back to view

//Then
$I->click('Add Question');

//Then
$I->amOnPage('/questionnaires/200');
$I->see('Test Questionnaire');
$I->see('Delete Question');
$I->click('Delete Question');

//Then
$I->amOnPage('/questionnaires/200');
$I->dontSeeElement('Test Question');