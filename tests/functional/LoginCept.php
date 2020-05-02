<?php
$I = new FunctionalTester($scenario);

$I->am('user');
$I->wantTo('login to the system');

// When
$I->amOnPage('login');
$I->see('Login');
$I->see('E-Mail address');
$I->see('Password');
// And
$I->click('Login');

// create a user in the db so we can login
$I->haveRecord('users', [
        'id' => '666',
        'name' => 'JohnSmith',
        'email' => 'johnsmith@email.com',
        'password' => 'password123',
]);

// Check the user is in the DB and can be seen
$I->seeRecord('users', ['id' => '666', 'name' => 'JohnSmith', 'email' => 'johnsmith@email.com', 'password' => 'password123' ]);

// Then
$I->amOnPage('auth/login');
$I->see('Login');
$I->fillField('email', 'johnsmith@email.com');
$I->fillField('Password', 'password123');
$I->click('Login');

// Then check pushed to login of specific user
$I->amOnPage('/auth/login/#');
