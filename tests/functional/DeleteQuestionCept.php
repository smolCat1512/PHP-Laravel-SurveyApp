<?php
$I = new FunctionalTester($scenario);

$I->am('user');
$I->wantTo('delete a question');

// log in as your admin user
// This should be id of 1 if you created your manual login for a known user first.
Auth::loginUsingId(1);

// When
$I->amOnPage('dashboard');
$I->see('Questions');
// And
$I->click('Questions');

// create a question in the db that we can then update
$I->haveRecord('questions', [
      'questionId' => '20',
      'user_id' => '0001',
      'question' => 'Randomquestion',
]);

// Check the question is in the db and can be seen
$I->seeRecord('questions', ['question' => 'Randomquestion']);

  // When
  $I->amOnPage('/admin/question');
  $I->see('Randomquestion');
  // And
  $I->click('Randomquestion');

  //Then
  $I->amOnPage('/admin/question/20');
  $I->see('Randomquestion');
  $I->click('Delete');

  // Then
  $I->seeCurrentUrlEquals('/admin/question');
  $I->see('Questions');
  $I->see('Question deleted!!');