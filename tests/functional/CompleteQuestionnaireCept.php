<?php
$I = new FunctionalTester($scenario);

$I->am('respondent');
$I->wantTo('complete a questionnaire');

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
// Put answers in the record/db
$I->haveRecord('answers', [
    'id' => '200',
    'question_id' => '200',
    'answer' => 'Test Answer',
]);

// When
$I->amOnPage('/respondents');
$I->see('Questionnaires');
// And
$I->click('Test Questionnaire');

// When
$I->amOnPage('/surveys/200-test-questionnaire');
$I->see('Test Questionnaire');
$I->see('Test Question');
$I->see('Test Answer');
// And
$I->click('Complete Survey', 'button');

// Then
$I->amOnPage('/respondents');
