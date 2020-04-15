<?php
  $I = new FunctionalTester($scenario);

  $I->am('user');
  $I->wantTo('update a question');

  // create a questionnaire in the db that we can then update
  $I->haveRecord('questions', [
      'id' => '0001',
      'question' => 'Randomquestion',
  ]);

  // Check the user is in the db and can be seen
  $I->seeRecord('question', ['question' => 'Randomquestion', 'id' => '0001']);


  // When
  $I->amOnPage('/admin/users/main/questions');

  // then

  // Check the link is present - this is because there could potentially be many update links/buttons.
  // each link can be identified by the users id as name.
  $I->seeElement('a', ['name' => '0001']);
  // And
  $I->click('a', ['name' => '0001']);

  // Then
  $I->amOnPage('/admin/users/main/questions/0001/edit');
  // And
  $I->see('Edit Question - Randomquestion', 'h1');

  // Then
  $I->fillField('question', 'UpdatedQuestion');
  // And
  $I->click('Update Question');

  // Then
  $I->seeCurrentUrlEquals('/admin/users/main/questions');
  $I->seeRecord('questions', ['question' => 'UpdatedQuestion']);
  $I->see('Questions', 'h1');
  $I->see('UpdatedQuestion');
