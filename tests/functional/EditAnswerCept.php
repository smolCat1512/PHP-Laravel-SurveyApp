<?php
  $I = new FunctionalTester($scenario);

  $I->am('user');
  $I->wantTo('update a answer');


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
      'answerId' => '250',
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
  $I->amOnPage('/admin/answer/250');
  $I->see('Edit');

  // Then
  $I->amOnPage('/admin/answers/250/edit');
  // Then
  $I->fillField('answer', 'Updated Answer');
  $I->click('Edit Answer');

  // Then
  $I->seeCurrentUrlEquals('/admin/answer');
  $I->seeRecord('answers', ['answer' => 'Updated Answer']);
  $I->see('Answers');
  $I->see('Updated Answer');