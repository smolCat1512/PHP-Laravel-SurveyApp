<?php
$I = new FunctionalTester($scenario);

$I->am('admin');
$I->wantTo('create a new user');

// When
$I->amOnPage('admin/users');
$I->see('Users', 'h1');
$I->dontSee('John Smith');
// And
$I->click('Add User');

// Then
$I->amOnPage('admin/users/create');
// And
$I->see('Add User', 'h1');
$I->submitForm('.createuser', [
    'name' => 'John Smith',
    'email' => 'johnsmith@email.com',
    'username' => 'JSmith123',
    'password' => 'password123'
]);
// Then
$I->seeCurrentUrlEquals('admin/users');
$I->see('Users', 'h1');
$I->see('New user now added');
$I->see('John Smith');


// Check for duplicates

 // When
 $I->amOnPage('/admin/users');
 $I->see('Users', 'h1');
 $I->see('John Smith');
 // And
 $I->click('Add User');

 // Then
 $I->amOnPage('/admin/users/create');
 // And
 $I->see('Add User', 'h1');
 $I->submitForm('.createuser', [
   'name' => 'John Smith',
   'email' => 'johnsmith@email.com',
   'username' => 'JSmith123',
   'password' => 'password123'
 ]);
 // Then
 $I->seeCurrentUrlEquals('/admin/users');
 $I->see('Users', 'h1');
 $I->see('Error user already exists!');
