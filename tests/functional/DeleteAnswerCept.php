<?php
$I = new FunctionalTester($scenario);

$I->am('user');
$I->wantTo('delete an answer');

// create a category in the db that we can then delete
$I->haveRecord('answers', [
      'id' => '9999',
      'answer' => 'RandomAnswer',
]);

// Check the user is in the db and can be seen
$I->seeRecord('answers', ['answer' => 'RandomAnswer', 'id' => '9999']);


// When
$I->amOnPage('/admin/users/main/answers');

// then

// Check  the link is present - this is because there could potentially be many update links/buttons.
// each link can be identified by the users id as name.
$I->seeElement('a', ['name' => '9999']);
// And
$I->click('Delete RandomAnswer');

// Then
$I->amOnPage('/admin/users/main/answers');
// And
$I->dontSeeElement('a', ['name' => '9999']);
