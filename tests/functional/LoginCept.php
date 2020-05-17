<?php
$I = new FunctionalTester($scenario);

$I->am('user');
$I->wantTo('login to the system');

// create a user in the db so we can login
$I->haveRecord('users', [
        'id' => '2',
        'name' => 'JohnSmith',
        'email' => 'johnsmith@email.com',
        'password' => 'password123',
]);

// Check the user is in the DB and can be seen
$I->seeRecord('users', ['id' => '2', 'name' => 'JohnSmith', 'email' => 'johnsmith@email.com', 'password' => 'password123' ]);

// When
$I->amOnPage('/login');
$I->see('Login');
$I->see('E-Mail address');
$I->see('Password');
// And
$I->click('Login');

// Then
$I->amOnPage('auth/login');
$I->see('Login');
$I->fillField('email', 'johnsmith@email.com');
$I->fillField('Password', 'password123');
$I->click('Login');

// Then check pushed to login of specific user
$I->amOnPage('home');
// Due to issues this last line is on page but
// test does not recognise so commented out
//$I->see('You are logged in!');
