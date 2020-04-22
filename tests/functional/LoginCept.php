<?php
$I = new FunctionalTester($scenario);

$I->am('user');
$I->wantTo('login to  the system');

// When
$I->amOnPage('/admin');
$I->see('Users', 'h1');
// And
$I->click('Login');

// create a user in the db so we can login
$I->haveRecord('users', [
        'id' => '0001',
        'name' => 'John Smith',
        'email' => 'johnsmith@email.com',
        'username' => 'JSmith123',
        'password' => 'password123',
]);

// Check the user is in the DB and can be seen
$I->seeRecord('users', ['id' => '0001', 'name' => 'John Smith', 'email' => 'johnsmith@email.com']);

// Then
$I->amOnPage('admin/login');
$I->see('Login', 'h1');
$I->submitForm('.userlogin', [
    'username' => 'JSmith123',
    'password' => 'password123'
]);

// Then
$I->amOnPage('admin/');
// And
$I->see('Welcome!', 'h1');
