<?php
$I = new WebGuy($scenario);
$I->wantTo('Check if homepage works');
$I->amOnPage('/');
$I->see('maxime fabre 23 ans');