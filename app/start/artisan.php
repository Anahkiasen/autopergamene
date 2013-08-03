<?php

//////////////////////////////////////////////////////////////////////
///////////////////////////// DEPLOYMENT /////////////////////////////
//////////////////////////////////////////////////////////////////////

Rocketeer::after('deploy', function($task) {
	$task->command->comment('Installing Bower components');
	$task->runForCurrentRelease('bower install --allow-root');

	$task->command->comment('Building Basset containers');
	$task->runForCurrentRelease('php artisan basset:build -f -p');

	$task->runForCurrentRelease('chown www-data app/storage/meta/collections.json');
});
