<?php
$I = new FunctionalTester($scenario);

$I->am('user');
$I->wantTo('delete an answer');

// log in as your admin user
// This should be id of 1 if you created your manual login for a known user first.
Auth::loginUsingId(1);

// When
$I->amOnPage('dashboard');
$I->see('Answers');
// And
$I->click('Answers');

// create a answer in the db that we can then update
$I->haveRecord('answers', [
      'answerId' => '20',
      'user_id' => '0001',
      'answer' => 'Randomanswer',
]);

// Check the answer is in the db and can be seen
$I->seeRecord('answers', ['answer' => 'Randomanswer']);

  // When
  $I->amOnPage('/admin/answer');
  $I->see('Randomanswer');
  // And
  $I->click('Randomanswer');

  //Then
  $I->amOnPage('/admin/answer/20');
  $I->see('Randomanswer');
  $I->click('Delete');

  // Then
  $I->seeCurrentUrlEquals('/admin/answer');
  $I->see('Answers');
  $I->see('Answer deleted!!');