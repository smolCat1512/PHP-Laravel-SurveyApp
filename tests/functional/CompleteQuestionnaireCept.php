<?php
$I = new FunctionalTester($scenario);

$I->am('respondent');
$I->wantTo('complete a live questionnaire');

// When
$I->amOnPage('/questionnaires');
$I->see('Questionnaires', 'h1');
// And
$I->click('Test');

// When
$I->amOnPage('/questionnaires');
$I->see('Questionnaires', 'h1');
$I->see('Test Questionnaire');
// And
$I->click('Complete Questionnaire', 'button');

// create a questionnaire in the db that we can then update
$I->haveRecord('questionnaires', [
    'id' => '0001',
    'title' => 'Test Questionnaire',
    'ethics statement' => 'Test ethics statement',
]);

// Then
$I->amOnPage('/questionnaires/(\d+)~');
// And
$I->see('Test Questionnaire', 'h1');
$I->submitForm('.agreeethics', [
     'title' => 'Test Questionnaire',
     'ethics statement' => 'By continuing you agree...',
     'agree?' => 'Yes'
]);

// create a question in the db that we can then update
$I->haveRecord('questions', [
    'id' => '0001',
    'question' => 'Randomquestion',
]);

// create an answer in the db that we can then update
$I->haveRecord('answer', [
    'id' => '0001',
    'answer' => 'RandomAnswer',
]);

// create a second answer in the db that we can then update
$I->haveRecord('answer', [
    'id' => '0002',
    'answer' => 'RandomAnswer2',
]);

// Then
$I->amOnPage('/questionnaires/(\d+)~/question 1');
// And
$I->see('Test Questionnaire', 'h1');
$I->see('Question 1', 'h2');
$I->see('Answers', 'h3');

// then
$I->click('Yes');
