<?php
$I = new FunctionalTester($scenario);

$I->am('user');
$I->wantTo('delete a questionnaire');

// create a category in the db that we can then delete
$I->haveRecord('questionnaires', [
      'id' => '9999',
      'title' => 'RandomQuestionnaire',
      'ethics statement' => 'testEthics',
]);

// Check the user is in the db and can be seen
$I->seeRecord('questionnaires', ['title' => 'RandomQuestionnaire', 'id' => '9999']);


// When
$I->amOnPage('/admin/questionnaires');

// then

// Check  the link is present - this is because there could potentially be many update links/buttons.
// each link can be identified by the users id as name.
$I->seeElement('a', ['name' => '9999']);
// And
$I->click('Delete RandomQuestionnaire');

// Then
$I->amOnPage('/admin/questionnaires');
// And
$I->dontSeeElement('a', ['name' => '9999']);
