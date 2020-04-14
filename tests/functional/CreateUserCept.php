<?php
$I = new FunctionalTester($scenario);

$I->am('admin');
$I->wantTo('create a new user');

// When
$I->amOnPage('admin/users');
$I->see('Users', 'h1');
$I->dontSee('Shaun Halliday');
// And
$I->click('Add User');

// Then
$I->amOnPage('admin/users/create');
// And
$I->see('Add User', 'h1');
$I->submitForm('.createuser', [
    'name' =>
]);
