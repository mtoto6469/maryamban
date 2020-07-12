<?php
$I = new WebGuy($scenario);
$I->wantTo('test leave bug');
$I->amOnPage('/info');

$jon = $I->haveFriend('jon');
$jon->does(function (WebGuy $I) {
    $I->amOnPage('/');
    $I->seeInCurrentUrl('/');
});
$I->see('Information', 'h3');
$jon->leave();

$I->see('Don\'t do that at home');