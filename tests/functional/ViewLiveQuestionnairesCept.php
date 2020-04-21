<?php
$I = new FunctionalTester($scenario);

$I->am('respondent');
$I->wantTo('view questionnaires');

// When
$I->amOnPage('/respondents/questionnaires');
$I->see('Live Questionnaires', 'h1');
// And
$I->click('View Questionnaires');
