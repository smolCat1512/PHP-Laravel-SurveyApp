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
      'user_id' => '0001',
      'title' => 'Randomtitle',
      'ethics' => 'Test ethics statement',
  ]);

  // Check the questionnaire is in the db and can be seen
  $I->seeRecord('questionnaires', ['title' => 'Randomtitle', 'ethics' => 'Test ethics statement']);

  // When
  $I->amOnPage('/admin/questionnaire');
  $I->see('Randomtitle');
  // And
  $I->click('Randomtitle');

  //Then
  $I->amOnPage('/admin/questionnaire/250');
  $I->see('Edit');

  // Then
  $I->amOnPage('/admin/questionnaire/250/edit');
  // Then
  $I->fillField('title', 'Updated Questionnaire');
  $I->fillField('ethics', 'Updated Ethics');
  $I->click('Edit Questionnaire');

  // Then
  $I->seeCurrentUrlEquals('/admin/questionnaire');
  $I->seeRecord('questionnaires', ['title' => 'Updated Questionnaire']);
  $I->see('Questionnaires');
  $I->see('Updated Questionnaire');
