<?php
$I = new FunctionalTester($scenario);

$I->am('user');
$I->wantTo('view responses');

// When
$I->amOnPage('/admin/responses');
$I->see('Responses', 'h1');
// And
$I->click('View Responses');

// create a questionnaire in the db that we can then update
$I->haveRecord('answer', [
    'id' => '0001',
    'answer' => 'RandomAnswer',
]);

// Then
$I->seeRecord('answers', ['answer' => 'RandomAnswer', 'id' => '0001']);
