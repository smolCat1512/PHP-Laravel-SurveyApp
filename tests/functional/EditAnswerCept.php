<?php
  $I = new FunctionalTester($scenario);

  $I->am('user');
  $I->wantTo('update an answer');

  // create an answer in the db that we can then update
  $I->haveRecord('answer', [
      'id' => '0001',
      'answer' => 'RandomAnswer',
  ]);

  // Check the user is in the db and can be seen
  $I->seeRecord('answers', ['answer' => 'RandomAnswer', 'id' => '0001']);

  // When
  $I->amOnPage('/admin/users/main/answers');

  // then

  // Check the link is present - this is because there could potentially be many update links/buttons.
  // each link can be identified by the users id as name.
  $I->seeElement('a', ['name' => '0001']);
  // And
  $I->click('a', ['name' => '0001']);

  // Then
  $I->amOnPage('/admin/users/main/answers/0001/edit');
  // And
  $I->see('Edit Answer - RandomAnswer', 'h1');

  // Then
  $I->fillField('answer', 'UpdatedAnswer');
  // And
  $I->click('Update Answer');

  // Then
  $I->seeCurrentUrlEquals('/admin/users/main/answers');
  $I->seeRecord('answers', ['answer' => 'UpdatedAnswer']);
  $I->see('Answers', 'h1');
  $I->see('UpdatedAnswer');
