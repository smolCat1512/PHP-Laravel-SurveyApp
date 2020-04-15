<?php
$I = new FunctionalTester($scenario);

$I->am('user');
$I->wantTo('delete a question');

// create a category in the db that we can then delete
$I->haveRecord('questions', [
      'id' => '9999',
      'question' => 'RandomQuestion',
]);

// Check the user is in the db and can be seen
$I->seeRecord('questions', ['question' => 'RandomQuestion', 'id' => '9999']);


// When
$I->amOnPage('/admin/users/main/questions');

// then

// Check  the link is present - this is because there could potentially be many update links/buttons.
// each link can be identified by the users id as name.
$I->seeElement('a', ['name' => '9999']);
// And
$I->click('Delete RandomQuestion');

// Then
$I->amOnPage('/admin/users/main/questions');
// And
$I->dontSeeElement('a', ['name' => '9999']);
