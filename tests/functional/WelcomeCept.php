<?php
$I = new FunctionalTester($scenario);

$I->am('a admin');
$I->wantTo('see Welcome Page');

//When
$I->amOnPage('/');

//then
$I->seeCurrentUrlEquals('/');
$I->See('Home', '.title');
