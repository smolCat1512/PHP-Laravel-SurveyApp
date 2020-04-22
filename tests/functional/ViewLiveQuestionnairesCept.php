<?php
$I = new FunctionalTester($scenario);

$I->am('respondent');
$I->wantTo('view questionnaires');

// When
$I->amOnPage('/questionnaires');
$I->see('Live Questionnaires', 'h1');
// And
$I->click('View Questionnaires');
