<?php
$I = new FunctionalTester($scenario);

$I->am('user');
$I->wantTo('create a question');

// When
$I->amOnPage('/admin/questions');
$I->see('Questions', 'h1');
$I->dontSee('Test Question');
// And
$I->click('Add Question');

// Then
$I->amOnPage('/admin/questions/create');
// And
$I->see('Add Question', 'h1');
$I->submitForm('.createquestion', [
     'question' => 'Test Question',
]);
// Then
$I->seeCurrentUrlEquals('/admin/questions');
$I->see('Question', 'h1');
$I->see('New question added!');
$I->see('Test Question');
