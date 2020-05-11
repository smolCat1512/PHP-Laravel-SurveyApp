<?php
  $I = new FunctionalTester($scenario);

  $I->am('user');
  $I->wantTo('update a questionnaire');


// log in as your admin user
// This should be id of 1 if you created your manual login for a known user first.
Auth::loginUsingId(1);

// When
$I->amOnPage('dashboard');
$I->see('Questionnaires');
// And
$I->click('Questionnaires');

  // create a questionnaire in the db that we can then update
  $I->haveRecord('questionnaires', [
      'questionnaireId' => '250',
      'user_id' => '1',
      'title' => 'Randomtitle',
      'ethics' => 'Test ethics statement',
  ]);

  // Check the user is in the db and can be seen
  $I->seeRecord('questionnaires', ['title' => 'Randomtitle', 'id' => '0001']);


  // When
  $I->amOnPage('/admin/questionnaires');

  // then

  // Check the link is present - this is because there could potentially be many update links/buttons.
  // each link can be identified by the users id as name.
  $I->seeElement('a', ['name' => '0001']);
  // And
  $I->click('a', ['name' => '0001']);

  // Then
  $I->amOnPage('/admin/questionnaires/(\d+)~/edit');
  // And
  $I->see('Edit Questionnaire - Randomtitle', 'h1');

  // Then
  $I->fillField('title', 'UpdatedQuestionnaire');
  // And
  $I->click('Update Questionnaire');

  // Then
  $I->seeCurrentUrlEquals('/admin/questionnaires');
  $I->seeRecord('questionnaires', ['title' => 'UpdatedQuestionnaire']);
  $I->see('Questionnaires', 'h1');
  $I->see('UpdatedQuestionnaire');
